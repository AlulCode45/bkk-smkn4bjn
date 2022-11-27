<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\SiswaMiddleware;
use App\Http\Middleware\MasterMiddleware;
use App\Http\Middleware\OperatorMiddleware;
use App\Http\Middleware\PerusahaanMiddleware;
use App\Http\Controllers\NavbarController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'loginAction'])->name('loginAction');
Route::post('/register', [AuthController::class, 'registerAction'])->name('registerAction');
Route::get('/visi&misi', [HomeController::class, 'visiMisi'])->name('visi&misi');
Route::get('/programkerja', [HomeController::class, 'programKerja'])->name('programkerja');
Route::get('/motto', [HomeController::class, 'motto'])->name('motto');
Route::get('/strukturorganisasi', [HomeController::class, 'strukturOrganisasi'])->name('strukturorganisasi');
Route::get('/rekapitulasi', [HomeController::class, 'rekapitulasi'])->name('rekapitulasi');

Route::get('/data-lowongan', [NavbarController::class, 'lowongan'])->name('data_lowongan');
Route::get('/data-perusahaan', [NavbarController::class, 'perusahaan'])->name('data_perusahaan');

//tracer study 
Route::get('/tracer-study', [NavbarController::class, 'tracerStudy'])->name('tracer_study');
Route::get('/kontak', [NavbarController::class, 'kontak'])->name('kontak');
Route::get('/berita', [NavbarController::class, 'berita'])->name('berita');
Route::get('/galeri', [NavbarController::class, 'galeri'])->name('galeri');
Route::get('/berita/detail/{slug}', [NavbarController::class, 'detailBerita'])->name('detailBerita');

Route::get('maintenance', function () {
    return view('maintenance');
});

Route::post('/send', [MailController::class, 'sendEmail']);

Route::middleware([MasterMiddleware::class])->group(function () {
    Route::get('/master', [MasterController::class, 'index'])->name('master');
    Route::prefix('/master')->group(function () {
        Route::get('/visi', [MasterController::class, 'visi'])->name('master.visi');
        Route::post('/visi', [MasterController::class, 'updateVisi'])->name('master.updateVisi');
        Route::get('/misi', [MasterController::class, 'misi'])->name('master.misi');
        Route::post('/misi', [MasterController::class, 'updateMisi'])->name('master.updateMisi');
        Route::get('/motto-bkk', [MasterController::class, 'mottoBkk'])->name('master.mottoBkk');
        Route::post('/motto-bkk', [MasterController::class, 'updateMottoBkk'])->name('master.updateMottoBkk');
        Route::get('/struktur', [MasterController::class, 'strukturBkk'])->name('master.strukturBkk');
        Route::post('/struktur', [MasterController::class, 'updateStrukturBkk'])->name('master.updateStrukturBkk');
        Route::get('/programkerja', [MasterController::class, 'programkerja'])->name('master.programkerja');
        Route::post('/programkerja', [MasterController::class, 'updateProgramkerja'])->name('master.updateProgramkerja');
        Route::get('/sambutankepalasekolah', [MasterController::class, 'sambutankepalasekolah'])->name('master.sambutankepalasekolah');
        Route::post('/sambutankepalasekolah', [MasterController::class, 'updateSambutankepalasekolah'])->name('master.updateSambutankepalasekolah');
        Route::get('profile', [MasterController::class, 'profile'])->name('master.profile');
        Route::post('profile', [MasterController::class, 'updateProfile'])->name('master.updateProfile');

        Route::prefix('perusahaan')->group(function () {
            Route::get('/', [MasterController::class, 'perusahaan'])->name('master.perusahaan');
            Route::post('/tambah', [MasterController::class, 'tambahPerusahaanAction'])->name('master.tambahPerusahaanAction');
            Route::get('/edit/{id}', [MasterController::class, 'editPerusahaan'])->name('master.editPerusahaan');
            Route::post('/edit/{id}', [MasterController::class, 'updateperusahaan'])->name('master.updatePerusahaan');
            Route::get('/hapus/{id}', [MasterController::class, 'hapusPerusahaan'])->name('master.hapusPerusahaan');
        });

        Route::prefix('lowongan')->group(function () {
            Route::get('/', [MasterController::class, 'lowongan'])->name('master.lowongan');
            Route::get('/{id}', [MasterController::class, 'viewLowongan'])->name('master.viewLowongan');
            Route::post('/tambah', [MasterController::class, 'tambahLowonganAction'])->name('master.tambahLowonganAction');
            Route::get('/edit/{id}', [MasterController::class, 'editLowongan'])->name('master.editLowongan');
            Route::post('/edit/{id}', [MasterController::class, 'updateLowongan'])->name('master.updateLowongan');
            Route::get('/hapus/{id}', [MasterController::class, 'hapusLowongan'])->name('master.hapusLowongan');
        });

        Route::prefix('berita')->group(function () {
            Route::get('/', [MasterController::class, 'berita'])->name('master.berita');
            Route::get('/tambah', [MasterController::class, 'tambahBerita'])->name('master.tambahBerita');
            Route::post('/tambah', [MasterController::class, 'tambahBeritaAction'])->name('master.tambahBeritaAction');
            Route::get('/edit/{id}', [MasterController::class, 'editBerita'])->name('master.editBerita');
            Route::post('/edit', [MasterController::class, 'updateBerita'])->name('master.updateBerita');
            Route::get('/hapus/{id}', [MasterController::class, 'hapusBerita'])->name('master.hapusBerita');
        });
        Route::prefix('gallery')->group(function () {
            Route::get('/', [MasterController::class, 'gallery'])->name('master.gallery');
            Route::post('/', [MasterController::class, 'tambahFoto'])->name('master.tambahFoto');
            Route::get('/hapus/{id}', [MasterController::class, 'hapusFoto'])->name('master.hapusFoto');
            Route::get('/edit/{id}', [MasterController::class, 'editFoto'])->name('master.editFoto');
            Route::post('/edit', [MasterController::class, 'updateFoto'])->name('master.updateFoto');
        });
    });
});
Route::middleware([OperatorMiddleware::class])->group(function () {
    Route::get('/operator', [OperatorController::class, 'index'])->name('operator');
});
Route::middleware([PerusahaanMiddleware::class])->group(function () {
    Route::get('/perusahaan', [PerusahaanController::class, 'index'])->name('perusahaan');
    Route::prefix('/perusahaan')->group(function () {
        Route::prefix('/perusahaan')->group(function () {
            Route::get('profile', [PerusahaanController::class, 'profile'])->name('perusahaan.profile');
            Route::post('profile', [PerusahaanController::class, 'updateProfile'])->name('perusahaan.updateProfile');
            Route::prefix('/lowongan')->group(function () {
                Route::get('/', [PerusahaanController::class, 'lowongan'])->name('perusahaan.lowongan');
                //TAMBAH LOWONGAN
                Route::post('/tambah', [PerusahaanController::class, 'tambahLowonganAction'])->name('perusahaan.tambahLowonganAction');
                //EDIT LOWONGAN
                Route::get('/edit/{id}', [PerusahaanController::class, 'editLowongan'])->name('perusahaan.editLowongan');
                Route::post('/edit/{id}', [PerusahaanController::class, 'updateLowongan'])->name('perusahaan.updateLowongan');
                //HAPUS LOWONGAN
                Route::get('/hapus/{id}', [PerusahaanController::class, 'hapusLowongan'])->name('perusahaan.hapusLowongan');
                //tutup lowongan
                Route::get('/tutup/{id}', [PerusahaanController::class, 'tutupLowongan'])->name('perusahaan.tutupLowongan');
                //aktifkan lowongan
                Route::get('/aktifkan/{id}', [PerusahaanController::class, 'aktifkanLowongan'])->name('perusahaan.aktifkanLowongan');
                Route::get('{id_lowongan}/data-pelamar', [PerusahaanController::class, 'pelamarKerja'])->name('perusahaan.pelamarKerja');
                Route::get('{id_lowongan}/data-pelamar/{id_user}', [PerusahaanController::class, 'viewPelamarKerja'])->name('perusahaan.viewPelamarKerja');
                Route::get('{id_lowongan}/data-pelamar/{id_user}/terima', [PerusahaanController::class, 'terimaPelamarKerja'])->name('perusahaan.terimaPelamarKerja');
                Route::get('{id_lowongan}/data-pelamar/{id_user}/tolak', [PerusahaanController::class, 'tolakPelamarKerja'])->name('perusahaan.tolakPelamarKerja');
                Route::get('{id_lowongan}/data-pelamar/{id_user}/batalkan-terima', [PerusahaanController::class, 'batalTerimaPelamarKerja'])->name('perusahaan.batalTerimaPelamarKerja');
                Route::get('{id_lowongan}/data-pelamar/{id_user}/batalkan-tolak', [PerusahaanController::class, 'batalTolakPelamarKerja'])->name('perusahaan.batalTolakPelamarKerja');
            });
        });
    });
});

Route::middleware([SiswaMiddleware::class])->group(function () {
    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa');
    Route::prefix('/siswa')->group(function () {
        Route::get('/profile', [SiswaController::class, 'profile'])->name('siswa.profile');
        Route::post('/editprofile', [SiswaController::class, 'updateProfile'])->name('siswa.updateProfile');
        Route::get('/lowongan', [SiswaController::class, 'lowongan'])->name('siswa.lowonganKerja');
        Route::get('/lowongan/{id}', [SiswaController::class, 'viewLowongan'])->name('siswa.viewLowongan');
        Route::post('/lowongan/daftar', [SiswaController::class, 'daftarLowongan'])->name('siswa.daftarLowongan');
    });
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
