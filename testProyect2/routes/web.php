<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationsController;
use App\Http\Controllers\Admin\HomeController;

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
    return view('admin/index');
});

Route::post('login', [AuthenticationsController::class, 'login']);
Route::get('listadoCursos', [HomeController::class, 'listarCursos']);
Route::get('listadoEstudiantes', [HomeController::class, 'listarEstudiantes'])->name('estudiantes.show');
Route::patch('/cursos', [HomeController::class, 'editarCursos'])->name('cursos.update');

