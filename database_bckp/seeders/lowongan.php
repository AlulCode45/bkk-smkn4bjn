<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class lowongan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lowongan')->insert([
            [
                'id_perusahaan' => 1,
                'id_jurusan' => 4,
                'judul' => 'Lowongan Kerja Las',
                'deskripsi' => 'Lowongan Kerja',
                'gaji' => '1000000',
                'lokasi' => 'Bandung',
                'penempatan' => 'Bandung',
                'tanggal' => '2021-11-09',
                'status' => true,
            ],
            [
                'id_perusahaan' => 1,
                'id_jurusan' => 2,
                'judul' => 'Lowongan Kerja Restoran',
                'deskripsi' => 'Lowongan Kerja',
                'gaji' => '1000000',
                'lokasi' => 'Bojonegoro',
                'penempatan' => 'Bojonegoro',
                'tanggal' => '2021-11-09',
                'status' => true,
            ],
            [
                'id_perusahaan' => 1,
                'id_jurusan' => 5,
                'judul' => 'Lowongan Kerja Karyawan Hotel',
                'deskripsi' => 'Lowongan Kerja Hotel',
                'gaji' => '1000000',
                'lokasi' => 'Bojonegoro',
                'penempatan' => 'Bojonegoro',
                'tanggal' => '2021-11-09',
                'status' => true,
            ],
            [
                'id_perusahaan' => 1,
                'id_jurusan' => 1,
                'judul' => 'Lowongan Programmer',
                'deskripsi' => 'Lowongan Kerja Fullstack Developer',
                'gaji' => '1000000',
                'lokasi' => 'Bojonegoro',
                'penempatan' => 'Bojonegoro',
                'tanggal' => '2021-11-09',
                'status' => true,
            ],
        ]);
    }
}
