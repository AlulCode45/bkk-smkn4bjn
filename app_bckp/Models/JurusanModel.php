<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JurusanModel extends Model
{
    use HasFactory;
    protected $table = 'jurusan';
    protected $guarded = ['id'];
    public $timestamps = false;

    public static function hitungJumlahSiswa($id_jurusan, $tahun_lulus)
    {
        $komli = KomliModel::where('id_jurusan', $id_jurusan)->get();
        $jumlah_siswa = 0;
        foreach ($komli as $d) {
            $jumlah_siswa += DataSiswaModel::where('id_komli', $d->id)->where('tahun_lulus', $tahun_lulus)->count();
        }
        return $jumlah_siswa;
    }
    public static function hitungJumlahSiswaKerja($id_jurusan, $tahun_lulus)
    {
        $komli = KomliModel::where('id_jurusan', $id_jurusan)->get();
        $jumlah_siswa = 0;
        foreach ($komli as $d) {
            $jumlah_siswa += DataSiswaModel::where('id_komli', $d->id)->where('status', 1)->where('tahun_lulus', $tahun_lulus)->count();
        }
        return $jumlah_siswa;
    }
    public static function hitungJumlahSiswaKuliah($id_jurusan, $tahun_lulus)
    {
        $komli = KomliModel::where('id_jurusan', $id_jurusan)->get();
        $jumlah_siswa = 0;
        foreach ($komli as $d) {
            $jumlah_siswa += DataSiswaModel::where('id_komli', $d->id)->where('status', 2)->where('tahun_lulus', $tahun_lulus)->count();
        }
        return $jumlah_siswa;
    }
    public static function hitungJumlahSiswaUsaha($id_jurusan, $tahun_lulus)
    {
        $komli = KomliModel::where('id_jurusan', $id_jurusan)->get();
        $jumlah_siswa = 0;
        foreach ($komli as $d) {
            $jumlah_siswa += DataSiswaModel::where('id_komli', $d->id)->where('status', 3)->where('tahun_lulus', $tahun_lulus)->count();
        }
        return $jumlah_siswa;
    }
    public static function hitungJumlahSiswaKerjaKuliah($id_jurusan, $tahun_lulus)
    {
        $komli = KomliModel::where('id_jurusan', $id_jurusan)->get();
        $jumlah_siswa = 0;
        foreach ($komli as $d) {
            $jumlah_siswa += DataSiswaModel::where('id_komli', $d->id)->where('status', 4)->where('tahun_lulus', $tahun_lulus)->count();
        }
        return $jumlah_siswa;
    }
    public static function hitungJumlahSiswaKerjaUsaha($id_jurusan, $tahun_lulus)
    {
        $komli = KomliModel::where('id_jurusan', $id_jurusan)->get();
        $jumlah_siswa = 0;
        foreach ($komli as $d) {
            $jumlah_siswa += DataSiswaModel::where('id_komli', $d->id)->where('status', 5)->where('tahun_lulus', $tahun_lulus)->count();
        }
        return $jumlah_siswa;
    }
    public static function hitungJumlahSiswaKerjaKuliahUsaha($id_jurusan, $tahun_lulus)
    {
        $komli = KomliModel::where('id_jurusan', $id_jurusan)->get();
        $jumlah_siswa = 0;
        foreach ($komli as $d) {
            $jumlah_siswa += DataSiswaModel::where('id_komli', $d->id)->where('status', 6)->where('tahun_lulus', $tahun_lulus)->count();
        }
        return $jumlah_siswa;
    }
}
