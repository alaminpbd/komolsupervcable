<?php

use App\Http\Controllers\PagesController;
use App\Models\Bill;
use App\Models\Connection;
use App\Models\Subzone;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('home');
// });

Auth::routes();

Route::get('/', 'Backend\AdminController@index')->name('login');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/logout', 'Backend\AdminController@index')->name('admin.logout');
    Route::get('/dashboard', 'Backend\PagesController@index')->name('admin.index');
    Route::post('/check/login','Backend\AdminController@checkLogin')->name('admin.check.login');
   
    Route::group(['prefix' => 'connection'], function(){
        Route::get('/create', 'Backend\ConnectionController@create')->name('admin.connection.create');
        Route::post('/store', 'Backend\ConnectionController@store')->name('admin.connection.store');
        Route::get('/edit/{id}', 'Backend\ConnectionController@edit')->name('admin.connection.edit');
        Route::post('/update/{id}', 'Backend\ConnectionController@update')->name('admin.connection.update');
        Route::get('/show', 'Backend\ConnectionController@show')->name('admin.connection.show');
        Route::post('/delete/{id}', 'Backend\ConnectionController@delete')->name('admin.connection.delete');
        Route::get('/manage/{id}', 'Backend\ConnectionController@index')->name('admin.connection.manage');
        Route::get('/search', 'Backend\ConnectionController@searchBycon')->name('admin.connection.search');
        Route::get('/newlyadded', 'Backend\ConnectionController@newlyadded')->name('admin.connection.newlyadded');
        Route::get('/search/newly/added', 'Backend\ConnectionController@searchByZoneSubNewlyAdded')->name('admin.connection.searchByZoneSubNewlyAdded');
    });
   
    Route::group(['prefix' => 'zone'], function () {
        Route::get('/create', 'Backend\ZoneController@create')->name('admin.zone.create');
        Route::post('/store', 'Backend\ZoneController@store')->name('admin.zone.store');
        Route::get('/show', 'Backend\ZoneController@show')->name('admin.zone.show');
        Route::get('/edit/{id}', 'Backend\ZoneController@edit')->name('admin.zone.edit');
        Route::post('/update/{id}', 'Backend\ZoneController@update')->name('admin.zone.update');
        Route::post('/delete/{id}', 'Backend\ZoneController@delete')->name('admin.zone.delete');
    });

    Route::group(['prefix' => 'subzone'], function () {
        Route::get('/create', 'Backend\SubzoneController@create')->name('admin.subzone.create');
        Route::post('/store', 'Backend\SubzoneController@store')->name('admin.subzone.store');
        Route::get('/show', 'Backend\SubzoneController@show')->name('admin.subzone.show');
        Route::get('/edit/{id}', 'Backend\SubzoneController@edit')->name('admin.subzone.edit');
        Route::post('/update/{id}', 'Backend\SubzoneController@update')->name('admin.subzone.update');
        Route::post('/delete/{id}', 'Backend\SubzoneController@delete')->name('admin.subzone.delete');
    });

    Route::group(['prefix' => 'bill'], function () {
        Route::get('/create', 'Backend\BillController@create')->name('admin.bill.create');
        Route::post('/store', 'Backend\BillController@store')->name('admin.bill.store');
        Route::get('/edit/{id}', 'Backend\BillController@edit')->name('admin.bill.edit');
        Route::post('/update/{id}', 'Backend\BillController@update')->name('admin.bill.update');
        Route::post('/delete/{id}', 'Backend\BillController@delete')->name('admin.bill.delete');
        Route::get('/show', 'Backend\BillController@show')->name('admin.bill.show');
        Route::get('/search', 'Backend\BillController@search')->name('admin.bill.search');
        Route::get('/searchbyzone', 'Backend\BillController@searchByZoneName')->name('admin.bill.searchbyzone');
        Route::get('/manage/{id}', 'Backend\BillController@index')->name('admin.bill.manage');
        Route::get('/maintain', 'Backend\BillController@maintain')->name('admin.bill.maintain');
    });

    Route::get('/report', 'Backend\PagesController@report')->name('admin.report');
    Route::get('/report/zonesubzone', 'Backend\PagesController@reportZonSubzone')->name('admin.report.zonesubzone');
    Route::get('/report/bill/history', 'Backend\PagesController@billHistory')->name('admin.report.billhistory');
    Route::get('/searchbyym', 'Backend\PagesController@searchByYM')->name('admin.report.search');
    Route::get('/search/zonesubzone', 'Backend\PagesController@searchByZoneSubzone')->name('admin.report.searchzonesubzone');

});


/* Ajax route for connection */
Route::get('/ajax-subzone', function (Request $request) {
    $zone_id = $request->input('zone_id');
    $subzones = Subzone::where('zone_id', '=', $zone_id)->get();

    return response()->json($subzones);
});

/* Ajax route for bill */
Route::get('/ajax-all-connection', function (Request $request) {
    $connection_id = $request->input('id');
    $connection = Connection::where('id', '=', $connection_id)->get();
    return response()->json($connection);
});

/* Ajax route for edit bill */
Route::get('/ajax-all-edit-bill', function (Request $request) {
    $bill_id = $request->input('id');
    $bill = Bill::where('id', '=', $bill_id)->get();
    return response()->json($bill);
});