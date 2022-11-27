<?php

use App\Http\Controllers\AngketController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DinasController;
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
use App\Http\Middleware\DinasMiddleware;

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
Route::get('/statistik', [NavbarController::class, 'statistik'])->name('statistik');
Route::get('/testimoni', [NavbarController::class, 'testimoni'])->name('testimoni');
Route::get('/angket_siswa', [NavbarController::class, 'angket_siswa'])->name('angket_siswa');
Route::post('/simpanangket', [AngketController::class, 'saveAngket'])->name('simpanAngket');

Route::get('/angket-kepuasan', [NavbarController::class, 'angketKepuasan'])->name('angketKepuasan');
Route::post('/simpan-angket-kepuasan', [AngketController::class, 'saveAngketKepuasan'])->name('simpanAngketKepuasan');

Route::get('maintenance', function () {
    return view('maintenance');
});

Route::post('/send', [MailController::class, 'sendEmail']);

Route::middleware([MasterMiddleware::class])->group(function () {
    Route::get('/master', [MasterController::class, 'index'])->name('master');
    Route::prefix('/master')->group(function () {
        Route::post('image-upload', [MasterController::class, 'storeImage'])->name('master.uploadImage');
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
        Route::get('/angket', [MasterController::class, 'showAngket'])->name('master.angket');
        Route::get('/kepuasan-pelanggan', [MasterController::class, 'kepuasanPelanggan'])->name('master.kepuasanPelanggan');
        Route::get('/kepuasan-pelanggan/{id}', [MasterController::class, 'lihatKepuasanPelanggan'])->name('master.lihatKepuasan');

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

        Route::prefix('testimoni')->group(function () {
            Route::get('/', [MasterController::class, 'testimoni'])->name('master.testimoni');
            Route::post('/', [MasterController::class, 'tambahTestimoni'])->name('master.tambahTestimoni');
            Route::get('/edit/{id}', [MasterController::class, 'editTestimoni'])->name('master.editTestimoni');
            Route::post('/edit', [MasterController::class, 'editTestimoni'])->name('master.updateTestimoni');
        });
    });
});
Route::middleware([OperatorMiddleware::class])->group(function () {
    Route::get('/operator', [OperatorController::class, 'index'])->name('operator');
    Route::prefix('/operator')->group(function () {
        Route::post('image-upload', [OperatorController::class, 'storeImage'])->name('operator.uploadImage');
        Route::get('profile', [OperatorController::class, 'profile'])->name('operator.profile');
        Route::post('profile', [OperatorController::class, 'updateProfile'])->name('operator.updateProfile');
        Route::get('/kepuasan-pelanggan', [OperatorController::class, 'kepuasanPelanggan'])->name('operator.kepuasanPelanggan');
        Route::get('/kepuasan-pelanggan/{id}', [OperatorController::class, 'lihatKepuasanPelanggan'])->name('operator.lihatKepuasan');

        Route::prefix('perusahaan')->group(function () {
            Route::get('/', [OperatorController::class, 'perusahaan'])->name('operator.perusahaan');
            Route::post('/tambah', [OperatorController::class, 'tambahPerusahaanAction'])->name('operator.tambahPerusahaanAction');
            Route::get('/edit/{id}', [OperatorController::class, 'editPerusahaan'])->name('operator.editPerusahaan');
            Route::post('/edit/{id}', [OperatorController::class, 'updateperusahaan'])->name('operator.updatePerusahaan');
            Route::get('/hapus/{id}', [OperatorController::class, 'hapusPerusahaan'])->name('operator.hapusPerusahaan');
        });

        Route::prefix('lowongan')->group(function () {
            Route::get('/', [OperatorController::class, 'lowongan'])->name('operator.lowongan');
            Route::get('/{id}', [OperatorController::class, 'viewLowongan'])->name('operator.viewLowongan');
            Route::post('/tambah', [OperatorController::class, 'tambahLowonganAction'])->name('operator.tambahLowonganAction');
            Route::get('/edit/{id}', [OperatorController::class, 'editLowongan'])->name('operator.editLowongan');
            Route::post('/edit/{id}', [OperatorController::class, 'updateLowongan'])->name('operator.updateLowongan');
            Route::get('/hapus/{id}', [OperatorController::class, 'hapusLowongan'])->name('operator.hapusLowongan');
        });

        Route::prefix('berita')->group(function () {
            Route::get('/', [OperatorController::class, 'berita'])->name('operator.berita');
            Route::get('/tambah', [OperatorController::class, 'tambahBerita'])->name('operator.tambahBerita');
            Route::post('/tambah', [OperatorController::class, 'tambahBeritaAction'])->name('operator.tambahBeritaAction');
            Route::get('/edit/{id}', [OperatorController::class, 'editBerita'])->name('operator.editBerita');
            Route::post('/edit', [OperatorController::class, 'updateBerita'])->name('operator.updateBerita');
            Route::get('/hapus/{id}', [OperatorController::class, 'hapusBerita'])->name('operator.hapusBerita');
        });
        Route::prefix('gallery')->group(function () {
            Route::get('/', [OperatorController::class, 'gallery'])->name('operator.gallery');
            Route::post('/', [OperatorController::class, 'tambahFoto'])->name('operator.tambahFoto');
            Route::get('/hapus/{id}', [OperatorController::class, 'hapusFoto'])->name('operator.hapusFoto');
            Route::get('/edit/{id}', [OperatorController::class, 'editFoto'])->name('operator.editFoto');
            Route::post('/edit', [OperatorController::class, 'updateFoto'])->name('operator.updateFoto');
        });

        Route::prefix('testimoni')->group(function () {
            Route::get('/', [OperatorController::class, 'testimoni'])->name('operator.testimoni');
            Route::post('/', [OperatorController::class, 'tambahTestimoni'])->name('operator.tambahTestimoni');
            Route::get('/edit/{id}', [OperatorController::class, 'editTestimoni'])->name('operator.editTestimoni');
            Route::post('/edit', [OperatorController::class, 'editTestimoni'])->name('operator.updateTestimoni');
        });
    });
});
Route::middleware([PerusahaanMiddleware::class])->group(function () {
    Route::get('/perusahaan', [PerusahaanController::class, 'index'])->name('perusahaan');
    Route::prefix('/perusahaan')->group(function () {
        Route::prefix('/perusahaan')->group(function () {
            Route::get('profile', [PerusahaanController::class, 'profile'])->name('perusahaan.profile');
            Route::post('profile', [PerusahaanController::class, 'updateProfile'])->name('perusahaan.updateProfile');

            Route::get('/testimoni', [PerusahaanController::class, 'testimoni'])->name('perusahaan.testimoni');
            Route::post('/update-testimoni', [PerusahaanController::class, 'updateTestimoni'])->name('perusahaan.updateTestimoni');

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
        Route::get('/testimoni', [SiswaController::class, 'testimoni'])->name('siswa.testimoni');
        Route::post('/update-testimoni', [SiswaController::class, 'updateTestimoni'])->name('siswa.updateTestimoni');
    });
});

Route::middleware([DinasMiddleware::class])->group(function () {
    Route::get('/dinas', [DinasController::class, 'index'])->name('dinas');
    Route::prefix('/dinas')->group(function () {
        Route::post('image-upload', [DinasController::class, 'storeImage'])->name('dinas.uploadImage');
        Route::get('profile', [DinasController::class, 'profile'])->name('dinas.profile');
        Route::post('profile', [DinasController::class, 'updateProfile'])->name('dinas.updateProfile');
        Route::prefix('perusahaan')->group(function () {
            Route::get('/', [DinasController::class, 'perusahaan'])->name('dinas.perusahaan');
            Route::post('/tambah', [DinasController::class, 'tambahPerusahaanAction'])->name('dinas.tambahPerusahaanAction');
            Route::get('/edit/{id}', [DinasController::class, 'editPerusahaan'])->name('dinas.editPerusahaan');
            Route::post('/edit/{id}', [DinasController::class, 'updateperusahaan'])->name('dinas.updatePerusahaan');
            Route::get('/hapus/{id}', [DinasController::class, 'hapusPerusahaan'])->name('dinas.hapusPerusahaan');
        });

        Route::prefix('lowongan')->group(function () {
            Route::get('/', [DinasController::class, 'lowongan'])->name('dinas.lowongan');
            Route::get('/{id}', [DinasController::class, 'viewLowongan'])->name('dinas.viewLowongan');
            Route::post('/tambah', [DinasController::class, 'tambahLowonganAction'])->name('dinas.tambahLowonganAction');
            Route::get('/edit/{id}', [DinasController::class, 'editLowongan'])->name('dinas.editLowongan');
            Route::post('/edit/{id}', [DinasController::class, 'updateLowongan'])->name('dinas.updateLowongan');
            Route::get('/hapus/{id}', [DinasController::class, 'hapusLowongan'])->name('dinas.hapusLowongan');
        });

        Route::prefix('berita')->group(function () {
            Route::get('/', [DinasController::class, 'berita'])->name('dinas.berita');
            Route::get('/tambah', [DinasController::class, 'tambahBerita'])->name('dinas.tambahBerita');
            Route::post('/tambah', [DinasController::class, 'tambahBeritaAction'])->name('dinas.tambahBeritaAction');
            Route::get('/edit/{id}', [DinasController::class, 'editBerita'])->name('dinas.editBerita');
            Route::post('/edit', [DinasController::class, 'updateBerita'])->name('dinas.updateBerita');
            Route::get('/hapus/{id}', [DinasController::class, 'hapusBerita'])->name('dinas.hapusBerita');
        });
        Route::prefix('gallery')->group(function () {
            Route::get('/', [DinasController::class, 'gallery'])->name('dinas.gallery');
            Route::post('/', [DinasController::class, 'tambahFoto'])->name('dinas.tambahFoto');
            Route::get('/hapus/{id}', [DinasController::class, 'hapusFoto'])->name('dinas.hapusFoto');
            Route::get('/edit/{id}', [DinasController::class, 'editFoto'])->name('dinas.editFoto');
            Route::post('/edit', [DinasController::class, 'updateFoto'])->name('dinas.updateFoto');
        });

        Route::prefix('testimoni')->group(function () {
            Route::get('/', [DinasController::class, 'testimoni'])->name('dinas.testimoni');
            Route::post('/', [DinasController::class, 'tambahTestimoni'])->name('dinas.tambahTestimoni');
            Route::get('/edit/{id}', [DinasController::class, 'editTestimoni'])->name('dinas.editTestimoni');
            Route::post('/edit', [DinasController::class, 'editTestimoni'])->name('dinas.updateTestimoni');
        });
    });
});
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
