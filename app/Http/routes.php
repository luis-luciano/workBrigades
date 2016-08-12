<?php

Route::get('/',['as'=>'home','uses'=>'PagesController@index']);
Route::get('Peticion-publica', ['as' => 'Peticion-publica', 'uses' => 'PagesController@create']);
Route::post('Peticion-publica/create', ['as' => 'Peticion-publica.create', 'uses' => 'PagesController@store']);

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
// Request Files
//Route::get('requests/{requests}/files/{files}', ['as' => 'requests.files.show', 'uses' => 'RequestFileController@show']);
//Route::post('requests/{requests}/files', ['as' => 'requests.files.store', 'uses' => 'RequestFileController@store']);
//Route::delete('requests/{requests}/files/{files}', ['as' => 'requests.files.destroy', 'uses' => 'RequestFileController@destroy']);

Route::get('request/sector-brigade', ['as' => 'request.sector-brigade', 'uses' => 'RequestsController@findSectorBrigade']);
// Requests Files
Route::get('requests/{requests}/files/{files}', ['as' => 'requests.files.show', 'uses' => 'RequestFileController@show']);
Route::post('requests/{requests}/files', ['as' => 'requests.files.store', 'uses' => 'RequestFileController@store']);
// Requests Conclude
Route::post('requests/{requests}/conclude', ['as' => 'requests.conclude', 'uses' => 'RequestsController@conclude']);
// Request Not Approved
Route::post('requests/{requests}/unapproved', ['as' => 'requests.unapproved', 'uses' => 'RequestRejectionsController@updateOrStore']);
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

Route::get("prueba", function(){
	return view("admin.users.profile");
});

