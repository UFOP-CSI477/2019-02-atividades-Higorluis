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

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdmController;
use App\Subjects;

Route::get('/', function () {
    $subjects = Subjects::orderBy('name') -> get();
    return view('welcome', compact("subjects"));
});

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');


Route::group(['middleware' => ['auth']],function(){
    
    Route::group(['middleware' => ['admin']], function(){
        Route::get('/adm', function() {
            return view('adm');
        });        
        Route::get('adm/protocolos','AdmController@protocolo');
        Route::get('adm/registroprotocolos','AdmController@registrarProtocolos');
        Route::resource('protocolo', 'AdmController', ['except' => ['show']]);
    });

    Route::get('home/registrados','UserController@registrados');
    Route::get('home/registrar','UserController@registrar');
    Route::resource('requisicao', 'UserController', ['except' => ['show']]);  

});