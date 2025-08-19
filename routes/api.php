<?php

use Illuminate\Support\Facades\Route;
use Modules\Isite\Http\Controllers\Api\ConfigsApiController;

Route::prefix('/isite/v1')->group(function () {
  Route::prefix('/configs')->group(function () {
    Route::get('/', [ConfigsApiController::class, 'index']);
    Route::get('/modules-info', [ConfigsApiController::class, 'modulesInfo']);
  });
});
