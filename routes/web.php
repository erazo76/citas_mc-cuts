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

use App\Http\Controllers\Controller;

/*Route::get('/', function () {
    return view('welcome');
})->name('home');*/
Route::get('test', function () {
    $rol= new App\Mrole;
    $rol->nombre='administrador';
    $rol->save();
    
    $rol2= new App\Mrole;
    $rol2->nombre='operador';
    $rol2->save();

    $rol3= new App\Mrole;
    $rol3->nombre='cliente';
    $rol3->save();
});


Route::group(['middleware' => 'back.history'],function(){

    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

    Route::get('/', function () {
        return view('welcome');
    })->name('home');
        
    Route::resource('admin/sedes', 'admin\msedescontroller');
    Route::resource('admin/servicios', 'admin\mservicioscontroller');
    Route::resource('admin/users', 'admin\UserController');

    Auth::routes();
    Route::get('/home', 'HomeController@index')->name('home');
});
