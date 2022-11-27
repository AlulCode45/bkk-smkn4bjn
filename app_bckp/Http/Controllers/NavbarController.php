<?php

namespace App\Http\Controllers;

use App\Models\DataSiswaModel;
use App\Models\GalleryModel;
use App\Models\JurusanLowonganModel;
use App\Models\JurusanModel;
use App\Models\KomliModel;
use App\Models\LowonganModel;
use App\Models\NewsModel;
use App\Models\PerusahaanModel;
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
        // tahun pertama
        $tahun_1 = $tahun_ini - 1;
        // tahun kedua
        $tahun_2 = $tahun_ini - 2;
        // tahun ketiga
        $tahun_3 = $tahun_ini - 3;

        $data = [
            'data_alumni' => DataSiswaModel::join('komli', 'komli.id', '=', 'data_siswa.id_komli')
                ->join('jurusan', 'jurusan.id', '=', 'komli.id_jurusan')
                ->select('jurusan.nama_jurusan', 'data_siswa.*')
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
        $berita = NewsModel::paginate(6);
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
}
