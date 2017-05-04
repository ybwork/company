<?php

Route::get('/', [
	'as' => 'home',
	'uses' => 'Home\HomeController@index'
]);

Route::group(['prefix' => 'employee'], function() {
	Route::get('/', [
		'as' => 'employee_home',
		'uses' => 'Employee\EmployeeController@index'
	]);

	Route::post('store', [
		'as' => 'employee_store',
		'uses' => 'Employee\EmployeeController@store'
	]);

	Route::get('edit/{id}', [
		'as' => 'employee_edit',
		'uses' => 'Employee\EmployeeController@edit'
	]);

	Route::put('update/{id}', [
		'as' => 'employee_update',
		'uses' => 'Employee\EmployeeController@update'
	]);

	Route::delete('delete/{id}', [
		'as' => 'employee_destroy',
		'uses' => 'Employee\EmployeeController@destroy'
	]);
});

Route::group(['prefix' => 'department'], function() {
	Route::get('/', [
		'as' => 'department_home',
		'uses' => 'Department\DepartmentController@index'
	]);

	Route::post('store', [
		'as' => 'department_store',
		'uses' => 'Department\DepartmentController@store'
	]);

	Route::get('edit/{id}', [
		'as' => 'department_edit',
		'uses' => 'Department\DepartmentController@edit'
	]);

	Route::put('update/{id}', [
		'as' => 'department_update',
		'uses' => 'Department\DepartmentController@update'
	]);

	Route::delete('delete/{id}', [
		'as' => 'department_destroy',
		'uses' => 'Department\DepartmentController@destroy'
	]);
});