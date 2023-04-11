<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\ResponsableController;
use App\Http\Controllers\UsuarioController;
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
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::middleware('auth:sanctum')->group(function () {

    Route::controller(NavigationController::class)->group(function (){
        Route::get('/', 'resumen')->name('tableros.index');
        Route::get('avances', 'avances')->name('tableros.avances');
        Route::get('proyectos/todos', 'proyectos')->name('proyectos.todos');
        Route::get('proyectos/nuevo', 'nuevoProyecto')->name('proyectos.nuevo');
        Route::get('proyectos/{id}/editar', 'editarProyecto')->name('proyectos.editar');
        Route::get('proyectos/{id}/ver', 'verProyecto')->name('proyectos.ver');

        Route::get('proyectos/{id}/ver_reporte', 'verPdf')->name('proyectos.reporte');
    });

    Route::view('pages/error-401','pages.layouts-error-401')->name('pages.error-401');

    Route::get('usuarios/{user}/generate', [UsuarioController::class, 'generate'])->name('catalogos.usuarios.generate');

    Route::name('catalogos.')->group( function (){
        Route::resource('areas', AreaController::class);
        Route::resource('responsables', ResponsableController::class);
        Route::resource('usuarios', UsuarioController::class);
    });

    Route::view('/prueba', 'pages.elements-progress');
});
