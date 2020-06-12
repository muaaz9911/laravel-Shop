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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/', 'HomeController@index')->name('home');

// frontend routs 

Route::match(['get','post'],'/','IndexController@index');
Route::match(['get','post'],'/admin','AdminController@login');
Route::get('/products/{id}','ProductsController@products');
Route::get('/categories/{category_id}','IndexController@categories');

Route::match(['get','post'],'add-cart','ProductsController@addtoCart');


// admin routs 

Route::group(['middleware' =>['auth']],function(){

    Route::match(['get','post'],'/admin/dashboard','AdminController@dashboard');


    //Category Route
     Route::match(['get','post'],'/admin/add-category','CategoryController@addCategory');
     Route::match(['get','post'],'/admin/view-categories','CategoryController@viewCategories');
     Route::match(['get','post'],'/admin/edit-category/{id}','CategoryController@editCategory');
     Route::match(['get','post'],'/admin/delete-category/{id}','CategoryController@deleteCategory');
     Route::post('/admin/update-category-status','CategoryController@updateStatus');


    Route::match(['get','post'],'/admin/add-product','ProductsController@addProduct');
    Route::match(['get','post'],'/admin/view-products','ProductsController@viewProducts');
    Route::match(['get','post'],'/admin/edit-product/{id}','ProductsController@editProduct');
    Route::match(['get','post'],'/admin/delete-product/{id}','ProductsController@DeleteProduct');
    Route::post('/admin/update-product-status','ProductsController@updateStatus');
});


Route::get('/logout','AdminController@logout');

Auth::routes();

