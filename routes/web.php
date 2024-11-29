<?php
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

// Route untuk halaman login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Route untuk halaman home (setelah login)
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

// Route untuk fitur Manage Siswa
Route::middleware('auth')->group(function () {
    Route::prefix('siswa')->group(function () {
        Route::get('/', [SiswaController::class, 'index'])->name('siswa.index'); 
        Route::get('/create', [SiswaController::class, 'create'])->name('siswa.create'); 
        Route::post('/', [SiswaController::class, 'store'])->name('siswa.store'); 
        Route::get('/{id}/edit', [SiswaController::class, 'edit'])->name('siswa.edit'); 
        Route::put('/{id}', [SiswaController::class, 'update'])->name('siswa.update'); 
        Route::delete('/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy'); 
    });
// Route untuk fitur Manage Kelas
Route::prefix('kelas')->group(function () {
    Route::get('/', [KelasController::class, 'index'])->name('kelas.index'); 
    Route::get('/create', [KelasController::class, 'create'])->name('kelas.create'); 
    Route::post('/', [KelasController::class, 'store'])->name('kelas.store'); 
    Route::get('/{id}/edit', [KelasController::class, 'edit'])->name('kelas.edit'); 
    Route::put('/{id}', [KelasController::class, 'update'])->name('kelas.update'); 
    Route::delete('/{id}', [KelasController::class, 'destroy'])->name('kelas.destroy'); 
});

// Route untuk fitur Manage Guru
Route::prefix('guru')->group(function () {
    Route::get('/', [GuruController::class, 'index'])->name('guru.index'); 
    Route::get('/create', [GuruController::class, 'create'])->name('guru.create'); 
    Route::post('/', [GuruController::class, 'store'])->name('guru.store'); 
    Route::get('/{id}/edit', [GuruController::class, 'edit'])->name('guru.edit'); 
    Route::put('/{id}', [GuruController::class, 'update'])->name('guru.update'); 
    Route::delete('/{id}', [GuruController::class, 'destroy'])->name('guru.destroy'); 
});

// Route tambahan untuk list gabungan
Route::get('/students-by-class', [SiswaController::class, 'listByClass'])->name('siswa.byClass');
Route::get('/teachers-by-class', [GuruController::class, 'listByClass'])->name('guru.byClass');
Route::get('/all-data', [SiswaController::class, 'listAllData'])->name('all.data');
});
