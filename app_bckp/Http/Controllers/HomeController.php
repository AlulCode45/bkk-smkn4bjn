<?php

namespace App\Http\Controllers;

use App\Models\MisiModel;
use App\Models\MottoModel;
use App\Models\ProgramKerjaModel;
use App\Models\SambutanKepsekModel;
use App\Models\StrukturModel;
use App\Models\VisiModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'kepsek' => SambutanKepsekModel::orderBy('id', 'desc')->first(),
        ];
        return view('index', $data);
    }
    public function visiMisi()
    {
        $data = [
            'visi' => VisiModel::orderBy('id', 'DESC')->first()->visi,
            'misi' => MisiModel::orderBy('id', 'DESC')->first()->misi
        ];
        return view('profil/visimisi', $data);
    }
    public function programKerja()
    {
        $data = [
            'program' => ProgramKerjaModel::orderBy('id', 'DESC')->first()->programkerja
        ];
        return view('profil/programkerja', $data);
    }
    public function motto()
    {
        $data = [
            'motto' => MottoModel::orderBy('id', 'DESC')->first()->motto
        ];
        return view('profil.motto', $data);
    }
    public function strukturOrganisasi()
    {
        $data = [
            'struktur' => StrukturModel::orderBy('id', 'DESC')->first()->struktur_photo
        ];
        return view('profil.struktur_organisasi', $data);
    }
    public function rekapitulasi()
    {
        return view('rekapitulasi.index');
    }
}
