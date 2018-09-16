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
Route::get('simplecalculator', function() {
	return view('index');
});
Route::get('while', function() {
	return view('while');
});
Route::get('bintang', function() {
	return view('bintang');
});
Route::get('tiket', function() {
	return view('tiket');
});
Route::get('each', function() {
	return view('each');
});
Route::get('array', function() {
	return view('array');
});
Route::get('countries', function() {
	return view('countries');
});
Route::resource('table','DaftarSiswaController');
Route::get('jumlah','DaftarSiswaController@tabeljumlah')->name('json');
Route::post('datatable', 'DaftarSiswaController@store')->name('store');
// Route::get('daftarsiswa','DaftarSiswaController@index');
// Route::get('daftarsiswa/json','DaftarSiswaController@json');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
