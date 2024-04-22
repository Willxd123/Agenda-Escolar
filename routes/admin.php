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
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.dashboard');
})->name('dashboard');

    Route::resource('estudiantes', EstudianteController::class);
    Route::resource('maestros', MaestroController::class);
    Route::resource('grados', GradoController::class);
    Route::resource('materias', MateriaController::class);
    Route::resource('calendarios', CalendarioController::class);
    Route::resource('padres', PadreController::class);
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    

  
    //estudiantes
  /*   Route::get('/admin/estudiantes/import', [EstudianteController::class, 'import'])->name('admin.estudiantes.import');
    Route::get('/admin/estudiantes/index', [EstudianteController::class, 'index'])->name('admin.estudiantes.index');
    Route::get('/admin/estudiantes/create', [EstudianteController::class, 'create'])->name('admin.estudiantes.create');
    Route::post('/admin/estudiantes/store', [EstudianteController::class, 'store'])->name('admin.estudiantes.store');
    Route::get('/admin/estudiantes/edit', [EstudianteController::class, 'edit'])->name('admin.estudiantes.edit');
    Route::get('/admin/estudiantes/show', [EstudianteController::class, 'show'])->name('admin.estudiantes.show');
    Route::put('/admin/estudiantes/update', [EstudianteController::class, 'update'])->name('admin.estudiantes.update');
    Route::delete('/admin/estudiantes/destroy', [EstudianteController::class, 'destroy'])->name('admin.estudiantes.destroy');

    //maestros
    Route::get('/admin/maestros/index', [MaestroController::class, 'index'])->name('admin.maestros.index');
    Route::get('/admin/maestros/create', [MaestroController::class, 'create'])->name('admin.maestros.create');
    Route::post('/admin/maestros/store', [MaestroController::class, 'store'])->name('admin.maestros.store');
    Route::get('/admin/maestros/edit', [MaestroController::class, 'edit'])->name('admin.maestros.edit');
    Route::get('/admin/maestros/show', [MaestroController::class, 'show'])->name('admin.maestros.show');
    Route::put('/admin/maestros/update', [MaestroController::class, 'update'])->name('admin.maestros.update');
    Route::delete('/admin/maestros/destroy', [MaestroController::class, 'destroy'])->name('admin.maestros.destroy');
    //grados
    Route::get('/admin/grados/index', [GradoController::class, 'index'])->name('admin.grados.index');
    Route::get('/admin/grados/create', [GradoController::class, 'create'])->name('admin.grados.create');
    Route::post('/admin/grados/store', [GradoController::class, 'store'])->name('admin.grados.store');
    Route::get('/admin/grados/edit', [GradoController::class, 'edit'])->name('admin.grados.edit');
    Route::get('/admin/grados/show', [GradoController::class, 'show'])->name('admin.grados.show');
    Route::put('/admin/grados/update', [GradoController::class, 'update'])->name('admin.grados.update');
    Route::delete('/admin/grados/destroy', [GradoController::class, 'destroy'])->name('admin.grados.destroy');
    //materias
    Route::get('/admin/materias/index', [MateriaController::class, 'index'])->name('admin.materias.index');
    Route::get('/admin/materias/create', [MateriaController::class, 'create'])->name('admin.materias.create');
    Route::post('/admin/materias/store', [MateriaController::class, 'store'])->name('admin.materias.store');
    Route::get('/admin/materias/edit', [MateriaController::class, 'edit'])->name('admin.materias.edit');
    Route::get('/admin/materias/show', [MateriaController::class, 'show'])->name('admin.materias.show');
    Route::put('/admin/materias/update', [MateriaController::class, 'update'])->name('admin.materias.update');
    Route::delete('/admin/materias/destroy', [MateriaController::class, 'destroy'])->name('admin.materias.destroy');
    //calendarios
    Route::get('/admin/calendarios/index', [CalendarioController::class, 'index'])->name('admin.calendarios.index');
    Route::get('/admin/calendarios/create', [CalendarioController::class, 'create'])->name('admin.calendarios.create');
    Route::post('/admin/calendarios/store', [CalendarioController::class, 'store'])->name('admin.calendarios.store');
    Route::get('/admin/calendarios/edit', [CalendarioController::class, 'edit'])->name('admin.calendarios.edit');
    Route::get('/admin/calendarios/show', [CalendarioController::class, 'show'])->name('admin.calendarios.show');
    Route::put('/admin/calendarios/update', [CalendarioController::class, 'update'])->name('admin.calendarios.update');
    Route::delete('/admin/calendarios/destroy', [CalendarioController::class, 'destroy'])->name('admin.calendarios.destroy');
    //padres
    Route::get('/admin/padres/index', [PadreController::class, 'index'])->name('admin.padres.index');
    Route::get('/admin/padres/create', [PadreController::class, 'create'])->name('admin.padres.create');
    Route::post('/admin/padres/store', [PadreController::class, 'store'])->name('admin.padres.store');
    Route::get('/admin/padres/edit', [PadreController::class, 'edit'])->name('admin.padres.edit');
    Route::get('/admin/padres/show', [PadreController::class, 'show'])->name('admin.padres.show');
    Route::put('/admin/padres/update', [PadreController::class, 'update'])->name('admin.padres.update');
    Route::delete('/admin/padres/destroy', [PadreController::class, 'destroy'])->name('admin.padres.destroy');
    //users
    Route::get('/admin/users/index', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('/admin/users/store', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('/admin/users/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::get('/admin/users/show', [UserController::class, 'show'])->name('admin.users.show');
    Route::put('/admin/users/update', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/destroy', [UserController::class, 'destroy'])->name('admin.users.destroy');
    //roles
    Route::get('/admin/roles/index', [RoleController::class, 'index'])->name('admin.roles.index');
    Route::get('/admin/roles/create', [RoleController::class, 'create'])->name('admin.roles.create');
    Route::post('/admin/roles/store', [RoleController::class, 'store'])->name('admin.roles.store');
    Route::get('/admin/roles/edit', [RoleController::class, 'edit'])->name('admin.roles.edit');
    Route::get('/admin/roles/show', [RoleController::class, 'show'])->name('admin.roles.show');
    Route::put('/admin/roles/update', [RoleController::class, 'update'])->name('admin.roles.update');
    Route::delete('/admin/roles/destroy', [RoleController::class, 'destroy'])->name('admin.roles.destroy');
    //permissions
    Route::get('/admin/permissions/index', [PermissionController::class, 'index'])->name('admin.permissions.index');
    Route::get('/admin/permissions/create', [PermissionController::class, 'create'])->name('admin.permissions.create');
    Route::post('/admin/permissions/store', [PermissionController::class, 'store'])->name('admin.permissions.store');
    Route::get('/admin/permissions/edit', [PermissionController::class, 'edit'])->name('admin.permissions.edit');
    Route::get('/admin/permissions/show', [PermissionController::class, 'show'])->name('admin.permissions.show');
    Route::put('/admin/permissions/update', [PermissionController::class, 'update'])->name('admin.permissions.update');
    Route::delete('/admin/permissions/destroy', [PermissionController::class, 'destroy'])->name('admin.permissions.destroy'); */
    /* Route::middleware(['auth'])->group(function () {
    
    Route::resource('cursos', CursoController::class);
    Route::resource('agendas', AgendaController::class);
    Route::resource('materias', MateriaController::class);
    Route::resource('profesors', ProfesorController::class);
    Route::resource('padres', PadreController::class);
    Route::post('padres/importar', [PadreController::class, 'import'])->name('padres.importar');
    Route::resource('alumnos', AlumnoController::class);
    Route::post('alumnos/importar', [AlumnoController::class, 'import'])->name('alumnos.importar');
    Route::get('alumnos/contrapass', [AlumnoController::class, 'contrapass'])->name('alumnos.contrapass');
    Route::resource('paralelos', ParaleloController::class);
    Route::resource('users', UserController::class);

    Route::resource('agendas', AgendaController::class)->only(['index', 'edit', 'update', 'create', 'store']);
    Route::get('cursos', [CursoController::class, 'index'])->name('cursos.index');
    Route::get('materias', [MateriaController::class, 'index'])->name('materias.index');
    Route::get('profesors', [ProfesorController::class, 'index'])->name('profesors.index');
    Route::get('padres', [PadreController::class, 'index'])->name('padres.index');
    Route::get('alumnos', [AlumnoController::class, 'index'])->name('alumnos.index');
    Route::get('paralelos', [ParaleloController::class, 'index'])->name('paralelos.index'); */  
