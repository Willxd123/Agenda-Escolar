<?php
use App\Http\Controllers\Admin\CsvController;
use App\Http\Controllers\Admin\MaestroController;
use App\Http\Controllers\Admin\MateriaController;
use App\Http\Controllers\Admin\GradoController;
use App\Http\Controllers\Admin\EstudianteController;
use App\Http\Controllers\Admin\CalendarioController;
use App\Http\Controllers\Admin\TutorController;
use App\Models\Calendario;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::resource('estudiantes', EstudianteController::class);
Route::get('/admin/estudiantes/import', [EstudianteController::class, 'import'])->name('admin.estudiantes.import');
Route::post('/admin/estudiantes/import', [EstudianteController::class, 'import'])->name('admin.estudiantes.import');
Route::get('/admin/estudiantes/imports', [EstudianteController::class, 'imports'])->name('admin.estudiantes.imports');
Route::post('/admin/estudiantes/imports', [EstudianteController::class, 'imports'])->name('admin.estudiantes.imports');
Route::get('/admin/calendarios/actividad', [CalendarioController::class, 'actividad'])->name('admin.calendarios.actividad');
Route::post('/admin/calendarios/actividad', [CalendarioController::class, 'actividad'])->name('admin.calendarios.actividad');
