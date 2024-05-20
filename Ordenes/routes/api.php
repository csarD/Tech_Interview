<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/newOrder',[\App\Http\Controllers\Orders::class,'create']);
Route::post('/validateStatus',[\App\Http\Controllers\Orders::class,'Status']);
Route::get('/all',[\App\Http\Controllers\Orders::class,'index'])->name('allOrders');
Route::post('/all',[\App\Http\Controllers\Orders::class,'all'])->name('allOrdersTotal');
