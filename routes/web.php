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

    Route::resource('empleado',EmpleadoController::class)->names('admin.empleado');
    Route::resource('area',AreaController::class)->names('admin.area');
    Route::resource('membresia',MembresiaController::class)->names('admin.membresia');
    Route::resource('producto',ProductoController::class)->names('admin.producto');
    Route::resource('cliente',ClienteController::class)->names('admin.cliente');
    Route::resource('venta',VentaController::class)->names('admin.venta');
    Route::resource('asistencia',AsistenciaController::class)->names('admin.asistencia');
    Route::resource('asistencia_cliente',AsistenciaClienteController::class)->names('admin.asistencia_cliente');
    
    Route::resource('users', UserController::class)->names('admin.users');
    Route::resource('roles', RoleController::class)->names('admin.roles');
    
    Route::get('venta/pdf/{venta}', [VentaController::class, 'pdf'])->name('venta.pdf');
    
    Route::get('reporte/reports_day',[ReporteController::class, 'reports_day'])->name('reports.day');
    Route::get('reporte/reports_date',[ReporteController::class, 'reports_date'])->name('reports.date');
    Route::post('reporte/report_results',[ReporteController::class, 'report_results'])->name('report.results');

    
});




