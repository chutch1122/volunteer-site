<?php

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/dashboard', 'DashboardController@index');

Route::resource('/listings', 'ListingsController');

Route::resource('/organizations', 'OrganizationsController');