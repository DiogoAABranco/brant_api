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

//clinical info
Route::get('clinical-info/{id}', 'ClinicalInfoController@index');
Route::post('clinical-info/{id}', 'ClinicalInfoController@store');
Route::put('clinical-info/{id}', 'ClinicalInfoController@update');//id de clinical info to update
Route::delete('clinical-info/{id}', 'ClinicalInfoController@destroy');//id de clinical info to delete

//fields patient
Route::get('form/patient-fields', 'FormsController@patientForm');
Route::get('form/clinical-info-types', 'FormsController@clinicalInfo');

//training program
Route::get('training-program', 'TrainingProgramController@index');
Route::get('training-program/{id}', 'TrainingProgramController@show');
Route::post('training-program', 'TrainingProgramController@store');

//session
Route::delete('session/{id}', 'SessionController@destroy');

//games
Route::get('games', 'GameController@index');
Route::get('patients/{id}/recommended-games', 'GameController@recommendedGames');

//games variables
Route::put('game-variables', 'GameVariableController@update');

//simular sessões de treino
//id do programa a simular
//session -> id da sessão a simular
Route::get('simulate-program/{id}/session/{session}', 'SimulatorController@simulateNextSession');
Route::get('simulate-program/{id}', 'SimulatorController@simulateCompleteProgram');

//scores training program
Route::get('scores/training-program/{id}', 'ScoreController@programScore');

//domains
Route::get('domains', 'DomainController@index');

