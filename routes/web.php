<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();



Route::group(['middleware' => 'auth'], function () {

    Route::resource('/', \App\Http\Controllers\DashboardController::class);
    Route::resource('inbound', \App\Http\Controllers\InboundController::class);
    Route::resource('/outbound', \App\Http\Controllers\OutboundController::class);
    Route::resource('/transactions', \App\Http\Controllers\TransactionHistoryController::class);
    Route::resource('/inventory', \App\Http\Controllers\InventoryController::class);
    Route::put('/inventory/{product_id}/qty/{qty_id}', [\App\Http\Controllers\InventoryController::class, 'updateQty'])
        ->name('inventory.updateQty');

    Route::resource('/merchants', \App\Http\Controllers\MerchantController::class);
    Route::resource('/staffs', \App\Http\Controllers\StaffController::class);
});



