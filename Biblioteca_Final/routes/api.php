<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/libros', 'libros_controller@listarLibros');
Route::post('/libros', 'libros_controller@anadirLibros');
Route::put('/libros', 'libros_controller@modificarLibros');
Route::delete('/libros', 'libros_controller@borrarLibros');
Route::get('/libros', 'libros_controller@)listarAutor');
Route::get('/libros', 'libros_controller@)listarGenero');
Route::get('/libros', 'libros_controller@)listarSinopsis');
Route::get('/libros', 'libros_controller@)listarTitulo');

Route::middleware('auth:api')->get('/libros', 'libros_controller@)listartitulo');
Route::middleware('auth:api')->get('/libros', 'libros_controller@)listarSinopsis');
Route::middleware('auth:api')->get('/libros', 'libros_controller@)listarGenero');
Route::middleware('auth:api')->get('/libros', 'libros_controller@)listarAutor');
Route::middleware('auth:api')->delete('/libros', 'libros_controller@)borrarLibros');
Route::middleware('auth:api')->put('/libros', 'libros_controller@)modificarLibros');
Route::middleware('auth:api')->post('/libros', 'libros_controller@)anadirLibros');
Route::middleware('auth:api')->get('/libros', 'libros_controller@)listarLibros');
