<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExcellController;
use App\Http\Controllers\SociosController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/', function (Request $request) {
    return 'Hola Torre';
});
Route::get('/socios/{p1?}/{p2?}/{p3?}/{p4?}',  [SociosController::class,'index']);

Route::get('/excell/{hoja?}', [ExcellController::class,'index']);

Route::get('/spread/{hoja?}', [ExcellController::class,'spread']);

