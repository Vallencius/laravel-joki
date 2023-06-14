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
    return view('dashboard');
});

Route::get('/login', 'AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', 'DashboardController@index');
    Route::get('/siswa', 'SiswaController@index');
    Route::post('/siswa/buat', 'SiswaController@create');
    Route::get('/siswa/{id}/edit', 'SiswaController@edit');
    Route::post('/siswa/{id}/update', 'SiswaController@update');
    Route::get('/siswa/{id}/hapus', 'SiswaController@hapus');
    Route::get('/siswa/{id}/profile', 'SiswaController@profile');
    Route::get('/siswa/export-excel', 'SiswaController@exportExcel');
    Route::get('/siswa/export-pdf', 'SiswaController@exportPdf');
    Route::get('/siswa/pdf', 'SiswaController@pdf');
    Route::get('/siswa/charts', 'SiswaController@charts');
});
