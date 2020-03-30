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

Route::get('/','Registro@index');
Route::post('Registrar','Registro@Registrar_usuario');
Route::get('/lista','Registro@lista_de_usuarios');
Route::get('/eliminar/{id}','Registro@eliminar_usuario');
Route::post('/Actulizar','Registro@Actulizar_usuario');
Route::get('login','Registro@login_user');
// Route::get('/', function () {
//     return view('welcome');
// });
