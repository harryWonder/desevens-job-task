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

// Token Verification || User...
Route::middleware('auth:api')->get('/v1/user', function (Request $request) {
  return response()->json([ 'Token Valid' ]);
});

// Token Verification || Admin...
Route::middleware('auth:api')->get('/v1/admin', function (Request $request) {
  return response()->json([' Token Invalid ']);
});

// Token Verification || Driver...
Route::middleware('auth:api')->get('/v1/driver', function (Request $request) {
  return response()->json([' Token Invalid ']);
});


// Authentication Routes...
Route::post('/v1/login/admin', 'AuthController@adminLogin');
Route::post('/v1/login/driver', 'AuthController@driverLogin');
Route::post('/v1/login/customer', 'AuthController@loginCustomer');
Route::post('/v1/create/customer', 'AuthController@createCustomer');
Route::post('/v1/create/customer', 'AuthController@createCustomer');
Route::post('/v1/activate/customer/account/{token}', 'AuthController@activateCustomerAccount');
Route::post('/v1/send/activation/code/{emailAddress}', 'AuthController@resendToken');

// Category Routes....
Route::post('/v1/create/category', 'CategoryController@create');
Route::get('/v1/fetch/category/{slug}', 'CategoryController@fetchCategory');
Route::get('/v1/update/category', 'CategoryController@updateCategory');
Route::post('/v1/update/category/{slug}/{status}', 'CategoryController@updateStatus');
Route::post('/v1/delete/category/{slug}', 'CategoryController@updateCategory');
