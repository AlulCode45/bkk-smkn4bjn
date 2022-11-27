<?php

namespace App\Http\Controllers;

use App\Models\DataSiswaModel;
use App\Models\KepuasanPelangganModel;
use Illuminate\Http\Request;

class AngketController extends Controller
{
    public function saveAngket(Request $request)
    {
        $request->validate([
            'jurusan' => ['required', 'not_regex:/#/'],
            'id_user' => ['required', 'not_regex:/#/'],
            'kelas' => ['required', 'not_regex:/#/'],
        ], [
            'jurusan.not_regex' => 'Silahkan pilih jurusan terlebih dahulu',
            'kelas.not_regex' => 'Silahkan pilih kelas terlebih dahulu',
            'id_user.not_regex' => 'Silahkan pilih nama Anda terlebih dahulu',
        ]);

        $siswa = DataSiswaModel::where('id', $request->id_user);

        $msg = '';
        $kerja = '';
        $kuliah = '';
        $usaha = '';
        $status = 0;

        if ($request['usaha'] == true) {
            $usaha = 'USAHA ' . $request['nama_usaha'];
            $msg = $usaha;
            $status = 3;
        }

        if ($request['bekerja'] == true) {
            $kerja = 'BEKERJA DI ' . $request['nama_kantor'];
            $msg = $kerja;
            $status = 1;
        }


        if ($request['kuliah'] == true) {
            $kuliah = 'KULIAH DI ' . $request['nama_univ'];
            $msg = $kuliah;
            $status = 2;
        }




        if ($request['bekerja'] == true && $request['kuliah'] == 1) {
            $msg = $kerja . ', ' . $kuliah;
            $status = 4;
        }

        if ($request['bekerja'] == true && $request['usaha'] == 1) {
            $msg = $kerja . ', ' . $usaha;
            $status = 5;
        }

        if ($request['bekerja'] == true && $request['kuliah'] == true && $request['usaha'] == true) {
            $msg = $kerja . ', ' . $kuliah . ', ' . $usaha;
            $status = 6;
        }

        if ($request['nothing'] == true) {
            $status = 0;
        }

        $data = [
            'status' => $status,
            'keterangan_status' => $msg,
        ];
        $siswa->update($data);
        return view('Angket.success');
    }

    public function saveAngketKepuasan(Request $request)
    {
        $survey = [
            [
                'id_survey' => 1,
                'status_kepuasan' => $request->pelayanan,
                'id_user' => $request->id_user,
            ],
            [
                'id_survey' => 2,
                'status_kepuasan' => $request->pelayanan2,
                'id_user' => $request->id_user,
            ],
            [
                'id_survey' => 3,
                'status_kepuasan' => $request->pelayanan3,
                'id_user' => $request->id_user,
            ],
            [
                'id_survey' => 4,
                'status_kepuasan' => $request->pelayanan4,
                'id_user' => $request->id_user,
            ],
            [
                'id_survey' => 5,
                'status_kepuasan' => $request->pelayanan5,
                'id_user' => $request->id_user,
            ],
            [
                'id_survey' => 6,
                'status_kepuasan' => $request->pelayanan6,
                'id_user' => $request->id_user,
            ],
            [
                'id_survey' => 7,
                'status_kepuasan' => $request->pelayanan7,
                'id_user' => $request->id_user,
            ],
            [
                'id_survey' => 8,
                'status_kepuasan' => $request->pelayanan8,
                'id_user' => $request->id_user,
            ],
            [
                'id_survey' => 9,
                'status_kepuasan' => $request->pelayanan9,
                'id_user' => $request->id_user,
            ],
            [
                'id_survey' => 10,
                'status_kepuasan' => $request->pelayanan10,
                'id_user' => $request->id_user,
            ],
        ];

        if (KepuasanPelangganModel::insert($survey)) {
            return view('Angket.success');
        } else {
            return view('Angket.failed');
        }
    }
}
