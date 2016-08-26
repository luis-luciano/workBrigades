<?php

Route::get('/',['as'=>'home','uses'=>'PagesController@index']);
Route::resource('Peticion-publica','PagesController');
Route::post('findRequest', ['as'=>'findRequest','uses'=>'PagesController@findRequest']);

Route::resource('admin', 'AdminController');

Route::resource('users', 'UsersController');
Route::resource('activities', 'ActivitiesController');
Route::resource('brigades', 'BrigadesController');
Route::resource('citizens', 'CitizensController');
Route::resource('colonies/scopes', 'ColonyScopesController');
//Route::post('colonies/settlement-types',['as' => 'settlement-types.store', 'uses' => 'SettlementTypesController@store']);
Route::resource('colonies/settlement-types', 'SettlementTypesController');
Route::resource('colonies', 'ColoniesController');

Route::resource('notifications', 'NotificationsController');
Route::resource('permissions', 'PermissionsController');
Route::resource('personalInformations', 'PersonalInformationsController');
Route::resource('problemTypes', 'ProblemTypesController');

Route::get('request/sector-brigade', ['as' => 'request.sector-brigade', 'uses' => 'RequestsController@findSectorBrigade']);

// Requests Locations
Route::put('requests/{requests}/locations', ['as' => 'requests.locations.update', 'uses' => 'RequestLocationController@updateOrStore']);
Route::delete('requests/{requests}/locations', ['as' => 'requests.locations.destroy', 'uses' => 'RequestLocationController@destroy']);

// Requests Files
Route::get('requests/{requests}/files/{files}', ['as' => 'requests.files.show', 'uses' => 'RequestFileController@show']);
Route::post('requests/{requests}/files', ['as' => 'requests.files.store', 'uses' => 'RequestFileController@store']);

// Requests Conclude
Route::post('requests/{requests}/conclude', ['as' => 'requests.conclude', 'uses' => 'RequestsController@conclude']);

// Request Rejection and unapproved
Route::post('requests/{requests}/unapproved', ['as' => 'requests.unapproved', 'uses' => 'RequestRejectionsController@updateOrStore']);

// Request In Process
Route::post('requests/{requests}/in-process', ['as' => 'requests.in-process', 'uses' => 'RequestsController@inProcess']);
Route::resource('requests', 'RequestsController');
Route::resource('requestsPriorities', 'RequestPrioritiesController');
Route::resource('requestRejections', 'RequestRejectionsController');
Route::resource('requestsStates', 'RequestStatesController');
Route::resource('requestTypes', 'RequestTypesController');
Route::resource('roles', 'RolesController');
Route::resource('sectors', 'SectorsController');
Route::resource('settings', 'SettingsController');

Route::resource('supervicionables', 'SupervicionablesController');
Route::resource('supervisions', 'SupervisionsController');
Route::resource('typologies', 'TypologiesController');
Route::resource('captureTypes', 'CaptureTypesController');

// Authentication routes...
Route::auth();
//Route::get('login', ['as' => 'login', 'uses' => 'Auth\AuthController@getLogin']);
//Route::post('login', 'Auth\AuthController@postLogin');
//Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');



//Routes for ajax call
Route::group(['namespace' => 'Ajax','prefix' => 'ajax'],function(){
	Route::resource('citizens','CitizensController');
	Route::resource('colonies','ColoniesController');
});

Route::get('graficas', 'PagesController@showGraphics');


Route::get("select", function(){
	return view("select");
});



//Latitud: 18.892679 | Longitud: -96.947475
