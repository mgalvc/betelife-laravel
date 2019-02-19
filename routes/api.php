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

Route::group([
    'prefix' => 'auth'
], function () {
   Route::post('login', 'AuthController@login');
   Route::post('signup', 'AuthController@signup');

   Route::group([
       'middleware' => 'auth:api'
   ], function () {
       Route::get('logout', 'AuthController@logout');
       Route::get('user', 'AuthController@user');
   });
});

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/count', 'Controller@getGeneralCount');

    Route::get('/students', 'StudentController@getStudents');
    Route::post('/students', 'StudentController@create');
    Route::post('/volunteers', 'VolunteerController@create');

    Route::get('/students/{student}', 'StudentController@getStudent');
    Route::get('/students/{student}/print', 'StudentController@pdf');
    Route::get('/volunteers', 'VolunteerController@getVolunteers');
    Route::get('/volunteers/{volunteer}', 'VolunteerController@getVolunteer');

    Route::put('/students/{student}', 'StudentController@update');
    Route::put('/students/{student}/status', 'StudentController@updateStatus');
    Route::put('/volunteers/{volunteer}', 'VolunteerController@update');
    Route::put('/volunteers/{volunteer}/status', 'VolunteerController@updateStatus');

    Route::delete('/students/{student}', 'StudentController@delete');
    Route::delete('/volunteers/{volunteer}', 'VolunteerController@delete');
});
