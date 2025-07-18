<?php

use App\Http\Controllers\Agent\AgentWithUuidController;
use App\Http\Controllers\Agent\AgentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'agents'], function () {
    Route::get('/', [AgentController::class, 'get']);
    Route::get('/names', [AgentController::class, 'listAgentNames']);
    Route::post('/', [AgentController::class, 'create']);
});

Route::group(['prefix' => 'uuid_agents'], function () {
    Route::get('/', [AgentWithUuidController::class, 'get']);
    Route::post('/', [AgentWithUuidController::class, 'create']);
});
