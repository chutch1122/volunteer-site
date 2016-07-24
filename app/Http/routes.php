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

Route::get('/organizations/{organizationId}/contacts/create', 'ContactsController@create');
Route::post('/organizations/{organizationId}/contacts/create', 'ContactsController@store');
Route::get('/organizations/{organizationId}/contacts/{contactId}/edit', 'ContactsController@edit');
Route::put('/organizations/{organizationId}/contacts/{contactId}', 'ContactsController@update');
Route::get('/organizations/{organizationId}/contacts/{contactId}/delete', 'ContactsController@destroy');
