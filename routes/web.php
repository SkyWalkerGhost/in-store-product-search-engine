<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Agent\Agent;

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


Route::get('/', 'PagesController@welcome')->name('welcome');
Route::get('/', 'ProductController@search')->name('welcome');


Route::middleware('auth')->group(function()
{

	Route::get('/product/add_category', 'CategoryController@create')->name('add_category');
	Route::post('/product/add_category', 'CategoryController@store')->name('add_category');
	Route::get('/product/category', 'CategoryController@index')->name('category');
	Route::get('/product/edit/{id}/{category}', 'CategoryController@edit')->name('edit_category');


	Route::get('/product/all_product', 'ProductController@index')->name('all_product');
	Route::get('/product/add_product', 'ProductController@create')->name('add_product');
	Route::get('/product/show/{id}', 'ProductController@show')->name('show');
	Route::get('/product/edit_product/{id}', 'ProductController@edit')->name('edit_product');




	Route::resource('category', 'CategoryController');
	Route::resource('production', 'ProductController');
});

Auth::routes();
Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');
Route::get('/dashboard', 'UsersStatisticController@UsersUploadedProduction')->name('dashboard');
