<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('/signup', [App\Http\Controllers\Auth\AuthController::class, 'signUp']);

Route::post('/login', [App\Http\Controllers\Auth\AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    
    Route::resource('clients', App\Http\Controllers\ClientController::class);

    //CSV file
    Route::get('clients_export',[App\Http\Controllers\ClientController::class, 'export']);
    Route::post('clients_import',[App\Http\Controllers\ClientController::class, 'import']);

    Route::resource('products', App\Http\Controllers\ProductController::class);
    Route::resource('bills', App\Http\Controllers\BillController::class);
    Route::resource('bills_products', App\Http\Controllers\BillProductController::class);

    Route::post('/logout', [App\Http\Controllers\Auth\AuthController::class, 'logout']);
});