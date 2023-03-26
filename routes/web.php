<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;


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

/*
Route::middleware(['auth:sanctum', 'verified'])->get('/acceder', [App\Http\Controllers\Auth\LoginController::class, 'login'] {
    return view('auth.login');
})->name('dashboard');
*/

//Route::get('/acceder', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');


//Route::post('auth/recuperar_contraseña', function () {
//    return view('auth.forgot-password');
//})->name('forgot-password');

//Route::post('auth/recuperar_contraseña/email_enviado', function () {
//    return view('auth.passwords.email');
//})->name('password-email');


Route::get('/', function () {  
    return view('landinghomecamper');
})->name('landing.homecamper');

Route::get('/explorar', [HomeController::class, 'list'])->name('lista.homecamper');

Route::get('/explorar/{homecamp}', [HomeController::class, 'view'])->name('vista.homecamper');

Route::get('/reservar_plaza_en_area_autocaravanas', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


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

Route::get('/auth/reservas', [DashboardController::class, 'search'])->name('reservas');

Route::get('/auth/editar_perfil/{guardarfecha?}', [DashboardController::class, 'edit'])->name('editar-homecamper');

Route::get('/auth/resumen_actividad/detalle_reserva/{id}/{guardarfecha?}', [DashboardController::class, 'show'])->name('ver-reserva');

Route::get('/auth/reservar/{id}', [ReservasController::class, 'create'])->name('ocupar');



Auth::routes();




    
});
