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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

//without token
Route::post('login', 'UserController@login');
Route::post('register', 'UserController@register');


//acesso only with token
Route::group(['middleware' => 'auth:api'], function(){

    Route::post('details', 'UserController@details');


});




Route::get('patients', 'PatientController@index');
Route::get('patients/{id}', 'PatientController@show');
Route::post('patients', 'PatientController@store');
Route::put('patients/{id}', 'PatientController@update');
Route::delete('patients/{id}', 'PatientController@destroy');
Route::get('patients/{id}/assessments', 'PatientController@assessments');


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

//assessmentTools
Route::get('assessment-tools', 'AssessmentToolController@index');
Route::get('assessment-tools/{id}', 'AssessmentToolController@show');
Route::post('assessment-tools', 'AssessmentToolController@store');
Route::delete('assessment-tools/{id}', 'AssessmentToolController@destroy');

//patient assessments
Route::get('assessments', 'AssessmentSessionController@index');
Route::get('assessments/{id}', 'AssessmentSessionController@show');
Route::post('assessments', 'AssessmentSessionController@store');


//return images
Route::get('images/{id}', 'ImageController@show');



