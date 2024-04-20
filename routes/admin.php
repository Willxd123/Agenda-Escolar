<?php
//use Illuminate\Http\Request;

use App\Http\Controllers\Admin\CalendarioController;
use App\Http\Controllers\Admin\MaestroController;
use App\Http\Controllers\Admin\MateriaController;
use App\Http\Controllers\Admin\GradoController;
use App\Http\Controllers\Admin\EstudianteController;
use App\Http\Controllers\Admin\PadreController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\UserController;
use App\Imports\EstudianteImport;
use App\Models\Calendario;
use App\Models\Estudiante;
use App\Models\Materia;
use App\Models\Maestro;
use App\Models\Grado;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.dashboard');
})->name('dashboard');


Route::middleware(['auth'])->group(function () {
    Route::resource('maestros', MaestroController::class);
    Route::resource('grados', GradoController::class);
    Route::resource('materias', MateriaController::class);
    Route::resource('estudiantes', EstudianteController::class);
    Route::resource('calendarios', CalendarioController::class);
    Route::resource('padres', PadreController::class);
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    
});
