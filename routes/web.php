<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::apiResource('chats', App\Http\Controllers\ChatController::class);


Route::get('chats/{userId}', [App\Http\Controllers\ChatController::class, 'index']);
Route::post('chats/createChat/', [App\Http\Controllers\ChatController::class, 'create']);
Route::post('chats/', [App\Http\Controllers\ChatController::class, 'store']);


Route::post('/file/upload', [App\Http\Controllers\FileController::class, 'upload']);
Route::get('/file/photo/{photo}', [App\Http\Controllers\FileController::class, 'photo']);

Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);
Route::post('/register', [App\Http\Controllers\AuthController::class, 'register']);
Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout']);
