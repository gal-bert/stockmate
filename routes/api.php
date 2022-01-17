<?php

use App\Http\Controllers\API\StaffController;
use App\Models\Merchant;
use App\Models\Product;
use App\Models\Staff;
use App\Models\TransactionHeader;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/staffs', function(){
    return response()->json([
        'count' => Staff::count(),
        'staffs' => Staff::all()
    ]);
});

Route::get('/products', function(){
    return response()->json([
        'count' => Product::count(),
        'products' => Product::all()
    ]);
});

Route::get('/merchants', function(){
    return response()->json([
        'count' => Merchant::count(),
        'merchants' => Merchant::all()
    ]);
});

Route::get('/transactions', function(){
    return response()->json([
        'count' => TransactionHeader::count(),
        'transactions' => TransactionHeader::with('TransactionDetail')->get()
    ]);
});
