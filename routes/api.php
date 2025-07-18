<?php

use App\Http\Controllers\Agent\AgentWithUuidController;
use App\Http\Controllers\Agent\AgentController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'agents'], function () {
    Route::get('/', [AgentController::class, 'get']);
    Route::post('/', [AgentController::class, 'create']);
    Route::get('/except_google', [AgentController::class, 'getExceptGoogle']);
    Route::get('/get_by_provider', [AgentController::class, 'getByProvider']);
    Route::get('/names', [AgentController::class, 'listAgentNames']);
    Route::post('/double_price', [AgentController::class, 'doublePrices']);
    Route::post('/groqify/{id}', [AgentController::class, 'groqify']);
});

Route::group(['prefix' => 'uuid_agents'], function () {
    Route::get('/', [AgentWithUuidController::class, 'get']);
    Route::post('/', [AgentWithUuidController::class, 'create']);
});
