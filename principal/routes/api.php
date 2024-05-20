<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/newOrder',[\App\Http\Controllers\Principal::class,'create']);
Route::post('/validateStatus',[\App\Http\Controllers\Principal::class,'validate']);
Route::get('/ActiveOrders',[\App\Http\Controllers\Principal::class,'index'])->name('ActiveOrders');
