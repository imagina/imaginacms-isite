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
    $this->modelRepository = $modelRepository;
  }

  public function createSheet($params)
  {
    $syncConfig = config("asgard.{$params["module"]}.config.synchronizable");

    // Get all sync by module
    $currentModel = $this->modelRepository->getItemsBy(json_decode(json_encode([
      'filter' => ["name" => ['where' => 'in', 'value' => $syncConfig['entities']]]
    ])));
    // Search for a sheetId
    $sheetId = $currentModel->whereNotNull('sheet_id')->first();

    if (!$sheetId) {
      // Create sheet and put the id on $sheetId
      $oldEnabledEmails = explode(',', $currentModel->first()->enabled_emails) ?? null;

      $siteName = setting('core::site-name');

      $requestParams = [
        "title" => "{$params["module"]} $siteName",
        "template_sheet_id" => $syncConfig['template_id'],
        "sheet_id" => null,
        "old_enabled_emails" => $oldEnabledEmails,
        "enabled_emails" => $params["enabled_emails"]
      ];

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

      $sheetId = json_decode($response->getBody()->getContents())->sheet_id;
      // Sync the sheet_id attribute
      foreach ($currentModel as $model) {
        $model->update(['sheet_id' => $sheetId]);
      }

    }


    return ["data" => "Request successful"];

  }

  public function exportData($params)
  {
    $moduleName = explode('_', $params["name"])[0];
    $urlToExport = "$this->n8nBaseUrl/google-sheets/export/";

    //Get url of app
    $domain = env("APP_URL");

    $currentModel = $this->modelRepository->getItem($params["name"], json_decode(json_encode([
      'filter' => ["field" => 'name']
    ])));

    if (!isset($currentModel)) throw new Exception("Name '{$params["name"]}' not found", 404);

    if($currentModel->is_running === 1) throw new Exception("'{$params["name"]}' is runing", 400);

    // Retrieve the user ID who initiated the action
    $id = Auth::id();
    // Get token of soporte
    $token = $this->generateToken();

    $requestParams = [
      "name" => $params["name"],
      "domain_url" => $domain,
      "sheet_id" => $currentModel->sheet_id,
      "access_token" => $token,
      "requestParams" => $params["requestParams"]
    ];

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

    $updateModel = $currentModel->update(['is_running' => 1, 'last_sync' => now(), 'exported_by_id' => $id]);

    return ['data' => json_decode($response->getBody()->getContents())->message];
  }

  public function importData($params)
  {

    if ($params["name"] === 'icommerce_syncCategories') throw new Exception("Cannot be imported", 400);
    $moduleName = explode('_', $params["name"])[0];
    $urlToImport = "$this->n8nBaseUrl/google-sheets/import/$moduleName";

    $currentModel = $this->modelRepository->getItem($params["name"], json_decode(json_encode([
      'filter' => ["field" => 'name']
    ])));

    if (!isset($currentModel)) throw new Exception("Name '{$params["name"]}' not found", 404);

    if ($currentModel->is_running === 1) throw new Exception("'{$params["name"]}' is runing", 400);

    //Get url of app
    $domain = env("APP_URL");
    // Retrieve the user ID who initiated the action
    $id = Auth::id();
    // Get token of soporte
    $token = $this->generateToken();

    $requestParams = [
      "sheet_id" => $currentModel->sheet_id,
      "domain_url" => $domain,
      "name" => $params["name"],
      "access_token" => $token,
      "requestParams" => $params["requestParams"]
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

    $updateModel = $currentModel->update(['is_running' => 1, 'last_sync' => now(), 'exported_by_id' => $id]);

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
