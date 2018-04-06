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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/login', function (){
    if(Auth::check()){
        return redirect('/');
    }else{
        return view('auth.login');
    }
})->name('login');

Route::middleware(['auth.admin'])->group(function(){
    Route::prefix('adm')->group(function(){
        Route::get('/', 'AdminController@index')->name('admin.index');
        Route::resource('users', 'UserController');
    });
});

Route::middleware(['auth.client'])->group(function(){
    Route::prefix('cle')->group(function(){
        Route::get('/', 'ClientController@index')->name('client.index');
        Route::resource('cuentas', 'CuentaController');
        Route::get('/saldo', 'CuentaController@saldo')->name('cuenta.saldo');
    });
});

?>