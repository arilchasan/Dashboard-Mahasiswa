<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\OrderController;
use App\Models\Order;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('admin.components.app');
})->middleware(['auth']);

Route::prefix('/admin')->group(function () {
    
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });
    Route::prefix('/mahasiswa')->group(function(){
        Route::get('/list', [MahasiswaController::class, 'index']);
        Route::get('/detail/{id}',[MahasiswaController::class, 'detail']);
        Route::get('/edit/{id}',[MahasiswaController::class, 'edit']);
        Route::post('/update/{id}',[MahasiswaController::class, 'update']);
        Route::get('/create',[MahasiswaController::class, 'create']);
        Route::post('/add',[MahasiswaController::class, 'store']);
        Route::delete('/delete/{id}',[MahasiswaController::class, 'destroy']);
        Route::get('/matkul-saya',[MahasiswaController::class, 'matkulSaya']);
    });
    Route::get('/dosen', [DosenController::class, 'index']);
    Route::get('/mata-kuliah',[MataKuliahController::class, 'index']);
    Route::get('/mata-kuliah/detail/{id}',[MataKuliahController::class, 'detail']);
    Route::get('/mata-kuliah/permintaan',[MataKuliahController::class, 'permintaan']);

    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login-load', [LoginController::class, 'login']);
    Route::get('/logout', [LoginController::class, 'logout']);
    Route::get('/login-mahasiswa', [LoginController::class, 'indexMhs']);
    Route::post('/login-mahasiswa-load', [LoginController::class, 'loginMhs']);
    Route::get('/register', [LoginController::class, 'register']);
    Route::post('/register-load', [LoginController::class, 'registerLoad']);
    Route::post('/gabung-matkul', [OrderController::class, 'gabungMatkul']);
    Route::post('/approve-matkul/{id}', [OrderController::class, 'approve']);
    Route::post('/reject-matkul/{id}', [OrderController::class, 'reject']);
    Route::get('/error', function () {
        return view('admin.403');
    });
});