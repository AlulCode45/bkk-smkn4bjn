<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NavbarController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/rekapitulasi', [ApiController::class, 'getRekapitulasi']);
Route::get('/detailjurusan/{id}', [ApiController::class, 'getDetailJurusan']);
Route::get('/detailSiswa/{id}/{tahun}', [ApiController::class, 'getDetailKelas']);