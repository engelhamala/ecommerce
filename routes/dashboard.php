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


Route::prefix('dashboard')->namespace('Admin')->as('dashboard.')->group(function () {


    // Route::get('/', [DashboardController::class, 'index']);

    //################################ admin #######################################
    Route::prefix('admins')->controller(AdminController::class)->group(function () {
        Route::get('/', 'index')->name('admin');
        Route::get('/create', 'create')->name('create-admin');
        Route::post('/', 'store')->name('store-admin');
        Route::get('/{admin}', 'show')->name('show-admin');
        Route::get('/{admin}/edit', 'edit')->name('edit-admin');
        Route::put('/{admin}/update', 'update')->name('update-admin');
        Route::delete('/{admin}/delete', 'destroy')->name('delete-admin');
    });

 //################################ languages #######################################
    Route::prefix('languages')->controller(LanguageController::class)->group(function () {
        Route::get('/', 'index')->name('languages');
        Route::get('/create', 'create')->name('create-languages');
        Route::post('/', 'store')->name('store-languages');
        Route::get('/{lang}', 'show')->name('show-languages');
        Route::get('/{lang}/edit', 'edit')->name('edit-languages');
        Route::put('/{lang}/update', 'update')->name('update-languages');
        Route::get('/{lang}/delete', 'destroy')->name('delete-languages');
    });

 //################################ main_categories #######################################
    Route::prefix('main_categories')->controller(MainCategoriesController::class)->group(function () {
        Route::get('/', 'index')->name('maincategories');
        Route::get('/create', 'create')->name('create-maincategories');
        Route::post('/', 'store')->name('store-maincategories');
        Route::get('/{maincategory}', 'show')->name('show-maincategories');
        Route::get('/{maincategory}/edit', 'edit')->name('edit-maincategories');
        Route::put('/{maincategory}/update', 'update')->name('update-maincategories');
        Route::get('/{maincategory}/delete', 'destroy')->name('delete-maincategories');
        Route::get('changStatus/{maincategory}','MainCategoriesController@changStatus') -> name('maincategories.status');
    });

     //################################ sub_categories #######################################
    Route::prefix('sub_categories')->controller(SubCategoriesController::class)->group(function () {
        Route::get('/', 'index')->name('subcategories');
        Route::get('/create', 'create')->name('create-subcategories');
        Route::post('/', 'store')->name('store-subcategories');
        Route::get('/{subcategory}', 'show')->name('show-subcategories');
        Route::get('/{subcategory}/edit', 'edit')->name('edit-subcategories');
        Route::put('/{subcategory}/update', 'update')->name('update-subcategories');
        Route::get('/{subcategory}/delete', 'destroy')->name('delete-subcategories');
    });


     //################################ vendors #######################################
    Route::prefix('vendors')->controller(VendorsController::class)->group(function () {
        Route::get('/', 'index')->name('vendor');
        Route::get('/create', 'create')->name('create-vendor');
        Route::post('/', 'store')->name('store-vendor');
        Route::get('/{vendor}', 'show')->name('show-vendor');
        Route::get('/{vendor}/edit', 'edit')->name('edit-vendor');
        Route::put('/{vendor}/update', 'update')->name('update-vendor');
        Route::get('/{vendor}/delete', 'destroy')->name('delete-vendor');
        Route::get('changStatus/{vendor}','VendorsController@changStatus') -> name('vendors-status');
    });


     //################################ product #######################################
    //   Route::prefix('products')->controller(ProductController::class)->group(function () {
    //     Route::get('/', 'index')->name('product');
    //     Route::get('/create', 'create')->name('create-product');
    //     Route::post('/', 'store')->name('store-product');
    //     Route::get('/{product}', 'show')->name('show-product');
    //     Route::get('/{product}/edit', 'edit')->name('edit-product');
    //     Route::put('/{product}/update', 'update')->name('update-product');
    //     Route::delete('/{product}/delete', 'destroy')->name('delete-product');
    // });
});
