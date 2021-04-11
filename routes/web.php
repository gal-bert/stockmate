<?php

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

Route::view('/', 'pages.dashboard.index')->name('dashboard');

Route::view('/inbound', 'pages.log_transaction.inbound.index')->name('inbound');
Route::view('/outbound', 'pages.log_transaction.outbound.index')->name('outbound');
Route::view('/transactions', 'pages.transaction_history.index')->name('transaction');
Route::view('/inventory', 'pages.inventory.index')->name('inventory');
Route::view('/merchants', 'pages.merchants.index')->name('merchants');
