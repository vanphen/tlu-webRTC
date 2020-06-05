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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group([
  'prefix' => 'user'
], function () {
  Route::post('login', 'api\v1\LoginController@login');
  Route::post('signup', 'AuthController@signup');
 
  Route::group([
    'middleware' => 'auth:api'
  ], function() {
      Route::delete('logout', 'AuthController@logout');
      Route::get('me', 'AuthController@user');
  });
});