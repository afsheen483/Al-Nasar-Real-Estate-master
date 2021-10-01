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
Route::post('/client_insert','ClientController@store');
Route::put('/client_update/{id}','ClientController@update');
Route::put('/client_delete/{id}','ClientController@destroy');


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
Route::put('/purchase_delete/{id}','PurchaseController@destroy');
Route::put('/purchase_update/{id}','PurchaseController@update');
Route::post('/purchase_insert','PurchaseController@store');
Route::get('/purchase_view/{date}','PurchaseController@DateSearch');
Route::get('/purchase_date_search','PurchaseController@DateSearchBetween');


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

// location
Route::get('/location','LocationController@index');
Route::get('create_location/{id}','LocationController@create');
Route::post('location_insert','LocationController@store');
Route::put('location_update/{id}','LocationController@update');
Route::put('location_delete/{id}','LocationController@destroy');


// phase route
Route::get('/phase','PhaseController@index');
Route::get('create_phase/{id}','PhaseController@create');
Route::post('phase_insert','PhaseController@store');
Route::put('phase_update/{id}','PhaseController@update');
Route::put('phase_delete/{id}','PhaseController@destroy');

// mauza route
Route::get('/mauza','MauzaController@index');
Route::get('mauza_create/{id}','MauzaController@create');
Route::post('mauza_insert','MauzaController@store');
Route::put('mauza_update/{id}','MauzaController@update');
Route::put('mauza_delete/{id}','MauzaController@destroy');
Auth::routes();

Route::get('/expenses','ExpenseController@index');
Route::get('expense_create/{id}','ExpenseController@create');
Route::post('expense_insert','ExpenseController@store');
Route::put('expense_update/{id}','ExpenseController@update');
Route::put('expense_delete/{id}','ExpenseController@destroy');

// ledger route
Route::get('/get_client','LedgerController@index');
Route::get('/ledger_create/{id}','LedgerController@create');
Route::get('/ledger','LedgerController@view');
Route::Post('/save_transaction','LedgerController@SaveTransaction');

Route::get('/clear', function() {

    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
 
    return "Cleared!";
 
 });