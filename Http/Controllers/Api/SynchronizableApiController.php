<?php

namespace Modules\Isite\Http\Controllers\Api;

use http\Params;
use Illuminate\Http\Request;
use Modules\Core\Icrud\Controllers\BaseCrudController;

//Model
use Modules\Isite\Entities\Synchronizable;
use Modules\Isite\Repositories\SynchronizableRepository;
use Mockery\CountValidator\Exception;
use Modules\Isite\Services\SynchronizableService;

class SynchronizableApiController extends BaseCrudController
{
  public $model;
  public $modelRepository;
  private $synchronizableService;

  public function __construct(Synchronizable $model, SynchronizableRepository $modelRepository)
  {
    $this->model = $model;
    $this->modelRepository = $modelRepository;
    $this->synchronizableService = new SynchronizableService($modelRepository);
  }

  /**
   * Validate and generate the sheet by porject/module/entity
   *
   * @param Request $request
   * @return void
   */
  public function generateSpreadSheet(Request $request)
  {
    try {
      $params = $request->input('attributes') ?? [];
      $response = $this->synchronizableService->createSheet($params);
    } catch (\Exception $e) {
      $status = $this->getStatusError($e->getCode());
      $response = ["errors" => $e->getMessage()];
    }

    return response()->json($response ?? ["data" => "Request successful"], $status ?? 200);
  }

  public function sync(Request $request)
  {
    $params = $request->input('attributes') ?? [];

    try {
      if(!isset($params["type"])) throw new Exception("Type is required", 400);

      // Validate if should Import type. then call service to import
      if ($params["type"] === 'export') {
        $response = $this->synchronizableService->exportData($params);
      } else if ($params["type"] === 'import') {
        // Else... call service to export
        $response = $this->synchronizableService->importData($params);
        // Only exist two types 'export' or 'import'
      } else throw new Exception("Incorrect type", 400);

    } catch (\Exception $e) {
      $status = $e->getCode() === 0 ? $this->getStatusError($e->getCode()) : $e->getCode();
      $response = [
        "errors" => $e->getMessage(),
        "messages" => [['type' => 'error', 'message' => trans('isite::cms.modal.failedSync')]]
      ];
    }

    return response()->json($response ?? ["data" => "Request successful"], $status ?? 200);


  }
}
