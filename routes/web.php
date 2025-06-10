<?php

use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PurchaseController;
// use App\Http\Controllers\ProductController; // Opsional: Jika Anda memutuskan untuk membuat ProductController terpisah

// --- Rute Halaman Utama ---
// Menampilkan halaman utama (homepage) menggunakan FrontendController
Route::get('/', [FrontendController::class, 'index' ]);

// --- Rute Dashboard (Membutuhkan Autentikasi & Verifikasi Email) ---
// Rute ini mengarah ke dashboard setelah pengguna login dan emailnya terverifikasi.
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// --- Rute-rute Profil (Membutuhkan Autentikasi) ---
// Grup rute ini melindungi semua rute profil agar hanya bisa diakses oleh pengguna yang sudah login.
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// --- Rute Detail Produk ---
// Rute ini akan menampilkan halaman detail untuk sebuah produk/foto berdasarkan ID-nya.
// Saat ini mengarah ke DashboardController::show.
// Jika Anda membuat ProductController terpisah, ubah menjadi [ProductController::class, 'show']
Route::get('/product/{id}', [DashboardController::class, 'show'])->name('product.show');

// --- Rute Pembelian Cepat (Simulasi) ---
// Membutuhkan autentikasi untuk mengetahui user_id
Route::middleware('auth')->post('/purchase/{product}', [PurchaseController::class, 'store'])->name('purchase.store'); // Menggunakan {product} agar Route Model Binding otomatis bekerja

// Rute untuk halaman sukses (Anda perlu membuat view ini)
Route::get('/purchase/success', function () {
    return view('purchase.success'); // <<<< Anda perlu membuat resources/views/purchase/success.blade.php >>>>
})->name('purchase.success');


// --- Rute-rute Otentikasi Laravel Breeze (Login, Register, dll.) ---
require __DIR__.'/auth.php';

// --- Rute-rute Khusus Admin ---
require __DIR__.'/admin.php';