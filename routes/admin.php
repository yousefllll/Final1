<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/


//note that the prefix is admin for all file route


Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],function(){

    
    Route::group(['namespace' => 'Dashboard', 'middleware' => ['auth:admin','prevent-back-history'], 'prefix' => 'admin'], function () {


        Route::get('/', 'DashboardController@index')->name('admin.dashboard');  // the first page admin visits if authenticated
        Route::get('logout', 'LoginController@logout')->name('admin.logout');

        Route::group(['prefix' => 'settings'], function () {
            Route::get('shipping-methods/{type}', 'SettingsController@editShippingMethods')->name('edit.shippings.methods');
            Route::put('shipping-methods/{id}', 'SettingsController@updateShippingMethods')->name('update.shippings.methods');
        });

        Route::group(['prefix' => 'profile'], function () {
            Route::get('edit', 'ProfileController@editProfile')->name('edit.profile');
            Route::post('update', 'ProfileController@updateprofile')->name('update.profile');
        });

        ################################## categories routes ######################################
        Route::group(['prefix' => 'main_categories'], function () {
            Route::get('/', 'MainCategoriesController@index')->name('admin.maincategories');
            Route::get('create', 'MainCategoriesController@create')->name('admin.maincategories.create');
            Route::post('store', 'MainCategoriesController@store')->name('admin.maincategories.store');
            Route::get('edit/{id}', 'MainCategoriesController@edit')->name('admin.maincategories.edit');
            Route::post('update/{id}', 'MainCategoriesController@update')->name('admin.maincategories.update');
            Route::get('delete/{id}', 'MainCategoriesController@destroy')->name('admin.maincategories.delete');
        });

        ################################## end categories    ####################################

        ################################## brands routes ######################################
        Route::group(['prefix' => 'trademarks'], function () {
            Route::get('/', 'BrandsController@index')->name('admin.brands');
            Route::get('create', 'BrandsController@create')->name('admin.brands.create');
            Route::post('store', 'BrandsController@store')->name('admin.brands.store');
            Route::get('edit/{id}', 'BrandsController@edit')->name('admin.brands.edit');
            Route::post('update/{id}', 'BrandsController@update')->name('admin.brands.update');
            Route::get('delete/{id}', 'BrandsController@destroy')->name('admin.brands.delete');
        });
        ################################## end brands    #######################################

        ################################## Tags routes ######################################
        Route::group(['prefix' => 'tags'], function () {
            Route::get('/', 'TagsController@index')->name('admin.tags');
            Route::get('create', 'TagsController@create')->name('admin.tags.create');
            Route::post('store', 'TagsController@store')->name('admin.tags.store');
            Route::get('edit/{id}', 'TagsController@edit')->name('admin.tags.edit');
            Route::post('update/{id}', 'TagsController@update')->name('admin.tags.update');
            Route::get('delete/{id}', 'TagsController@destroy')->name('admin.tags.delete');
        });
        ################################## end Tags    #######################################

        ################################# products routes ######################################
        Route::group(['prefix' => 'products'], function () {
            Route::get('/', 'ProductsController@index')->name('admin.products');
            Route::get('general-information', 'ProductsController@create')->name('admin.products.general.create');
            Route::post('store-general-information', 'ProductsController@store')->name('admin.products.general.store');

            Route::get('info/{id}', 'ProductsController@getAll')->name('admin.products.all');
            Route::post('info', 'ProductsController@saveProductInfo')->name('admin.products.all.store');

            //Route::get('stock/{id}', 'ProductsController@getStock')->name('admin.products.stock');
            //Route::post('stock', 'ProductsController@saveProductStock')->name('admin.products.stock.store');

            //Route::get('images/{id}', 'ProductsController@addImages')->name('admin.products.images');
            Route::post('images', 'ProductsController@saveProductImages')->name('admin.products.images.store');
            Route::post('images/db', 'ProductsController@saveProductImagesDB')->name('admin.products.images.store.db');

            Route::get('indexedit1', 'ProductsController@index1')->name('admin.products.edit');
            Route::get('edit1/{id}', 'ProductsController@edit')->name('admin.products.edit1');
            Route::post('update1/{id}', 'ProductsController@update')->name('admin.products.update');

            Route::get('edit2/{id}', 'ProductsController@edit2')->name('admin.products.edit2');
            Route::post('update2/{id}', 'ProductsController@update2')->name('admin.products.update2');

            Route::get('delete/{id}', 'ProductsController@destroy')->name('admin.products.delete');
        });
        ################################## end products    #######################################

    });

            Route::group(['namespace' => 'Dashboard', 'middleware' => 'guest', 'prefix' => 'admin'], function () {
             Route::get('login', 'LoginController@login')->name('admin.login');
             Route::post('login', 'LoginController@postLogin')->name('admin.post.login');
            });

   
  
});
