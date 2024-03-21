<?php

namespace Modules\Isite\Services;

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
    $baseTemplateId =  $syncConfig["base_template_id"] ?? null;

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

    if($spreadsheetId && is_null($currentModel->base_template_id)) $requestParams["action"] = 'delete';

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
    // Sync the sheet_id attribute
    $currentModel->update(['spreadsheet_id' => $spreadsheetId, 'base_template_id' => $baseTemplateId, 'sheets' => json_encode($allSheets), 'enabled_emails' => $emails]);


    return ["data" => "Request successful"];

  }

  public function exportData($params)
  {
    $moduleName = explode('_', $params["name"])[0];
    $syncConfig = config("asgard.$moduleName.config.synchronizable");
    $entityToSync = $syncConfig["entities"][$params["name"]] ?? null;

    if(is_null($entityToSync)) throw new Exception("Entity to Export not found", 404);

    $urlToExport = "$this->n8nBaseUrl/google-sheets/export/v2";

    $currentModel = $this->modelRepository->getItem($params["name"], json_decode(json_encode([
      'filter' => ["field" => 'name']
    ])));

    if (!isset($currentModel)) throw new Exception("Name {$params["name"]} not found", 404);

    if($currentModel->is_running) throw new Exception("process is runing", 405);

    $sheets = json_decode($currentModel->sheets);
    // Retrieve the user ID who initiated the action
    $id = Auth::id();
    // Get token of soporte
    $token = $this->generateToken();

    $requestParams = [
      "name" => $params["name"],
      "domain_url" => $this->domain,
      "spreadsheet_id" => $currentModel->spreadsheet_id,
      "sheets" => $sheets,
      "access_token" => $token,
      "requestParams" => $params["requestParams"],
    ];

    $functionality = 'export';

    if(isset($params["exportDependencies"]) && $params["exportDependencies"]) {
      $functionality = 'dependencies';
      $requestParams["dependencies"] = $entityToSync["dependencies"];
    } else {
      $requestParams["api_route"] = $entityToSync["apiRoute"];
      $requestParams["sheet_name"] = $entityToSync["sheetName"];
      $requestParams["columns"] = $entityToSync["columns"] ?? null;
    }
    // Send a POST request to N8N to export data to the spreadsheet
    $response = $this->client->request('POST',
      $urlToExport,
      [
        "body" => json_encode($requestParams),
        'headers' => [
          'Content-Type' => 'application/json'
        ]
      ]
    );

    $updateModel = $currentModel->update(['is_running' => $functionality, 'last_sync' => now(), 'exported_by_id' => $id]);

    return ['data' => json_decode($response->getBody()->getContents())->message];
  }

  public function importData($params)
  {
    $moduleName = explode('_', $params["name"])[0];
    $syncConfig = config("asgard.$moduleName.config.synchronizable");
    $entityToSync = $syncConfig["entities"][$params["name"]] ?? null;

    if(is_null($entityToSync)) throw new Exception("Entity to Sync not found", 404);

    $urlToImport = "$this->n8nBaseUrl/google-sheets/import";

    $currentModel = $this->modelRepository->getItem($params["name"], json_decode(json_encode([
      'filter' => ["field" => 'name']
    ])));

    if (!isset($currentModel)) throw new Exception("Name '{$params["name"]}' not found", 404);

    if ($currentModel->is_running) throw new Exception("'{$params["name"]}' is runing", 400);

    $sheets = json_decode($currentModel->sheets);
    // Retrieve the user ID who initiated the action
    $id = Auth::id();
    // Get token of soporte
    $token = $this->generateToken();

    $requestParams = [
      "spreadsheet_id" => $currentModel->spreadsheet_id,
      "domain_url" => $this->domain,
      "sheet_name" => $entityToSync["sheetName"],
      "name" => $params["name"],
      "sheets" => $sheets,
      "dependencies" => $entityToSync["dependencies"],
      "access_token" => $token,
      "requestParams" => $params["requestParams"],
      "module_name" => $moduleName
    ];

    // Send a POST request to N8N to export data to the spreadsheet
    $response = $this->client->request('POST',
      $urlToImport,
      [
        "body" => json_encode($requestParams),
        'headers' => [
          'Content-Type' => 'application/json'
        ]
      ]
    );

    $updateModel = $currentModel->update(['is_running' => 'import', 'last_sync' => now(), 'exported_by_id' => $id]);

    return ['data' => json_decode($response->getBody()->getContents())->message];
  }

  private function getToken($user)
  {
    if (isset($user))
      return $user->createToken('Laravel Password Grant Client');
    else return false;
  }

  //Generate token for email 'soporte@imaginacolombia.com'
  private function generateToken() {
    $modelUser = app('Modules\User\Repositories\UserRepository');
    //Get user soporte
    $user = $modelUser->getItem('soporte@imaginacolombia.com', json_decode(json_encode(['filter' => ['field' => 'email']])));

    // Login user soporte
    $user = Auth::guard('web')->loginUsingId($user->id);
    //Get Token
    $token = $this->getToken($user);

    return $token->accessToken;
  }
}
