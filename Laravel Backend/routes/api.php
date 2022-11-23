<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\Admin\AuctionController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
$api = app('Dingo\Api\Routing\Router');
$api->version('v1', ['namespace' => 'App\Http\Controllers\Api\v1\Admin'], function ($api) {

    $api->post('auth/signUp', 'Auth\SignUpController@signUp');
    $api->post('auth/updateUser/{id}', 'Auth\SignUpController@updateUser');
    $api->post('auth/login', 'Auth\SignUpController@login');
    $api->get('open', 'Auth\DemoController@open');
    $api->get('open', 'Auth\DemoController@open');
    $api->get('auction', 'AuctionContoller@auction');
    $api->get('lots', 'LotsContoller@getLots');
    $api->get('materials', 'MaterialController@getMaterials');

    Route::group(['middleware' => 'jwt.verify', 'namespace' => 'App\Http\Controllers\Api\v1\Admin'], function () {
        Route::get('user', 'Auth\SignUpController@getAuthenticatedUser');
        Route::get('closed', 'Auth\DemoController@closed');
    });
    // Route::group(['middleware' => 'jwt.auth'], function () {
    //     Route::get('user', 'Auth\LoginController@getAuthUser');
    // });
});
// Route::group([

//     'middleware' => 'api',
//     'namespace' => 'App\Http\Controllers',
//     'prefix' => 'auth'

// ], function ($router) {

//     Route::post('login', 'Auth\SignUpController@signUp');
//     Route::post('logout', 'AuthController@logout');
//     Route::post('refresh', 'AuthController@refresh');
//     Route::post('me', 'AuthController@me');

// });
