<?php

use Illuminate\Http\Request;

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

Route::post('/register', 'Api\LoginController@handleUpdateUser');

Route::post('/login', 'Api\LoginController@handleLogin');
Route::get('/logout', 'Api\LoginController@logout');

Route::get('/validate-user/{user}/{code}', 'Api\LoginController@ValidateUser');

Route::post('update-parameter', 'Api\ParametersController@update');
Route::get('get-parameter/{user_id}/{parameter_id}', 'Api\ParametersController@getData');