<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExcellController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/', function (Request $request) {
    return 'Hola';
});
Route::get('/excell/{hoja?}', [ExcellController::class,'index']);
Route::get('/spread/{hoja?}', [ExcellController::class,'spread']);