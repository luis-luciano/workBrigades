<?php

Route::resource('admin', 'AdminController');

Route::resource('users', 'UserController');
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
Route::resource('requests', 'RequestsController');
Route::resource('requestsPriorities', 'RequestPrioritiesController');
Route::resource('requestRejections', 'RequestRejectionsController');
Route::resource('requestsStates', 'RequestStatesController');
Route::resource('requestsTypes', 'RequestTypesController');
Route::resource('roles', 'RolesController');
Route::resource('sectors', 'SectorsController');
Route::resource('settings', 'SettingsController');

Route::resource('supervicionables', 'SupervicionablesController');
Route::resource('supervisions', 'SupervisionsController');
Route::resource('typologies', 'TypologiesController');
Route::resource('captureTypes', 'captureTypesController');

// Authentication routes...
Route::get('auth/login', ['as' => 'login', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
