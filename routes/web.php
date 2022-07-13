<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\ReservasController;
use App\Http\controllers\DashboardController;
use App\Http\controllers\HomeController;


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
Route::group(['middleware' => ['cors']], function () {


Route::middleware(['auth:sanctum', 'verified'])->get('/acceder', function () {
    return view('auth.login');
})->name('dashboard');

Route::get('/acceder', function () {
    return view('auth.login');
});

//Route::post('auth/recuperar_contraseña', function () {
//    return view('auth.forgot-password');
//})->name('forgot-password');

//Route::post('auth/recuperar_contraseña/email_enviado', function () {
//    return view('auth.passwords.email');
//})->name('password-email');


Route::get('/', function () {  
    return view('landinghomecamper');
});

Route::get('/explorar', [HomeController::class, 'list'])->name('lista.homecamper');

Route::get('/explorar/{homecamp}', [HomeController::class, 'view'])->name('vista.homecamper');

Route::get('/campify_para_campistas', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/publicar', function () {
    return view('publicarhomecamper');
})->name('publicar');


Route::get('/publicar/resultado', function () {
    return view('publicar-resultado');
})->name('publicar-resultado');






Route::get('/reservar/{id}', [ReservasController::class, 'store'])->name('reservar');


Route::get('/reservar/{id}/resultado/{id_res}', [ReservasController::class, 'show'])->name('resultado');



//Midelware auth
Route::get('/auth/resumen_actividad/{guardarfecha?}', [DashboardController::class, 'index'])->name('dashboard-homecamper');

Route::get('/auth/editar_perfil/', [DashboardController::class, 'edit'])->name('editar-homecamper');

Route::get('/auth/resumen_actividad/detalle_reserva/{id}/{guardarfecha?}', [DashboardController::class, 'show'])->name('ver-reserva');

Auth::routes();




    
});
