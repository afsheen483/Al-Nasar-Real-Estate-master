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
    return view('admin.dashboard');
});


// route for clients
Route::get('client_create/{id}','ClientController@create');
Route::get('/clients','ClientController@index');


// route for vendors
Route::get('vendor_create/{id}','VendorController@create');
Route::get('/vendors','VendorController@index');

// route for land
Route::get('create_land/{id}','NewLandController@create');
Route::get('/lands','NewLandController@index');
Route::get('/purchase_lands','NewLandController@viewPurchaseLands');
Route::get('/unsold_lands','NewLandController@viewUnsoldLands');
Route::get('/sold_lands','NewLandController@viewSoldLands');

// route for sales

Route::get('/sale_form/{id}','SaleController@create');
Route::get('/sales/{filter}','SaleController@index');

// purchase 
Route::get('/purchase_form/{id}','PurchaseController@create');
Route::get('/purchase/{filter}','PurchaseController@index');


// route for plot
Route::get('create_plot/{id}','PlotController@create');
Route::get('/plots','PlotController@index');
Route::get('/purchased_plots','PlotController@viewPurchasedPlot');
Route::get('/sold_plots','PlotController@viewSoldPlot');

// route for File
Route::get('create_file/{id}','FileController@create');
Route::get('/files','FileController@index');
Route::get('/purchased_files','FileController@viewPurchasedFile');
Route::get('/sold_files','FileController@viewSoldFile');