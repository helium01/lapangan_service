<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LapanganController;
use App\Http\Controllers\FasilitasController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// route login
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

// route lapangan 
Route::get('/lapangans', [LapanganController::class, 'index']);
Route::get('/lapangans/{id}', [LapanganController::class, 'show']);
Route::post('/lapangans', [LapanganController::class, 'store']);
Route::put('/lapangans/{id}', [LapanganController::class, 'update']);
Route::delete('/lapangans/{id}', [LapanganController::class, 'destroy']);
Route::get('/lapangans/cari', [LapanganController::class, 'cari_lokasi']);

// route untuk fasilitas
Route::get('/fasilitas/{id}', [FasilitasController::class, 'show']);
Route::post('/fasilitas', [FasilitasController::class, 'store']);
Route::put('/fasilitas/{id}', [FasilitasController::class, 'update']);
Route::delete('/fasilitas/{id}', [FasilitasController::class, 'destroy']);
