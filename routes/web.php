<?php

use App\Http\Controllers\MajorController;
use App\Http\Controllers\PresenceController;
use App\Http\Controllers\StudentController;
use App\Major;
use App\Presence;
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

Route::view('/', 'home');
Route::get('/profile', 'ProfileController@show');
Route::get('/login', 'LoginController@index')->name('login')->middleware('guest');
Route::get('/register', 'RegisterController@index')->middleware('guest');
Route::get('/profile/edit/{id}', 'ProfileController@edit');
Route::post('/profile/update/{id}', 'ProfileController@update');
Route::get('/profile/image/change/{id}', 'ProfileController@edit_image');
Route::post('/profile/image/update/{id}', 'ProfileController@update_image');

Route::post('/register', 'RegisterController@store');
Route::post('/login', 'LoginController@authenticate');
Route::get('/logout', 'LoginController@logout');

Route::get('/jurusan', 'MajorController@show')->middleware('auth');
Route::get('/jurusan/tambah', 'MajorController@show');
Route::post('/jurusan/store', 'MajorController@store');
Route::get('/jurusan/edit/{id}', 'MajorController@edit');
Route::post('/jurusan/update/{id}', 'MajorController@update');
Route::get('/jurusan/delete/{id}', 'MajorController@destroy');

Route::get('/mahasiswa', 'StudentController@show')->middleware('auth');
Route::get('/mahasiswa/tambah', 'StudentController@add');
Route::post('/mahasiswa/store', 'StudentController@store');
Route::get('/mahasiswa/edit/{id}', 'StudentController@edit');
Route::post('/mahasiswa/update/{id}', 'StudentController@update');
Route::get('/mahasiswa/delete/{id}', 'StudentController@destroy');

Route::get('/absensi', 'PresenceController@show')->middleware('auth');
Route::get('/absensi/tambah', 'PresenceController@add');
Route::post('/absensi/absen_masuk', 'PresenceController@store');
Route::get('/absensi/absen_masuk/edit/{id}', 'PresenceController@edit');
Route::post('/absensi/absen_keluar/{id}', 'PresenceController@Update');

