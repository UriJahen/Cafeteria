<?php

use Illuminate\Support\Facades\Route;

//usa la ruta del controlador

use App\Http\Controllers\ComidaController;

use App\Http\Controllers\AuthController;

use App\Http\Controllers\PedidoController;

Route::middleware(['auth'])->group(function () {
    // Rutas para que cualquier usuarios haga las ediciones 
    Route::get('/pedidos', [
        PedidoController::class, 'index'
    ])->name('pedidos.index');


    // ruta de la creacion 
    Route::get('/pedidos/crear', [
        PedidoController::class, 'create'
    ])->name('pedidos.create');

    Route::post('/pedidos', [
        PedidoController::class, 'store'
    ])->name('pedidos.store');

    //ruta para editar
    Route::get('/pedidos/{id}/editar', [
        PedidoController::class, 'edit'
    ])->name('pedidos.edit');

    //ruta para actualizar
    Route::put('/pedidos/{id}', [
        PedidoController::class, 'update'
    ])->name('pedidos.update');

    // Ruta protegida de la eliminaccion solo para el admin
    Route::delete('/pedidos/{id}', [PedidoController::class, 'destroy'])
        ->name('pedidos.destroy')
        ->middleware('admin'); 
});


Route::get('/clima', [ComidaController::class, 'home']);

Route::get('/', function () {
    return view('welcome');
});
 
Route::middleware(['auth'])->group(function () {
    Route::resource('comida', comidaController::class);
});

//usar los metodos del controlador en las rutas


//ruta para regresar la vista de formulario de registro 
Route::get('/registro', [  //este diagonal es la ruta que reconoce el navegador 
    AuthController::class, 'registerForm'
])->name('registro'); //aqui es agregar el mismo nombre que la ruta es la recomendacion 

//ruta para registrar usuarios
Route::post('/registro', [ //el post es para mandar informacion, el get solo para solicitar la vista
    AuthController::class, 'register'
])->name('registro.store'); //el .store ahorita no es mas que una referencia para saber que significa guardar

//ruta para regresar vista de inicio de sesion
Route::get('/acceso', [
    AuthController::class, 'loginForm'
])->name('acceso');

//Ruta para la edicion de usuario
Route::get('/usuarios/{id}/editar', [
    AuthController::class, 'edit'
])->name('usuarios.edit');

//ruta para la muestra de usuarios
Route::get('/usuarios', [
    AuthController::class, 'index'
])->name('usuarios');

//ruta para actualizar usuario
Route::put('/usuarios/{id}', [
    AuthController::class, 'update'
])->name('usuarios.update');

//ruta para eliminar usuario
Route::delete('/usuarios/{id}', [
    AuthController::class, 'destroy'
])->name('usuarios.destroy');


//ruta para iniciar sesion
Route::post('/acceso', [
    AuthController::class, 'login'
])->name('acceso.store');

//ruta para cerrar sesion
Route::post('/cerrar', [
    AuthController::class, 'logout'
])->name('cerrar');


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin.dashboard', [
        AuthController::class, 'adminDashboard'
    ])->name('admin.dashboard');


// Ruta para enviar el aviso personalizado
Route::post('/usuarios/{id}/enviar-aviso', [
    AuthController::class, 'enviarAviso'
])->name('usuarios.enviarAviso');

});


