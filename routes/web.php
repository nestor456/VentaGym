<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\MembresiaController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;

use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\AsistenciaClienteController;
use App\Http\Controllers\ProvidesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\SubCategoriesController;
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
    return view('auth.login');
});
/*Route::get('/empleado', function () {
    return view('empleado.index');
});*/

//Route::get('/empleado/create',[EmpleadoController::class,'create']);


Auth::routes(['register'=>false, 'reset'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => 'auth'], function() {
    //
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('empleado',EmpleadoController::class)->names('empleado');
    //Route::resource('area',AreaController::class)->names('area');
    //Route::resource('membresia',MembresiaController::class)->names('membresia');
    Route::resource('producto',ProductoController::class)->names('producto');
    Route::resource('cliente',ClienteController::class)->names('cliente');
    Route::resource('venta',VentaController::class)->names('venta');
    Route::resource('asistencia',AsistenciaController::class)->names('asistencia');
    Route::resource('asistencia_cliente',AsistenciaClienteController::class)->names('asistencia_cliente');

    Route::resource('users', UserController::class)->names('users');
    Route::resource('roles', RoleController::class)->names('roles');
    Route::resource('provides', ProvidesController::class)->names('provides');

    Route::resource('categories', CategoriesController::class)->names('categories');
    Route::resource('subcategories', SubCategoriesController::class)->names('subcategories');


    Route::get('producto/subCategory/{id}',  [ProductoController::class, 'bySubCategory']);    
    Route::get('venta/pdf/{venta}', [VentaController::class, 'pdf'])->name('venta.pdf');
    
    Route::get('reporte/reports_day',[ReporteController::class, 'reports_day'])->name('reports.day');
    Route::get('reporte/reports_date',[ReporteController::class, 'reports_date'])->name('reports.date');
    Route::post('reporte/report_results',[ReporteController::class, 'report_results'])->name('report.results');

    
});




