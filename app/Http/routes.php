<?php

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/dashboard', 'DashboardController@index');

Route::resource('/listings', 'ListingsController');
Route::get('/listings/{id}/close', 'ListingsController@close');
Route::get('/listings/{id}/open', 'ListingsController@open');
Route::get('/listings/{id}/volunteer', 'ListingsController@apply');
Route::post('/listings/{id}/volunteer', 'ListingsController@doApply');
Route::get('/listings/{id}/withdraw', 'ListingsController@withdraw');
Route::get('/listings/{id}/volunteers/{volunteerId}/approve', 'ListingsController@approveVolunteer');
Route::get('/listings/{id}/volunteers/{volunteerId}/reject', 'ListingsController@rejectVolunteer');

Route::resource('/organizations', 'OrganizationsController');