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
Route::get('/', function () {
    echo "api rodando";
});

Route::group(['middleware' => ['apiJwt', 'checkUserType'], 'prefix' => 'auth',], function ($router) {

    //User
    Route::middleware(['checkUser'])->group(function () {
        Route::post('user-update/{id}', 'V1\\UserController@update');
        Route::get('user-show/{id}', 'V1\\UserController@show');
    });

    //User Type
    Route::middleware(['blockRoute'])->group(function () {
        Route::post('user-type-register', 'V1\\UserTypeController@store');
        Route::post('user-type-update/{id}', 'V1\\UserTypeController@update');

        Route::get('user-type-show/{id}', 'V1\\UserTypeController@show');
        Route::get('user-type', 'V1\\UserTypeController@index');

    });
});

Route::group(['prefix' => ''], function ($router) {
    Route::post('register-user', 'V1\\UserController@store');
    Route::post('login', 'V1\\AuthController@login');
    Route::get('example-weather/{id}', 'V1\\ExampleWeatherCotroller@show');
    Route::get('cnae', 'V1\\IbgeController@show');
    Route::get('irs/{cnpj}', 'V1\\IrsController@show');
    Route::post('boleto', 'V1\\BbController@regiterBoleto');
});
