<?php

<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

>>>>>>> development
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

<<<<<<< HEAD
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
=======
Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/adm', 'HomeController@index')->name('adm');

Route::resource('usuarios', 'UserController');

Route::resource('roles', 'RolController');

Route::resource('categorias', 'CategoriaController');

Route::resource('subcategorias', 'SubcategoriaController');

Route::resource('almacenes', 'AlmacenController');

Route::resource('proveedores', 'ProveedorController');

Route::resource('productos', 'ProductoController');
>>>>>>> development
