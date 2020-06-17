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

// Route::get('/', function () {
//     return view('welcome');
// });

if (Auth::guest()) {
    //is a guest so redirect
    return redirect('login');
   }
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logikaNoSatu', 'cLogika@soalNoSatu')->name('logikaNoSatu');
Route::get('/logikaNoDua', 'cLogika@soalNoDua')->name('logikaNoDua');
Route::resource('produk', 'cProduk');
