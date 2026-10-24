<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TokenController;
use App\Http\Controllers\Api\StudentApiController;

Route::post('/tokens/create', [TokenController::class, 'create']);

Route::middleware('auth:sanctum')->get(
    '/students',
    [StudentApiController::class, 'index']
);
