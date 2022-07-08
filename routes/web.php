<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrdenDeTicketController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TypeTicketController;
use App\Models\OrdenDeTicket;
use App\Models\TypeTicket;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    $typeTickets = TypeTicket::all();
    return view('welcome',compact('typeTickets'));
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::resource('type-tickets', TypeTicketController::class)->middleware(['auth','soloAdmin']);

Route::resource('tickets', TicketController::class)->middleware(['auth','soloAdmin']);

Route::get('/adquirir-boletos', [TicketController::class, 'adquirirBoletos'])->name('adquirir-boletos')->middleware('auth');

Route::post('/generar-orden', [TicketController::class, 'generarOrden'])->name('generar-orden')->middleware('auth');

Route::get('/gracias-por-tu-compra/{uid}',[TicketController::class,'graciasPorTuCompra'])->name('gracias-por-tu-compra')->middleware('auth');

Route::get('/verMisOrdenes', [OrdenDeTicketController::class, 'verMisOrdenes'])->name('verMisOrdenes')->middleware('auth');

Route::get('/prueba', [OrdenDeTicketController::class, 'prueba'])->name('prueba');

Route::get('ver-mis-boletos',[TicketController::class,'verMisBoletos'])->name('ver-mis-boletos')->middleware('auth');

Route::get('/reenviarCorreoOrden/{uid}',[OrdenDeTicketController::class,'reenviarCorreoOrden'])->name('reenviarCorreoOrden')->middleware('auth');

Route::get('/descargarBoletos/{token}',[TicketController::class,'descargarBoletos'])->name('descargarBoletos')->middleware('auth');

Route::resource('orden-de-tickets',OrdenDeTicketController::class)->middleware(['auth','soloAdmin']);

Route::get('asignar-boletos/{uid}',[OrdenDeTicketController::class,'asignarBoletos'])->middleware('auth')->name('asignar-boletos');


Route::post('superAsignarBoletos',[OrdenDeTicketController::class,'superAsignarBoletos'])->middleware('auth')->name('superAsignarBoletos');


Route::post('acreditarBoletosAjax',[OrdenDeTicketController::class,'acreditarBoletosAjax'])->middleware(['auth','soloAdmin'])->name('acreditarBoletosAjax');
Route::post('desAcreditarBoletosAjax',[OrdenDeTicketController::class,'desAcreditarBoletosAjax'])->middleware(['auth','soloAdmin'])->name('desAcreditarBoletosAjax');
