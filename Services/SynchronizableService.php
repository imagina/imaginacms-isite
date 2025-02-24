<?php

namespace Modules\Isite\Services;

use Modules\Isite\Entities\Synchronizable;
use Modules\Isite\Repositories\SynchronizableRepository;
use Mockery\CountValidator\Exception;
use Illuminate\Support\Facades\Auth;

class SynchronizableService
{
  public $modelRepository;
  private $client;
  private $n8nBaseUrl;

  public function __construct(SynchronizableRepository $modelRepository)
  {
    $this->client = new \GuzzleHttp\Client();
    $this->n8nBaseUrl = setting('isite::n8nBaseUrl');
    //Get url of app
    $this->domain = env("APP_URL");
    $this->modules = app('modules');
    $this->modelRepository = $modelRepository;
  }

  public function createSheet($params)
  {
    $syncConfig = config("asgard.{$params["module"]}.config.synchronizable");

    // Get name of the sync table
    $nameSync = $params["module"] . '_sync' . ucfirst($params["entity"]);
    // Get entity to create sheet
    $entityToSync = $syncConfig["entities"][$nameSync] ?? [];
    // Get template ID
    $baseTemplateId = $entityToSync["base_template_id"] ?? null;

    if (!isset($baseTemplateId)) throw new Exception("Template not found", 404);
    // Get a sync by name
    $currentModel = $this->modelRepository->getItemsBy(json_decode(json_encode([
      'filter' => ["name" => $nameSync]
    ])))->first();

    if (!isset($currentModel)) throw new Exception("Model {$nameSync} not found", 404);
    // Search for a sheetId
    $spreadsheetId = $currentModel->spreadsheet_id;

    // Create sheet and put the id on $sheetId
    $oldEnabledEmails = explode(',', $currentModel->first()->enabled_emails) ?? null;

    $siteName = setting('core::site-name');

    $requestParams = [
      "title" => "{$params["module"]} {$params["entity"]} $siteName",
      "template_sheet_id" => $baseTemplateId,
      "sheet_id" => $spreadsheetId,
      "old_enabled_emails" => $oldEnabledEmails,
      "enabled_emails" => $params["enabled_emails"]
    ];

    if ($spreadsheetId && is_null($currentModel->base_template_id)) $requestParams["action"] = 'delete';

    // Send a POST request to N8N to clone the spreadsheet
    $response = $this->client->request('POST',
      "$this->n8nBaseUrl/google-sheets/create/webhook",
      [
        "body" => json_encode($requestParams),
        'headers' => [
          'Content-Type' => 'application/json'
        ]
      ]
    );

    $responseN8N = json_decode($response->getBody()->getContents());
    $spreadsheetId = $responseN8N->sheet_id;
    $sheets = $responseN8N->sheets;
    $allSheets = [];

    // Save the sheets id for each sheet
    foreach ($sheets as $sheet) {
      if ($sheet->properties->title) {
        $allSheets = array_merge([$sheet->properties->title => $sheet->properties->sheetId], $allSheets);
      }
    }
    $emails = implode(',', $params["enabled_emails"]);

    //Get Modules by configName
    $params = ["filter" => ["allTranslations" => true, "configNameByModule" => 'synchronizable']];
    $configsBySync = $this->getConfigBy($params);
    //Get entities
    $entities = $this->getOnlyValuesOfConfig($configsBySync, 'entities');

    // Filter by base_template_id
    $filteredByBaseTemplate = array_filter($entities, function ($item) use ($baseTemplateId) {
      return isset($item['base_template_id']) && $item['base_template_id'] === $baseTemplateId;
    });

    // Sync the sheet_id attribute
    Synchronizable::whereIn('name', array_keys($filteredByBaseTemplate))
      ->update(['spreadsheet_id' => $spreadsheetId, 'base_template_id' => $baseTemplateId, 'sheets' => json_encode($allSheets), 'enabled_emails' => $emails]);

    return ["data" => "Request successful"];

  }

  public function exportData($params)
  {
    //Get config by module name
    $configData = $this->getConfigByModuleName($params);

    //Get current Model
    $currentModel = $this->getCurrentModel($params);

    $entityToSync = $configData["entityToSync"];

    $formattedParams = [
      'functionality' => 'export', // Setting functionality based on export dependencies flag
      'name' => $params["name"],
      'requestParams' => $configData["requestParams"],
      'nameSheetPrincipal' => $configData['nameSheetPrincipal'],
      'apiRoute' => $entityToSync["apiRoute"],
      'sheetName' => $entityToSync["sheetName"],
      'columns' => $entityToSync["columns"] ?? null
    ];


    // If export dependencies flag is set, switch functionality and add dependencies to request parameters
    if (isset($params["exportDependencies"]) && $params["exportDependencies"]) {
      $formattedParams['functionality'] = 'dependencies';
      $formattedParams["dependencies"] = $entityToSync["dependencies"];;
    }

    $response = $this->sendRequestToN8N($formattedParams, $currentModel, '/export/v2');

    // Returning the response data
    return ['data' => $response];
  }

  public function importData($params)
  {
    //Get config by module name
    $configData = $this->getConfigByModuleName($params);

    //Get current Model
    $currentModel = $this->getCurrentModel($params);

    $entityToSync = $configData["entityToSync"];

    // Constructing request parameters for importing data
    $formattedParams = [
      'functionality' => 'import',
      "name" => $params["name"],
      "dependencies" => $entityToSync["dependencies"],
      "requestParams" => $params["requestParams"],
      'nameSheetPrincipal' => $configData['nameSheetPrincipal'],
      'apiRoute' => $entityToSync["apiRoute"]
    ];

    $response = $this->sendRequestToN8N($formattedParams, $currentModel, '/import');

    // Returning the response data
    return ['data' => $response];
  }

  private function getConfigByModuleName($params) {
    // Extracting the module name from the parameter name
    $moduleName = explode('_', $params["name"])[0];
    // Retrieving synchronization configuration based on the module name
    $syncConfig = config("asgard.$moduleName.config.synchronizable");
    // Finding the entity to synchronize based on the provided name
    $entityToSync = $syncConfig["entities"][$params["name"]] ?? null;

    // If the entity to sync is not found, throw an exception
    if (is_null($entityToSync)) throw new Exception("Entity to Sync not found", 404);

    // Retrieving request parameters or setting an empty array if not provided
    $requestParams = $params["requestParams"] ?? [];

    // Setting include parameters based on the entity configuration
    $requestParams["include"] = $entityToSync["include"] ?? [];

    // Retrieving the name of the principal sheet
    $nameSheetPrincipal = $entityToSync["sheetName"];

    return [
      'entityToSync' => $entityToSync,
      'moduleName' => $moduleName,
      'requestParams' => $requestParams,
      'nameSheetPrincipal' => $nameSheetPrincipal,
      'apiRoute' => $entityToSync["apiRoute"]
    ];
  }

  private function getCurrentModel($params) {
    // Retrieving the current model based on the provided name
    $currentModel = $this->modelRepository->getItem($params["name"], json_decode(json_encode([
      'filter' => ["field" => 'name']
    ])));

    // If the current model is not found, throw an exception
    if (!isset($currentModel)) throw new Exception("Name {$params["name"]} not found", 404);

    // If the current model is running, throw an exception
    if ($currentModel->is_running) throw new Exception("process is runing", 405);

    return $currentModel;
  }

  private function sendRequestToN8N($params, $currentModel, $path) {
    // Parsing JSON-encoded sheets data
    $sheets = json_decode($currentModel->sheets, true);

    // Constructing the URL for exporting data to Google Sheets via N8N
    $urlToSync = $this->n8nBaseUrl."/google-sheets".$path;

    // Retrieving the user ID who initiated the action
    $id = Auth::id();
    // Generating a token for authorization
    $token = $this->generateToken();

    $nameSheetPrincipal = $params['nameSheetPrincipal'];

    // Constructing request parameters for exporting data
    $requestParams = [
      "name" => $params["name"],
      "domain_url" => $this->domain,
      "spreadsheet_id" => $currentModel->spreadsheet_id,
      "sheet_name" => $nameSheetPrincipal,
      "sheets" => $sheets,
      "access_token" => $token,
      "request_params" => $params['requestParams'],
      "id_prinpal_sheet" => $sheets[$nameSheetPrincipal],
      "api_route" => $params["apiRoute"],
      "columns" => $params["columns"] ?? null
    ];

    if(isset($params['dependencies'])) $requestParams['dependencies'] = $params['dependencies'];

    // Sending a POST request to N8N to export data to the spreadsheet
    $response = $this->client->request('POST',
      $urlToSync,
      [
        "body" => json_encode($requestParams),
        'headers' => [
          'Content-Type' => 'application/json'
        ]
      ]
    );

    // Updating the current model with import running status, last sync time, and user ID
    $this->modelRepository->updateBy($currentModel->id, [
      'is_running' => $params['functionality'],
      'last_sync' => now(),
      'exported_by_id' => $id
    ]);

    return json_decode($response->getBody()->getContents())->message;
  }

  private function getToken($user)
  {
    if (isset($user))
      return $user->createToken('Laravel Password Grant Client');
    else return false;
  }

  //Generate token for email 'soporte@imaginacolombia.com'
  private function generateToken()
  {
    $modelUser = app('Modules\User\Repositories\UserRepository');
    //Get user soporte
    $user = $modelUser->getItem('soporte@imaginacolombia.com', json_decode(json_encode(['filter' => ['field' => 'email']])));

    // Login user soporte
    $user = Auth::guard('web')->loginUsingId($user->id);
    //Get Token
    $token = $this->getToken($user);

    return $token->accessToken;
  }

  //Get configs by name
  public function getConfigBy($params)
  {
    $enabledModules = $this->modules->allEnabled();

    $configName = $params["filter"]["configName"] ?? false;//Get config name filter
    $configNameByModule = $params["filter"]["configNameByModule"] ?? false;//Get config name by module filter

    //Get all configs
    if (!$configName && !$configNameByModule)
      $response = config("asgard");

    //Get config by name
    if ($configName && strlen($configName)) {
      $configNameExplode = explode('.', $configName);
      $response = config("asgard." . strtolower(array_shift($configNameExplode)) . "." . implode('.', $configNameExplode));
    }

    //Get config by name to each module
    if (isset($configNameByModule) && strlen($configNameByModule)) {
      $response = [];
      foreach (array_keys($enabledModules) as $moduleName) {
        $response[$moduleName] = config("asgard." . strtolower($moduleName) . ".config." . $configNameByModule);
      }
    }

    //Validate Response
    if ($response == null) return null;

    //Response data
    return ["data" => $this->translateLabels($response)];
  }

  public function translateLabels($data)
  {
    if (is_array($data)) {
      foreach ($data as $key => &$item) {
        if (is_string($item)) $item = trans($item);
        else if (is_array($item)) {
          $item = $this->translateLabels($item);
        }
      }
    }

    return $data;
  }

  private function getOnlyValuesOfConfig($configs = [], $key = '')
  {
    $response = [];
    foreach ($configs as $configModule) {
      foreach ($configModule as $values) {
        if (!empty($key)) {
          if (isset($values[$key])) $response = array_merge($values[$key], $response);
        } else $response = array_merge($values, $response);
      }
    }

    return $response;
  }
}
