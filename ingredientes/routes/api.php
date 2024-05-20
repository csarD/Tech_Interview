<?php

use App\Http\Controllers\IngredientsController;
use App\Http\Controllers\Market;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::resource('Ingredients', IngredientsController::class);
Route::get('Market', [Market::class,'index']);
