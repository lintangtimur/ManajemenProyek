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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/dosendashboard', 'UserController@getDosen')->name('get.dashboard');
Route::post('/adduser', 'UserController@add');
Route::post('/login', 'UserController@login');
Route::get('/dashboard', 'UserController@dashboard');
Route::get('/logout', 'UserController@logout');
Route::get('/add', 'UserController@home');
Route::get('/inputevent', 'EventController@index');

Route::post('/kegiatan/upload', 'KegiatanController@upload');
Route::post('/kegiatan/edit', 'KegiatanController@update');
Route::post('/accproposal', 'KegiatanController@accKegiatan');

//Laravel Socialite
Route::get('/redirect', 'UserController@redirectToProvider');
Route::get('/callback', 'UserController@handleProviderCallback');

Route::post('dashboard/inputcomment', 'RevisionsController@store');

Route::get('dashboard/revisi/commendid/{idacara}', 'RevisionsController@get')->name('revisi.show');
Route::get('dashboard/ormawa/edit/{idacara}', 'KegiatanController@get');

Route::get('dashboard/history', 'UserController@history');

Route::post('kegiatan/mahasiswa/input', 'KegiatanMahasiswaController@store');
Route::get('dashboard/kegiatan/mahasiswa/index', 'KegiatanMahasiswaController@index');
Route::get('dashboard/kegiatan/mahasiswa/dosen', 'KegiatanMahasiswaController@indexDosen');
Route::get('dashboard/kegiatan/mahasiswa/dosen/history', 'KegiatanMahasiswaController@historyDosen');
Route::post('dashboard/kegiatan/mahasiswa/acc', 'KegiatanMahasiswaController@acc');
Route::get('dashboard/mahasiswa', 'KegiatanMahasiswaController@dosen')->name('dosen.mahasiswa');

Route::get('dashboard/admin/userlist/', 'UserController@userlist');
Route::post('dashboard/admin/edit', 'UserController@userEdit');
