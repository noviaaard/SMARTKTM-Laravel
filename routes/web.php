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


Route::get('home', 'DashboardController@index');

Route::resource('manjmhs', 'ManjMhsController');

Route::resource('penjual', 'PenjualController');

Route::resource('manjadmin', 'ManjAdminController');

Route::resource('topup', 'SaldoController');

Route::resource('dashboard', 'DashboardController');

Route::get('dashboard', 'DashboardController@counter');

Route::post('manjadmin/{id}', 'ManjAdminController@delete')->name('user-delete');

Route::post('manjmhs/{id}', 'ManjMhsController@delete')->name('mhs-delete');

Route::post('penjual/{id}', 'PenjualController@delete')->name('penjual-delete');

Route::get('invoice/{manjmh}', 'ManjMhsController@invoice');

Route::get('/laporanparkir','ManjMhsController@laparkir');

Route::post('/laporanparkir','ManjMhsController@search')->name('search');

Route::get('/laporankantin','ManjMhsController@lakantin');

Route::get('/kendaraanterparkir','ManjMhsController@terparkir');

Route::get('register', 'AuthController@showFormRegister')->name('register');

Route::post('register', 'AuthController@register');

Route::get('/', 'AuthController@showFormLogin')->name('login');

Route::get('login', 'AuthController@showFormLogin')->name('login');

Route::post('login', 'AuthController@login');

Route::get('/topup/{id}', 'ManjMhsController@topup')->name('topup');

Route::group(['middleware' => 'auth','admin'], function () {
 
    Route::get('manjmhs', 'ManjMhsController@index')->name('manjmhs');
    Route::get('logout', 'AuthController@logout')->name('logout');

});