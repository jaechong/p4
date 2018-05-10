<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'PageController@welcome');
Route::get('/menu', 'PageController@menu');

/**
 * s
 */
# CREATE
# Show the form to add a new order
Route::get('/orders/create', 'OrderController@create');

# Process the form to add a new order
Route::post('/orders', 'OrderController@store');

# READ
# Show a listing of all the orders
Route::get('/orders', 'OrderController@index');
#Route::post('/orders', 'OrderController@index');

# Show an individual book
Route::get('/orders/{id}', 'OrderController@show');

# UPDATE
# Show the form to edit a specific book
Route::get('/orders/{id}/edit', 'OrderController@edit');

# Process the form to edit a specific book
Route::put('/orders/{id}', 'OrderController@update');

# DELETE
# Show the page to confirm deletion of a book
Route::get('/orders/{id}/delete', 'OrderController@delete');

# Process the deletion of a book
Route::delete('/orders/{id}', 'OrderController@destroy');

