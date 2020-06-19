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

Route::get('patients', 'PatientController@index');
Route::get('patients/{id}', 'PatientController@show');
Route::post('patients', 'PatientController@store');
Route::put('patients/{id}', 'PatientController@update');
Route::delete('patients/{id}', 'PatientController@destroy');

//sociodemographic infor
Route::get('sd_info/{id}', 'SociodemographicController@show');

//fields patient
Route::get('form/patient-fields', 'FormsController@patientForm');

