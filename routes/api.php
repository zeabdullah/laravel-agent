<?php

use App\Http\Controllers\AgentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/agents', [AgentController::class, 'get']);
Route::post('/agents', [AgentController::class, 'create']);
