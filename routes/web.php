<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataAlternatifController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubKriteriaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['guest'])->group(function () {
    Route::get('/', [AuthController::class, 'indexLogin'])->name('indexLogin');
    Route::post('/', [AuthController::class, 'storeLogin'])->name('storeLogin');

    Route::get('/daftar', [AuthController::class, 'indexDaftar'])->name('indexDaftar');
    Route::post('/daftar', [AuthController::class, 'storeDaftar'])->name('storeDaftar');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'indexDashboard'])->name('indexDashboard');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::prefix('/profile')->group(function () {
        Route::get('/', [ProfileController::class, 'indexProfile'])->name('indexProfile');
        Route::patch('/{user}', [ProfileController::class, 'updateProfile'])->name('updateProfile');
    });

    Route::prefix('/kriteria')->group(function () {
        Route::get('/', [KriteriaController::class, 'indexKriteria'])->name('indexKriteria');
        Route::get('/create', [KriteriaController::class, 'createKriteria'])->name('createKriteria');
        Route::post('/create', [KriteriaController::class, 'storeKriteria'])->name('storeKriteria');
        Route::get('/edit/{kriteria:uuid}', [KriteriaController::class, 'editKriteria'])->name('editKriteria');
        Route::patch('/edit/{kriteria:uuid}', [KriteriaController::class, 'updateKriteria'])->name('updateKriteria');
        Route::delete('/delete/{kriteria:uuid}', [KriteriaController::class, 'deleteKriteria'])->name('deleteKriteria');
    });

    Route::prefix('/subkriteria')->group(function () {
        Route::get('/', [SubKriteriaController::class, 'indexSubKriteria'])->name('indexSubKriteria');
        Route::post('/create/{kriteria}', [SubKriteriaController::class, 'storeSubKriteria'])->name('storeSubKriteria');
        Route::patch('/edit/{subKriteria:uuid}', [SubKriteriaController::class, 'updateSubKriteria'])->name('updateSubKriteria');
        Route::delete('/delete/{subKriteria:uuid}', [SubKriteriaController::class, 'deleteSubKriteria'])->name('deleteSubKriteria');
    });

    Route::prefix('/alternatif')->group(function () {
        Route::get('/', [DataAlternatifController::class, 'indexDataAlternatif'])->name('indexDataAlternatif');
        Route::get('/create', [DataAlternatifController::class, 'createDataAlternatif'])->name('createDataAlternatif');
        Route::post('/create', [DataAlternatifController::class, 'storeDataAlternatif'])->name('storeDataAlternatif');
        Route::get('/edit/{dataAlternatif:uuid}', [DataAlternatifController::class, 'editDataAlternatif'])->name('editDataAlternatif');
        Route::patch('/edit/{dataAlternatif:uuid}', [DataAlternatifController::class, 'updateDataAlternatif'])->name('updateDataAlternatif');
        Route::delete('/delete/{dataAlternatif:uuid}', [DataAlternatifController::class, 'deleteDataAlternatif'])->name('deleteDataAlternatif');
    });
});
