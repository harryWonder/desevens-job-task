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
  if (isset($request->user()->last_name) && isset($request->user()->first_name) && isset($request->user()->status) == 1) {
    $Response = ['status' => 'isValid'];
    return response()->json($Response, 200);
  } else {
    $Response = ['status' => 'inValid'];
    return response()->json($Response, 401);
  }
});

// Token Verification || Admin...
Route::middleware('auth:api-admin')->get('/v1/admin', function (Request $request) {
  if (isset($request->user()->roles) && !empty($request->user()->roles)) {
    $Response = ['status' => 'isValid'];
    return response()->json($Response, 200);
  } else {
    $Response = ['status' => 'inValid'];
    return response()->json($Response, 401);
  }
});

// Token Verification || Driver...
Route::middleware('auth:api-driver')->get('/v1/driver', function (Request $request) {
  if (isset($request->user()->driver_id) && !empty($request->user()->driver_id)) {
    $Response = ['status' => 'isValid'];
    return response()->json($Response, 200);
  } else {
    $Response = ['status' => 'inValid'];
    return response()->json($Response, 401);
  }
});

// Authentication Routes...
Route::post('/v1/login/admin', 'AuthController@adminLogin');
Route::post('/v1/login/driver', 'AuthController@driverLogin');
Route::post('/v1/login/customer', 'AuthController@loginCustomer');
Route::post('/v1/create/customer', 'AuthController@createCustomer');
Route::post('/v1/create/customer', 'AuthController@createCustomer');
Route::get('/v1/activate/customer/account/{token}', 'AuthController@activateCustomerAccount');
Route::post('/v1/send/activation/code/{emailAddress}', 'AuthController@resendToken');

// Category Routes....
Route::middleware('auth:api-admin')->post('/v1/admin/create/category', 'CategoryController@create');
Route::middleware('auth:api-admin')->get('/v1/admin/fetch/category/{slug}', 'CategoryController@fetchCategory');
Route::middleware('auth:api-admin')->post('/v1/admin/update/category', 'CategoryController@updateCategory');
Route::middleware('auth:api-admin')->get('/v1/admin/update/category/{slug}/{status}', 'CategoryController@updateStatus');
Route::middleware('auth:api-admin')->post('/v1/admin/delete/category/{slug}', 'CategoryController@updateCategory');
Route::middleware('auth:api-admin')->get('/v1/admin/fetch/categories', 'CategoryController@fetchCategories');

// Product Routes...
Route::middleware('auth:api-admin')->post('/v1/admin/create/product', 'ProductsController@create');
Route::middleware('auth:api-admin')->post('/v1/admin/update/product/{productId}', 'ProductsController@updateProduct');
Route::middleware('auth:api-admin')->get('/v1/admin/fetch/products', 'ProductsController@fetchProducts');
Route::middleware('auth:api-admin')->delete('/v1/admin/delete/product/{id}', 'ProductsController@deleteProduct');

// Transaction && Order Routes...
Route::middleware('auth:api')->get('/v1/admin/orders', 'OrdersController@fetchOrdersAdmin');
Route::middleware('auth:api')->post('/v1/user/purchase', 'OrdersController@initializeOrder');
Route::middleware('auth:api')->get('/v1/user/orders/{email}', 'OrdersController@fetchOrdersCustomer');
Route::middleware('auth:api-driver')->get('/v1/driver/orders/', 'OrdersController@fetchOrdersDriver');
Route::middleware('auth:api-driver')->get('/v1/driver/take/order/{orderId}/{driverId}', 'OrdersController@takeOrder');
Route::middleware('auth:api-driver')->get('/v1/driver/complete/order/{orderId}/{driverId}', 'OrdersController@completeOrder');
Route::middleware('auth:api-admin')->get('/v1/admin/approve/order/{orderId}/{type}', 'OrdersController@approveOrder');

// User Dashboard Routes...
Route::get('/v1/user/verify/purchase', 'OrdersController@verifyTransaction');

// Home Page Routes || Application Routes....
Route::get('/v1/fetch/categories', 'HomeController@fetchCategories');
Route::get('/v1/fetch/products', 'HomeController@fetchProducts');
