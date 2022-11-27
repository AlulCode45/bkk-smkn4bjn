<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Master Admin',
                'email' => 'master@gmail.com',
                'password' => bcrypt('12345'),
                'role' => 4
            ],
            [
                'name' => 'Operator',
                'email' => 'operator@gmail.com',
                'password' => bcrypt('12345'),
                'role' => 3
            ],
            [
                'name' => 'Perusahaan',
                'email' => 'perusahaan@gmail.com',
                'password' => bcrypt('12345'),
                'role' => 2
            ],
            [
                'name' => 'Siswa',
                'email' => 'siswa@gmail.com',
                'password' => bcrypt('12345'),
                'role' => 1
            ]
        ]);
    }
}
