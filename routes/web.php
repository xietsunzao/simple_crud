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

Route::get('/', function () {
    return view('welcome');
});

Route::get('product', 'ProductController@index')->name('product');
Route::get('product/add', 'ProductController@add')->name('product.add');
Route::post('product/addaction', 'ProductController@addaction')->name('product.addaction');
Route::get('product/edit/{product}', 'ProductController@edit')->name('product.edit');
Route::put('product/product/{product}', 'ProductController@editaction')->name('product.updateaction');
Route::get('product/delete/{product}', 'ProductController@delete')->name('product.delete');

Route::get('category', 'CategoryController@index')->name('category');
Route::get('category/add', 'CategoryController@add')->name('category.add');
Route::post('category/addaction', 'CategoryController@addaction')->name('category.addaction');
Route::get('category/edit/{category}', 'CategoryController@update')->name('category.edit');
Route::put('category/category/{category}', 'CategoryController@updateAction')->name('category.updateaction');
Route::get('category/delete/{category}', 'CategoryController@delete')->name('category.delete');

Route::get('sale', 'SaleController@index')->name('sale');
Route::get('sale/add', 'SaleController@add')->name('sale.add');
Route::post('sale/addaction', 'SaleController@addaction')->name('sale.addaction');
Route::get('sale/edit/{sale}', 'SaleController@update')->name('sale.edit');
Route::put('sale/sale/{sale}', 'SaleController@updateAction')->name('sale.updateaction');
Route::get('sale/delete/{sale}', 'SaleController@delete')->name('sale.delete');
