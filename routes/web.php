<?php

use Illuminate\Support\Facades\Route;

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
/* Home */

Auth::routes(['register' => false]);

Route::get('/', 'WebController@index')->name('welcome');

/*System*/

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth', 'admin'], 'namespace' => 'System'], function () {
    Route::resources([
        'category' => 'CategoryController',
        'product' => 'ProductController',
        'user' => 'UserController',
    ]);

});
