<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class jurusan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jurusan')->insert([
            [
                'nama_jurusan' => 'Rekayasa Perangkat Lunak'
            ],
            [
                'nama_jurusan' => 'Tataboga'
            ],
            [
                'nama_jurusan' => 'Agrobisnis ternak ruminansia'
            ],
            [
                'nama_jurusan' => 'Teknik pengelasan'
            ],
            [
                'nama_jurusan' => 'Perhotelan'
            ],
            [
                'nama_jurusan' => 'Geologi Pertambangan'
            ],
        ]);
    }
}
