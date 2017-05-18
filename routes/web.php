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

// Home page:
Route::get('/', 'ContentController@home');

/**
 * Pages:
 */
    // List pages
    Route::get('/page', 'PageController@index');
    // Create page
    Route::get('/page/add', 'PageController@create');
    Route::post('/page/add', 'PageController@store');
    // Read page
    Route::get('/page/{page}', 'PageController@show');
    // Update page
    Route::get('/page/edit/{page}', 'PageController@edit');
    Route::post('/page/edit/{page}', 'PageController@update');
    // Delete page
    Route::get('/page/delete/{page}', 'PageController@destroyConfirm');
    Route::post('/page/delete/{page}', 'PageController@destroy');
/**
 * End pages
 */

/**
 * Blocks:
 */
    // List blocks
    Route::get('/block', 'BlockController@index');
    // Create blocks
    Route::get('/block/add', 'BlockController@create');
    Route::post('/block/add', 'BlockController@store');
    // Read block
    Route::get('/block/{block}', 'BlockController@show');
    // Update block
    Route::get('/block/edit/{block}', 'BlockController@edit');
    Route::post('/block/edit/{block}', 'BlockController@update');
    // Delete block
    Route::get('/block/delete/{block}', 'BlockController@destroyConfirm');
    Route::post('/block/delete/{block}', 'BlockController@destroy');
/**
 * End blocks
 */

Auth::routes();

Route::get('/home', 'HomeController@index');
