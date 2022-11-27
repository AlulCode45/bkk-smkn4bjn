<?php

namespace App\Http\Controllers;

use App\Models\DataSiswaModel;
use App\Models\GalleryModel;
use App\Models\JurusanLowonganModel;
use App\Models\JurusanModel;
use App\Models\KepuasanPelangganModel;
use App\Models\KomliModel;
use App\Models\LowonganModel;
use App\Models\NewsModel;
use App\Models\PerusahaanModel;
use App\Models\TestimoniModel;
use Illuminate\Http\Request;

class NavbarController extends Controller
{
    public function lowongan(Request $request)
    {
        $jurusan = JurusanModel::all();
        $lowongan = LowonganModel::JoinA()->Filter($request)->with('jurusan')->paginate(10);
        return view('lowongan.index', [
            'jurusan' => $jurusan,
            'lowongan' => $lowongan,
            'request' => $request,
        ]);
    }

    public function perusahaan(Request $request)
    {
        $perusahaan = PerusahaanModel::Filter($request)->paginate(10);
        return view('perusahaan', [
            'perusahaan' => $perusahaan,
            'request' => $request,
        ]);
    }

    public function tracerStudy()
    {
        //mengambil tahun ini
        $tahun_ini = date('Y');

        $data = [
            'data_alumni' => DataSiswaModel::join('komli', 'komli.id', '=', 'data_siswa.id_komli')
                ->join('jurusan', 'jurusan.id', '=', 'komli.id_jurusan')
                ->select('jurusan.nama_jurusan', 'data_siswa.*')
                ->where('tahun_lulus', '<=', date('Y'))
                ->get(),
            'data_jurusan' => JurusanModel::all(),
        ];
        // dd($data);
        return view('tracer-study', $data);
    }

    public function kontak()
    {
        return view('kontak.index');
    }

    public function berita()
    {
        $berita = NewsModel::orderBy('id', 'DESC')->paginate(6);
        $data = [
            'berita' => $berita,
        ];

        return view('informasi.berita', $data);
    }

    public function galeri()
    {
        $data = [
            'data_gallery' => GalleryModel::paginate(9),
        ];
        return view('informasi.galeri', $data);
    }

    public function detailBerita($slug)
    {
        $berita = NewsModel::where('slug', $slug)->get();
        return view('informasi.detail_berita', [
            'detail' => $berita[0],
        ]);
    }

    public function statistik()
    {
        $data = [
            'survey1' => [
                'sangat_setuju' => KepuasanPelangganModel::where(['id_survey' => 1, 'status_kepuasan' => 1])->count(),
                'setuju' => KepuasanPelangganModel::where(['id_survey' => 1, 'status_kepuasan' => 2])->count(),
                'netral' => KepuasanPelangganModel::where(['id_survey' => 1, 'status_kepuasan' => 3])->count(),
                'tidak_setuju' => KepuasanPelangganModel::where(['id_survey' => 1, 'status_kepuasan' => 4])->count(),
            ],
            'survey2' => [
                'sangat_setuju' => KepuasanPelangganModel::where(['id_survey' => 2, 'status_kepuasan' => 1])->count(),
                'setuju' => KepuasanPelangganModel::where(['id_survey' => 2, 'status_kepuasan' => 2])->count(),
                'netral' => KepuasanPelangganModel::where(['id_survey' => 2, 'status_kepuasan' => 3])->count(),
                'tidak_setuju' => KepuasanPelangganModel::where(['id_survey' => 2, 'status_kepuasan' => 4])->count(),
            ],
            'survey3' => [
                'sangat_setuju' => KepuasanPelangganModel::where(['id_survey' => 3, 'status_kepuasan' => 1])->count(),
                'setuju' => KepuasanPelangganModel::where(['id_survey' => 3, 'status_kepuasan' => 2])->count(),
                'netral' => KepuasanPelangganModel::where(['id_survey' => 3, 'status_kepuasan' => 3])->count(),
                'tidak_setuju' => KepuasanPelangganModel::where(['id_survey' => 3, 'status_kepuasan' => 4])->count(),
            ],
            'survey4' => [
                'sangat_setuju' => KepuasanPelangganModel::where(['id_survey' => 4, 'status_kepuasan' => 1])->count(),
                'setuju' => KepuasanPelangganModel::where(['id_survey' => 4, 'status_kepuasan' => 2])->count(),
                'netral' => KepuasanPelangganModel::where(['id_survey' => 4, 'status_kepuasan' => 3])->count(),
                'tidak_setuju' => KepuasanPelangganModel::where(['id_survey' => 4, 'status_kepuasan' => 4])->count(),
            ],
            'survey5' => [
                'sangat_setuju' => KepuasanPelangganModel::where(['id_survey' => 5, 'status_kepuasan' => 1])->count(),
                'setuju' => KepuasanPelangganModel::where(['id_survey' => 5, 'status_kepuasan' => 2])->count(),
                'netral' => KepuasanPelangganModel::where(['id_survey' => 5, 'status_kepuasan' => 3])->count(),
                'tidak_setuju' => KepuasanPelangganModel::where(['id_survey' => 5, 'status_kepuasan' => 4])->count(),
            ],
            'survey6' => [
                'sangat_setuju' => KepuasanPelangganModel::where(['id_survey' => 6, 'status_kepuasan' => 1])->count(),
                'setuju' => KepuasanPelangganModel::where(['id_survey' => 6, 'status_kepuasan' => 2])->count(),
                'netral' => KepuasanPelangganModel::where(['id_survey' => 6, 'status_kepuasan' => 3])->count(),
                'tidak_setuju' => KepuasanPelangganModel::where(['id_survey' => 6, 'status_kepuasan' => 4])->count(),
            ],
            'survey7' => [
                'sangat_setuju' => KepuasanPelangganModel::where(['id_survey' => 7, 'status_kepuasan' => 1])->count(),
                'setuju' => KepuasanPelangganModel::where(['id_survey' => 7, 'status_kepuasan' => 2])->count(),
                'netral' => KepuasanPelangganModel::where(['id_survey' => 7, 'status_kepuasan' => 3])->count(),
                'tidak_setuju' => KepuasanPelangganModel::where(['id_survey' => 7, 'status_kepuasan' => 4])->count(),
            ],
            'survey8' => [
                'sangat_setuju' => KepuasanPelangganModel::where(['id_survey' => 8, 'status_kepuasan' => 1])->count(),
                'setuju' => KepuasanPelangganModel::where(['id_survey' => 8, 'status_kepuasan' => 2])->count(),
                'netral' => KepuasanPelangganModel::where(['id_survey' => 8, 'status_kepuasan' => 3])->count(),
                'tidak_setuju' => KepuasanPelangganModel::where(['id_survey' => 8, 'status_kepuasan' => 4])->count(),
            ],
            'survey9' => [
                'sangat_setuju' => KepuasanPelangganModel::where(['id_survey' => 9, 'status_kepuasan' => 1])->count(),
                'setuju' => KepuasanPelangganModel::where(['id_survey' => 9, 'status_kepuasan' => 2])->count(),
                'netral' => KepuasanPelangganModel::where(['id_survey' => 9, 'status_kepuasan' => 3])->count(),
                'tidak_setuju' => KepuasanPelangganModel::where(['id_survey' => 9, 'status_kepuasan' => 4])->count(),
            ],
            'survey10' => [
                'sangat_setuju' => KepuasanPelangganModel::where(['id_survey' => 10, 'status_kepuasan' => 1])->count(),
                'setuju' => KepuasanPelangganModel::where(['id_survey' => 10, 'status_kepuasan' => 2])->count(),
                'netral' => KepuasanPelangganModel::where(['id_survey' => 10, 'status_kepuasan' => 3])->count(),
                'tidak_setuju' => KepuasanPelangganModel::where(['id_survey' => 10, 'status_kepuasan' => 4])->count(),
            ],

            'keterserapan' => [
                'bekerja' => DataSiswaModel::where('status', 1)->count() + DataSiswaModel::where('status', 4)->count() + DataSiswaModel::where('status', 5)->count() + DataSiswaModel::where('status', 6)->count(),
                'kuliah' => DataSiswaModel::where('status', 2)->count() + DataSiswaModel::where('status', 4)->count() + DataSiswaModel::where('status', 6)->count(),
                'wirausaha' => DataSiswaModel::where('status', 3)->count() + DataSiswaModel::where('status', 5)->count() + DataSiswaModel::where('status', 6)->count(),
                'tidak_bekerja' => DataSiswaModel::where('status', 7)->count(),
            ],

            'keterserapan_tahun_1' => [
                'bekerja' => DataSiswaModel::where('status', 1)->where('tahun_lulus', date('Y'))->count() + DataSiswaModel::where('status', 4)->where('tahun_lulus', date('Y'))->count() + DataSiswaModel::where('status', 5)->where('tahun_lulus', date('Y'))->count() + DataSiswaModel::where('status', 6)->where('tahun_lulus', date('Y'))->count(),
                'kuliah' => DataSiswaModel::where('status', 2)->where('tahun_lulus', date('Y'))->count() + DataSiswaModel::where('status', 4)->where('tahun_lulus', date('Y'))->count() + DataSiswaModel::where('status', 6)->where('tahun_lulus', date('Y'))->count(),
                'wirausaha' => DataSiswaModel::where('status', 3)->where('tahun_lulus', date('Y'))->count() + DataSiswaModel::where('status', 5)->where('tahun_lulus', date('Y'))->count() + DataSiswaModel::where('status', 6)->where('tahun_lulus', date('Y'))->count(),
                'tidak_bekerja' => DataSiswaModel::where('status', 7)->where('tahun_lulus', date('Y'))->count(),
            ],
            'keterserapan_tahun_2' => [
                'bekerja' => DataSiswaModel::where('status', 1)->where('tahun_lulus', date('Y') - 1)->count() + DataSiswaModel::where('status', 4)->where('tahun_lulus', date('Y') - 1)->count() + DataSiswaModel::where('status', 5)->where('tahun_lulus', date('Y') - 1)->count() + DataSiswaModel::where('status', 6)->where('tahun_lulus', date('Y') - 1)->count(),
                'kuliah' => DataSiswaModel::where('status', 2)->where('tahun_lulus', date('Y') - 1)->count() + DataSiswaModel::where('status', 4)->where('tahun_lulus', date('Y') - 1)->count() + DataSiswaModel::where('status', 6)->where('tahun_lulus', date('Y') - 1)->count(),
                'wirausaha' => DataSiswaModel::where('status', 3)->where('tahun_lulus', date('Y') - 1)->count() + DataSiswaModel::where('status', 5)->where('tahun_lulus', date('Y') - 1)->count() + DataSiswaModel::where('status', 6)->where('tahun_lulus', date('Y') - 1)->count(),
                'tidak_bekerja' => DataSiswaModel::where('status', 7)->where('tahun_lulus', date('Y') - 1)->count(),
            ],
            'keterserapan_tahun_3' => [
                'bekerja' => DataSiswaModel::where('status', 1)->where('tahun_lulus', date('Y') - 2)->count() + DataSiswaModel::where('status', 4)->where('tahun_lulus', date('Y') - 2)->count() + DataSiswaModel::where('status', 5)->where('tahun_lulus', date('Y') - 2)->count() + DataSiswaModel::where('status', 6)->where('tahun_lulus', date('Y') - 2)->count(),
                'kuliah' => DataSiswaModel::where('status', 2)->where('tahun_lulus', date('Y') - 2)->count() + DataSiswaModel::where('status', 4)->where('tahun_lulus', date('Y') - 2)->count() + DataSiswaModel::where('status', 6)->where('tahun_lulus', date('Y') - 2)->count(),
                'wirausaha' => DataSiswaModel::where('status', 3)->where('tahun_lulus', date('Y') - 2)->count() + DataSiswaModel::where('status', 5)->where('tahun_lulus', date('Y') - 2)->count() + DataSiswaModel::where('status', 6)->where('tahun_lulus', date('Y') - 2)->count(),
                'tidak_bekerja' => DataSiswaModel::where('status', 7)->where('tahun_lulus', date('Y') - 2)->count(),
            ],
            'keterserapan_tahun_4' => [
                'bekerja' => DataSiswaModel::where('status', 1)->where('tahun_lulus', '<=', date('Y') - 3)->count() + DataSiswaModel::where('status', 4)->where('tahun_lulus', '<=', date('Y') - 3)->count() + DataSiswaModel::where('status', 5)->where('tahun_lulus', '<=', date('Y') - 3)->count() + DataSiswaModel::where('status', 6)->where('tahun_lulus', '<=', date('Y') - 3)->count(),
                'kuliah' => DataSiswaModel::where('status', 2)->where('tahun_lulus', '<=', date('Y') - 3)->count() + DataSiswaModel::where('status', 4)->where('tahun_lulus', '<=', date('Y') - 3)->count() + DataSiswaModel::where('status', 6)->where('tahun_lulus', '<=', date('Y') - 3)->count(),
                'wirausaha' => DataSiswaModel::where('status', 3)->where('tahun_lulus', '<=', date('Y') - 3)->count() + DataSiswaModel::where('status', 5)->where('tahun_lulus', '<=', date('Y') - 3)->count() + DataSiswaModel::where('status', 6)->where('tahun_lulus', '<=', date('Y') - 3)->count(),
                'tidak_bekerja' => DataSiswaModel::where('status', 7)->where('tahun_lulus', '<=', date('Y') - 3)->count(),
            ],
        ];
        return view('informasi.statistik', $data);
    }

    public function testimoni()
    {
        $top = TestimoniModel::with('user')->first()->get();
        $testimoni = TestimoniModel::with('user')->limit(5)->skip(1)->get();
        return view('informasi.testimoni', [
            'top' => $top,
            'testimoni' => $testimoni,
        ]);
    }

    public function angket_siswa()
    {
        $komli = KomliModel::all();
        $jurusan = JurusanModel::all();
        return view('Angket.form-angket', [
            'komli' => $komli,
            'jurusan' => $jurusan,
        ]);
    }
    public function angketKepuasan()
    {
        $data = [
            'data_alumni' => DataSiswaModel::where('tahun_lulus', '<=', date('Y'))->get(),
            'perusahaan' => PerusahaanModel::all()
        ];
        return view('Angket.form-angket-kepuasan', $data);
    }
}
