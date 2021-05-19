<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ClienteController;

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

Route::get('/RegistroProducto', function () {
    return view('registroprodu');
});
//Enviar desde formulario los datos
//Esta es la ruta que permite el ingresar nuevo producto... LA ruta se llama en la URL RegistroProducto con el método post y se envía al controlador, función insertar
Route::post('/RegistroProducto', [ProductoController::class, 'insertar']);

//Actualiza los registros de producto
Route::patch('/PerfilProducto/{producto}', [ProductoController::class, 'actualizar'])->name('actualizar');

//Reciboi el ID del producto a editar y mando a la función editar del ProductoController el array
Route::get('/PerfilProducto/{inventario}', [ProductoController::class, 'editar'])->name('PerfilProducto');

Route::get('/Inventario', function () {
    $productos = DB::table('productos')->get();    
    return view('inventarioprodu', ['productos' => $productos]);
});

Route::get('/RegistroCliente', function () {
    return view('registrocliente');
});

Route::post('/RegistroCliente', [ClienteController::class, 'insertar']);

Route::get('/Clientes', function () {
    $clientes = DB::table('clientes')->get();    
    return view('listarclientes', ['clientes' => $clientes]);
});

//Reciboi el ID del producto a editar y mando a la función editar del ProductoController el array

Route::get('/PerfilCliente/{listado}', [ClienteController::class, 'editar'])->name('PerfilCliente');

Route::patch('/PerfilCliente/{listado}', [ClienteController::class, 'actualizar'])->name('actualizarcliente');