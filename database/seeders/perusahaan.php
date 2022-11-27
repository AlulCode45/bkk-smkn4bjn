<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class perusahaan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('perusahaan_data')->insert([
            [
                'nama' => 'PT. Karya Mitra Mandiri',
                'kode' => 'HMA-121-201',
                'alamat' => 'Jl. Raya Cikarang Barat No. 1',
                'kota' => 'Cikarang',
                'email' => 'perusahaan1@gmail.com',
                'no_telp' => '021-12345678',
                'tahun_gabung' => '2021',
                'standar' => 'ISO 9001:2015',
                'mou' => '1',
                'mou_file' => 'mou1.pdf',
                'umkm' => '1',
            ],
            [
                'nama' => 'PT. Citra Cahya Sejati',
                'kode' => 'HM-10291-21',
                'alamat' => 'Jl. Raya Surabaya Barat No. 1',
                'kota' => 'Surabaya',
                'email' => 'perusahaan2@gmail.com',
                'no_telp' => '021-12345678',
                'tahun_gabung' => '2021',
                'standar' => 'ISO 9001:2015',
                'mou' => '1',
                'mou_file' => 'mou2.pdf',
                'umkm' => '1',
            ],
            [
                'nama' => 'Syaida Hotel And Resto',
                'kode' => 'HM-1982-12',
                'alamat' => 'Jl. Raya Bojonegoro Barat No. 1',
                'kota' => 'Bojonegoro',
                'email' => 'perusahaan3@gmail.com',
                'no_telp' => '021-12345678',
                'tahun_gabung' => '2021',
                'standar' => 'ISO 9001:2015',
                'mou' => '1',
                'mou_file' => 'mou3.pdf',
                'umkm' => '1',
            ],
            [
                'nama' => 'Freya Psikolog Corp',
                'kode' => 'HM-1122-12',
                'alamat' => 'Jl. Raya Jakarta Barat No. 1',
                'kota' => 'Jakarta',
                'email' => 'perusahaan4@gmail.com',
                'no_telp' => '021-12345678',
                'tahun_gabung' => '2021',
                'standar' => 'ISO 9001:2015',
                'mou' => '1',
                'mou_file' => 'mou4.pdf',
                'umkm' => '1',
            ]
        ]);
    }
}
