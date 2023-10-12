<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MataKuliahController;

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
    });
    Route::get('/dosen', [DosenController::class, 'index']);
    Route::get('/mata-kuliah',[MataKuliahController::class, 'index']);
    Route::get('/mata-kuliah/detail/{id}',[MataKuliahController::class, 'detail']);

    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login-load', [LoginController::class, 'login']);
    Route::get('/logout', [LoginController::class, 'logout']);
    Route::get('/error', function () {
        return view('admin.403');
    });
});