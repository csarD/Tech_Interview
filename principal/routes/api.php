<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/newOrder',[\App\Http\Controllers\Principal::class,'create']);
Route::post('/validateStatus',[\App\Http\Controllers\Principal::class,'validate']);
Route::get('/ActiveOrders',[\App\Http\Controllers\Principal::class,'index'])->name('ActiveOrders');
Route::get('/Orders',[\App\Http\Controllers\Principal::class,'TotalOrders'])->name('Active');
Route::get('/Bodega',[\App\Http\Controllers\Principal::class,'Bodega'])->name('Bodega');
Route::get('/Market',[\App\Http\Controllers\Principal::class,'Pedidos'])->name('Pedidos');
Route::get('/Recetas',[\App\Http\Controllers\Principal::class,'Recetas'])->name('Recetas');
