<?php

use App\Models\Keranjang;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleControlle;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\staff\SprodukController;
use App\Http\Controllers\VerifikasipembayaranController;

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
// Route::get('/', [LandingController::class, 'listproduk']);
Route::get('landing/{id}', [LandingController::class, 'show']);



// Route::middleware('auth:member')->group(function () {
//     Route::get('/profil/{id}', [LandingController::class, 'profil'])->name('landing.profil');
//     Route::get('/listproduk', [LandingController::class, 'listproduk']);
//     Route::get('/detailproduk/{id}', [LandingController::class, 'detail']);
//     Route::get('/cart', [KeranjangController::class, 'index'])->name('cart.index');
//     Route::post('/cart', [KeranjangController::class, 'add'])->name('cart.add');
//     Route::post('/cart/checkout/{itemId}', [KeranjangController::class, 'checkout'])->name('cart.checkout');
//     Route::post('/cart/checkout/process', [KeranjangController::class, 'processCheckout'])->name('cart.checkout.process');
//     Route::post('/cart/remove/{id}', [KeranjangController::class, 'remove'])->name('cart.remove');
//     Route::post('/order/checkout', [OrderController::class, 'checkout'])->name('order.checkout');
//     Route::get('/order/{id}', [OrderController::class, 'show'])->name('order.show');
//     // Route::get('/order/{id}', [OrderController::class, 'cekOngkir']);
//     Route::post('/order/{orderId}/process-payment', [PaymentController::class, 'processPayment'])->name('order.processPayment');
//     Route::get('/payment/success/{orderId}', [PaymentController::class, 'paymentSuccess'])->name('payment.success');

// });

// Route::middleware('auth:member')->group(function () {
//     Route::get('/profil/{id}', [LandingController::class, 'profil'])->name('landing.profil');
//     Route::get('/listproduk', [LandingController::class, 'listproduk']);
//     Route::get('/detailproduk/{id}', [LandingController::class, 'detail']);
//     Route::get('/cart', [KeranjangController::class, 'index'])->name('cart.index');
//     Route::post('/cart', [KeranjangController::class, 'add'])->name('cart.add');
//     Route::post('/cart/checkout', [KeranjangController::class, 'checkout'])->name('cart.checkout');
//     Route::post('/cart/checkout/process', [KeranjangController::class, 'processCheckout'])->name('cart.checkout.process');
//     Route::post('/cart/remove/{id}', [KeranjangController::class, 'remove'])->name('cart.remove');
//     Route::post('/order/checkout', [OrderController::class, 'checkout'])->name('order.checkout');
//     Route::get('/order/{id}', [OrderController::class, 'show'])->name('order.show');
//     // Route::get('/order/{id}', [OrderController::class, 'cekOngkir']);
//     Route::post('/order/{orderId}/process-payment', [PaymentController::class, 'processPayment'])->name('order.processPayment');
//     Route::get('/payment/success/{orderId}', [PaymentController::class, 'paymentSuccess'])->name('payment.success');
// });

Route::middleware('auth:member')->group(function () {
    Route::get('/profil/{id}', [LandingController::class, 'profil'])->name('landing.profil');
    Route::get('/detailproduk/{id}', [LandingController::class, 'detail']);
    Route::get('/listproduk', [LandingController::class, 'listproduk']);
    Route::post('/keranjang/add', [KeranjangController::class, 'tambahKeKeranjang'])->name('keranjang.add');
    Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang.index');
    Route::delete('/keranjang/delete/{id}', [KeranjangController::class, 'hapusDariKeranjang'])->name('keranjang.delete');
    Route::post('/order/checkout', [OrderController::class, 'checkout'])->name('order.checkout');
    Route::get('/order/{id}', [OrderController::class, 'show'])->name('order.show');
    Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.index');
    Route::post('/upload-bukti-bayar/{orderId}', [PembayaranController::class, 'uploadBuktiBayar'])->name('upload.bukti_bayar');
    Route::get('/belumbayar', [PembayaranController::class, 'belumbayar'])->name('belumbayar.belumbayar');
    Route::get('/dibatalkan', [PembayaranController::class, 'pembatalan'])->name('dibatalkan.pembatalan');
    Route::get('/pemeriksaan', [PembayaranController::class, 'pemeriksaan'])->name('pemeriksaan.pemeriksaan');
    Route::get('/order/{id}/unduh-pdf', [PembayaranController::class, 'downloadPDF']);
    Route::get('/dikemas', [PembayaranController::class, 'dikemas']);
    Route::get('/dikirim', [PembayaranController::class, 'dikirim']);
    Route::post('/uploadpengiriman/{orderId}', [PembayaranController::class, 'uploadBuktipengiriman'])->name('upload.pengiriman');
});


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
    Route::resource('/verifikasi', VerifikasipembayaranController::class);
    Route::patch('/update-status/{id}', [VerifikasipembayaranController::class, 'updateStatus'])->name('update.status');
    Route::get('/kirim', [VerifikasipembayaranController::class, 'kirim']);
    Route::post('/proseskirim/{id}', [VerifikasipembayaranController::class, 'proseskirim'])->name('proseskirim');
    Route::get('/info/{id}', [VerifikasipembayaranController::class, 'info']);
    

});