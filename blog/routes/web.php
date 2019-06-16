<?php

use App\Artigo;
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

    $lista = Artigo::listaArtigosSite(3);
    return view('site', compact('lista'));
})->name('site');

Route::get('/artigo/{id}/{titulo?}', function ($id) {
    $artigos = Artigo::find($id);
    if($artigos){
        return view('artigo', compact('artigos'));
    }
})->name('artigo');


Auth::routes();

Route::get('/admin', 'AdminController@index')->name('admin');

Route::middleware(['auth'])->prefix('admin')->namespace('Admin')->group(function(){
    
    Route::resource('artigos', 'ArtigosController');
    Route::resource('usuarios', 'UsuariosController');
    Route::resource('autores', 'AutoresController');
    Route::resource('adm', 'AdminController');
    
});