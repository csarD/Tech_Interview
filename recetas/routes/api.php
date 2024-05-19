<?php

use App\Http\Controllers\Recipes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/required/{id}',[Recipes::class,'ReqIngredients']);
Route::get('/Recipes',[Recipes::class,'index']);
