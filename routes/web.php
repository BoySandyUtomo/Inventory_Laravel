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


    Route::get('/login', 'AuthController@index');
    Route::post('/postLogin','AuthController@postLogin');
    Route::post('/register','AuthController@register');
    Route::post('/postRegister','AuthController@postRegister');
    Route::get('/logout','AuthController@logout');
    

Route::group(['middleware' => ['auth','checkRole:admin']], function(){

    Route::get('/dashboard', 'Dashboard@index');
    //Fakultas
    Route::get('/fakultas', 'Fakultas@index');
    Route::get('/createFak', 'Fakultas@create');
    Route::post('/storeFak', 'Fakultas@store');
    Route::get('/deleteFak/{id_fak}', 'Fakultas@destroy');
    Route::get('/updateFak/{id_fak}', 'Fakultas@update');
    Route::post('/updateStore/{id_fak}', 'Fakultas@updateStore');
    
    //Jurusan
    Route::get('/jurusan', 'Jurusan@index');
    Route::get('/createJur', 'Jurusan@create');
    Route::post('/storeJur', 'Jurusan@store');
    Route::get('/search', 'Jurusan@search');
    Route::get('/deleteJur/{id_jur}', 'Jurusan@destroy');
    Route::get('/updateJur/{id_jur}', 'Jurusan@update');
    Route::post('/update/{id_jur}', 'Jurusan@updateStore');

    //Ruangan
    Route::get('/ruangan', 'Ruangan@index');
    Route::get('/createRu', 'Ruangan@create');
    Route::post('/storeRua', 'Ruangan@store');
    // Route::get('/searchRu', 'Ruangan@search');
    Route::get('/deleteRu/{id_ru}', 'Ruangan@destroy');
    Route::get('/updateRu/{id_ru}', 'Ruangan@update');
    Route::post('/updateRua/{id_ru}', 'Ruangan@updateStore');

});

Route::group(['middleware' => ['auth','checkRole:admin,staff']], function(){
    //Barang
    Route::get('/dashboard', 'Dashboard@index');
    Route::get('/barang', 'Barang@index');
    Route::get('/createBar', 'Barang@create');
    Route::post('/storeBar', 'Barang@store');
    // Route::get('/search', 'Barang@search');
    Route::get('/deleteBar/{id_bar}', 'Barang@destroy');
    Route::get('/updateBar/{id_bar}', 'Barang@update');
    Route::get('/exportExcel', 'Barang@exportExcel');
    Route::post('/updateBar/{id_bar}', 'Barang@updateStore');
});
Auth::routes();

Route::get('/', function () {
    return view('/auth/login');
});
Route::get('/home', 'HomeController@index')->name('home');