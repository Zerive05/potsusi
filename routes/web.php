<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Route ini akan menangani pengalihan Laravel ke 'login'
// dan mengarahkan kembali ke halaman utama untuk popup login.
Route::get('/login', function () {
    return redirect('/'); // Mengarahkan kembali ke halaman utama welcome
})->name('login');

// Route untuk menampilkan form register (jika ada form register di halaman terpisah)
// Jika register juga popup di welcome.blade.php, Anda bisa melakukan hal yang sama seperti login
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');

// Route untuk proses Login (Form POST)
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// Route untuk proses Register (Form POST)
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

// Route untuk Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route yang memerlukan autentikasi
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/pesanan', [PesanController::class, 'show'])->name('pesanan');

    // kota
    Route::get('/kota/{id}', [KotaController::class, 'show'])->name('kota.show');

    // lihat kamar hotel
    Route::get('/hotel/{id}', [HotelController::class, 'show'])->name('hotel.show');

    // pesan kamar
    Route::get('/kamar/{id}', [KamarController::class, 'pesan'])->name('kamar.pesan');

    // pembayaran
    Route::post('/pesan/{id}', [PesanController::class, 'store'])->name('pesan.store');

    // --- Routes untuk Fitur Pesan Kamar ---
    // Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');
    // Route::get('/rooms/{room}', [RoomController::class, 'show'])->name('rooms.show');
    // Route::post('/rooms/{room}/book', [RoomController::class, 'book'])->name('rooms.book');
});
