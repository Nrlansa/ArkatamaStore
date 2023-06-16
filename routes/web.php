<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleControlle;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\staff\SprodukController;

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

Route::controller(AuthController::class)->group(function(){
    Route::get('login', 'login')->name('login');
    Route::post('proses_login', 'proses_login');
    Route::get('logout','logout');
    Route::get('/register', 'daftar');
    Route::post('/register', 'daftarshow');
});
Route::get('/', [LandingController::class, 'index'])->name('landing.index');
Route::get('landing/{id}', [LandingController::class, 'show']);


// route::resource('/', LandingController::class);


Route::group(['middleware' => ['auth', 'Ceklogin:staff']], function () {
    Route::get('staffdashboard', function () {
        return view('staff.dashboard');
    });
    Route::resource('/staffproduk', SprodukController::class);
});

Route::group(['middleware' => ['auth', 'Ceklogin:admin']],function () {
    Route::get('dashboard', function () {
        return view('admin.dashboard');
    });
    Route::resource('user', UserController::class);
    Route::resource('/produk/kategori', KategoriController::class);
    Route::resource('/produk', ProdukController::class);
    Route::put('/produk/{id}/update-status/{status}', [ProdukController::class, 'updateStatus'])->name('produk.update-status');
    Route::resource('/slider', SliderController::class);
    Route::put('/slider/{id}/update-status/{is_active}', [SliderController::class, 'updateStatus'])->name('slider.update-status');

});