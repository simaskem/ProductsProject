<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/laravel', function () {
    return Redirect::to("https://laravel.com/docs/5.2/");
});

Route::auth();

Route::group(['middleware' => 'auth'], function () {

    Route::resource('category', 'CategoryController');
    Route::get('/show_related/{category}', ['as'=>'category.related', 'uses' => 'CategoryController@showRelatedProducts']);

    Route::resource('product', 'ProductController');

});
 
Route::group(['middleware' => 'api', 'prefix' => 'api'], function () {
    
    Route::get('/items', ['as'=>'product.item', 'uses' => 'ApiController@index']);
    Route::get('/items/{id}', ['as'=>'product.json', 'uses' => 'ApiController@getProductItemInJson']);
    
});


Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);