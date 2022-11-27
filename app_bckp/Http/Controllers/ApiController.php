<?php

namespace App\Http\Controllers;

use App\Models\TempModel;
use App\Models\JurusanModel;
use Illuminate\Http\Request;
use App\Models\LowonganModel;
use App\Models\DataSiswaModel;
use App\Models\PerusahaanModel;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function getRekapitulasi()
    {
        $lowongan = LowonganModel::count();
        $perusahaanTotal = PerusahaanModel::count();
        $companywithmou = PerusahaanModel::where('mou', true)->count();
        $companywithumkm = PerusahaanModel::where('umkm', true)->count();
        $companywithboth = PerusahaanModel::where('umkm', true)->where('mou', true)->count();
        $siswa = DataSiswaModel::count();
        $jurusan = JurusanModel::count();
        return response()->json([
            'success' => true,
            'lowongan' => $lowongan,
            'count' => $jurusan,
            'total_perusahaan' => $perusahaanTotal,
            'mou_perusahaan' => $companywithmou,
            'peserta_didik' => $siswa,
            'umkm_perusahaan' => $companywithumkm,
            'both_perusahaan' => $companywithboth,
        ]);
    }

    public function insert()
    {
        $data = json_decode(file_get_contents(public_path('data_siswa.json')));
        foreach ($data as $key => $json) {
            if ($json->__EMPTY_5 == 'Januari') {
                $json->__EMPTY_5 = 1;
            }

            if ($json->__EMPTY_5 == 'Pebruari') {
                $json->__EMPTY_5 = 2;
            }

            if ($json->__EMPTY_5 == 'Maret') {
                $json->__EMPTY_5 = 3;
            }

            if ($json->__EMPTY_5 == 'April') {
                $json->__EMPTY_5 = 4;
            }

            if ($json->__EMPTY_5 == 'Mei') {
                $json->__EMPTY_5 = 5;
            }

            if ($json->__EMPTY_5 == 'Juni') {
                $json->__EMPTY_5 = 6;
            }

            if ($json->__EMPTY_5 == 'Juli') {
                $json->__EMPTY_5 = 7;
            }

            if ($json->__EMPTY_5 == 'Agustus') {
                $json->__EMPTY_5 = 8;
            }

            if ($json->__EMPTY_5 == 'September') {
                $json->__EMPTY_5 = 9;
            }

            if ($json->__EMPTY_5 == 'Oktober') {
                $json->__EMPTY_5 = 10;
            }

            if ($json->__EMPTY_5 == 'Nopember') {
                $json->__EMPTY_5 = 11;
            }

            if ($json->__EMPTY_5 == 'Desember') {
                $json->__EMPTY_5 = 12;
            }

            if ($json->KOMLI == 'RPL 1') {
                $json->KOMLI = 1;
            }
            if ($json->KOMLI == 'RPL 2') {
                $json->KOMLI = 2;
            }
            if ($json->KOMLI == 'RPL 3') {
                $json->KOMLI = 3;
            }
            if ($json->KOMLI == 'RPL 4') {
                $json->KOMLI = 4;
            }
            if ($json->KOMLI == 'PH 1') {
                $json->KOMLI = 5;
            }
            if ($json->KOMLI == 'PH 2') {
                $json->KOMLI = 6;
            }
            if ($json->KOMLI == 'TB 1') {
                $json->KOMLI = 7;
            }
            if ($json->KOMLI == 'TB 2') {
                $json->KOMLI = 8;
            }
            if ($json->KOMLI == 'TP 1') {
                $json->KOMLI = 9;
            }
            if ($json->KOMLI == 'TP 2') {
                $json->KOMLI = 10;
            }
            if ($json->KOMLI == 'GP 1') {
                $json->KOMLI = 11;
            }
            if ($json->KOMLI == 'GP 2') {
                $json->KOMLI = 12;
            }
            if ($json->KOMLI == 'ATR 1') {
                $json->KOMLI = 13;
            }
            if ($json->KOMLI == 'ATR 2') {
                $json->KOMLI = 14;
            }
            // $password = bcrypt(date_format(date_create($json->__EMPTY_6 . '-' .$json->__EMPTY_5 . '-' . $json->__EMPTY_4), 'Ymd'));
            // DB::raw("SELECT `insert_user_siswa`( '$json->NAMA_SISWA','$json->NISN" . "@gmail.com'". ", '$password');", [1]);
            DB::selectOne('SELECT `insert_user_siswa`( ?, ?, ?);', [$json->NAMA_SISWA, "$json->NISN@gmail.com", bcrypt($json->NISN)]);
            $user = DB::table('users')->orderBy('id', 'DESC')->first(['id']);
            $siswa = [
                'nama_siswa' => $json->NAMA_SISWA,
                'tanggal_lahir' => date_create($json->__EMPTY_6 . '/' . $json->__EMPTY_5 . '/' . $json->__EMPTY_4) == null ? date_create($json->__EMPTY_6 . '/' . $json->__EMPTY_5 . '/' . $json->__EMPTY_4) : date_create("2002/02/02"),
                'nisn' => $json->NISN,
                'tempat_lahir' => $json->TEMPAT,
                'kelamin' => $json->jk,
                'alamat' => $json->__EMPTY_10 . ', RT/RW ' . $json->__EMPTY_11 . '/' . $json->__EMPTY_12,
                'kecamatan' => $json->__EMPTY_15,
                'kabupaten' => $json->__EMPTY_16,
                'tahun_masuk' => 2022,
                'tahun_lulus' => 2025,
                'no_telp' => $json->__EMPTY_14,
                'id_komli' => $json->KOMLI,
                'no_induk' => $json->NO_INDUK,
                'id_user' => $user->id,
            ];
            DataSiswaModel::insert($siswa);
        }
        dd("Sukses bro!!");
    }

    public function insertCompany()
    {
        $data = json_decode(file_get_contents(public_path('data_company.json')));


        foreach ($data as $key => $json) {
            DB::selectOne('SELECT `insert_user_siswa`( ?, ?, ?);', [$json->NAMA_PERUSAHAAN, $json->EMAIL, bcrypt('123456')]);
            $user = DB::table('users')->where('role', 2)->orderBy('id', 'DESC')->first(['id']);
            $company = [
                'id_user' => $user->id,
                'nama' => $json->NAMA_PERUSAHAAN,
                'alamat' => $json->ALAMAT,
                'kota' => $json->KOTA,
                'no_telp' => $json->TELP,
                'tahun_gabung' => $json->TAHUN_GABUNG,
                'email' => $json->EMAIL,
            ];
            PerusahaanModel::insert($company);
        }
        dd('sukses bro!!!');
    }
}
