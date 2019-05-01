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


//auth controller routes
Route::post('/register', 'API\AuthController@register');
Route::post('/login', 'API\AuthController@login');

Route::post('/add-image', 'FileController@imageSubmit');
Route::post('/add-file', 'FileController@pdfSubmit');

Route::middleware('auth:api')->group(function () {
    Route::post('/logout', 'API\AuthController@logout');
    Route::get('/get-user', 'API\AuthController@getUser');




    Route::get('/books', 'BookController@index');
    Route::get('/book', 'BookController@getBooks');
    Route::get('/book/search', 'BookController@searchBook');
    Route::post('/books', 'BookController@store');
    Route::get('/books/{book}', 'BookController@show');
    Route::post('/books/{book}', 'BookController@update');
    Route::get('/book/{book}', 'BookController@destroy');



});
