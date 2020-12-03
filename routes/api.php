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


//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});


//Route::resource('/person', 'PersonController');

Route::group([
    'middleware' => 'api',
    'prefix'     => 'auth'
], function () {
    Route::post('login',   'AuthController@login');
    Route::post('logout',  'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('register','AuthController@register');
    Route::post('me',      'AuthController@me');
});

Route::prefix('v1')->group(function(){
   Route::resource('/person', 'Api\v1\PersonController')->only(['index', 'show', 'update', 'destroy']);
});

Route::prefix('v2')->group(function(){
    Route::resource('/person', 'Api\v2\PersonController')->only(['index', 'show', 'update', 'destroy']);
});
