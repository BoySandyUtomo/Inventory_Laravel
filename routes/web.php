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
    return view('index');
});
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

    //Barang
    Route::get('/barang', 'Barang@index');