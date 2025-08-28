<?php

namespace Modules\Isite\Http\Controllers\Api;

use Illuminate\Http\Request;
use Imagina\Icore\Traits\Controller\CoreApiControllerHelpers;
use Illuminate\Http\JsonResponse;

class ConfigsApiController
{
  use CoreApiControllerHelpers;

  private $module;

  public function __construct()
  {
    $this->module = app('modules');
  }

  //Return fields
  public function index(Request $request): JsonResponse
  {

    try {
    $configName = $request->input('configName') ?? $request->input('configNameByModule') ?? null; //Get config name filter
    $configNameByModule = $request->input('configNameByModule') ?? null;
    $byModule = isset($configNameByModule);//Get config name by module filter

    //Get config
    $response = iconfig($configName, $byModule);

    //Validate Response
    if ($response == null) {
      throw new \Exception('Item not found', 204);
    }
    //Response data
    $response = ['data' => $this->translateLabels($response)];
    } catch (\Exception $e) {
      [$status, $response] = $this->getErrorResponse($e);
    }

    //Return response
    return response()->json($response, $status ?? 200);
  }

  //Recursive Translate labels
  public function translateLabels($data)
  {
    $ignoreKeys = ['systemname', 'namespace'];

    if (is_array($data)) {
      foreach ($data as $key => &$item) {
        if (is_string($item) && !in_array(strtolower($key), $ignoreKeys)) {
          $item = trans($item);
        } elseif (is_array($item)) {
          $item = $this->translateLabels($item);
        }
      }
    }

    return $data;
  }

  /** Return the modules information */
  public function modulesInfo(Request $request): JsonResponse
  {
    try {
      $params = $this->getParamsRequest($request); //Get Parameters from URL.
      $enabledModules = $this->module->allEnabled(); //Get all modules
      $modulesInfo = []; //Instance module info
      $tmpId = 1; //Instance Id

      //Instance module information
      foreach (array_keys($enabledModules) as $key => $moduleName) {
        $modulesInfo[$moduleName] = (object)[
          'id' => $tmpId,
          'parentId' => 0,
          'name' => $moduleName,
          'path' => "Modules\\{$moduleName}",
          'entities' => [],
        ];
        //Increment UID
        $tmpId += 1;
      }

      //Get entities by module
      foreach (array_keys($enabledModules) as $keyModule => $moduleName) {
        $allFiles = \File::glob(base_path("Modules/{$moduleName}/Entities/*.php"));
        foreach ($allFiles as $keyEntity => $entity) {
          $modulesInfo[$moduleName]->entities[] = (object)[
            'id' => $tmpId,
            'parentId' => $modulesInfo[$moduleName]->id,
            'name' => pathinfo($entity, PATHINFO_FILENAME),
            'path' => str_replace('/', '\\', str_replace('.php', '', explode('icms/', $entity)[1])),
          ];
          //Increment UID
          $tmpId += 1;
        }
      }

      //Order data to select if request as filter
      if (isset($params->filter->asSelect) && $params->filter->asSelect) {
        $modulesInfoAsSelect = [];
        foreach (array_keys($enabledModules) as $moduleName) {
          $modulesInfoAsSelect[] = $modulesInfo[$moduleName];
          $modulesInfoAsSelect = array_merge($modulesInfoAsSelect, $modulesInfo[$moduleName]->entities);
        }
        //Clear data
        foreach ($modulesInfoAsSelect as $item) {
          if (isset($item->entities)) {
            unset($item->entities);
          }
        }
        //Replace module info response
        $modulesInfo = $modulesInfoAsSelect;
      }

      //Response data
      $response = ['data' => $modulesInfo];
    } catch (\Exception $e) {
      [$status, $response] = $this->getErrorResponse($e);
    }

    //Return response
    return response()->json($response, $status ?? 200);
  }
}
