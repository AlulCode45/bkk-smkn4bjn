<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class keterserapan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = file_get_contents('http://localhost:8000/data.json');
        // $data = json_decode($data);
        $json = json_decode($data);
        $save = [];
        foreach ($json as $row) {
            $status = ($row->{'SETELAH LULUS SMK SAYA'} == 'BEKERJA' ? 1 : ($row->{'SETELAH LULUS SMK SAYA'} == 'MELANJUTKAN KE PERGURUAN TINGGI' ? 2 : (isset($row->{'Jika bekerja, Tuliskan Nama Tempat anda bekerja!'}) and $row->{'SETELAH LULUS SMK SAYA'} == 'MELANJUTKAN KE PERGURUAN TINGGI' ? 4 : 1)));

            $status = 1;
            if($row->{'SETELAH LULUS SMK SAYA'} == 'BEKERJA'){
                $status = 1;
            }
            elseif($row->{'SETELAH LULUS SMK SAYA'} == 'MELANJUTKAN KE PERGURUAN TINGGI'){
                $status = 2;
            }elseif (isset($row->{'Jika bekerja, Tuliskan Nama Tempat anda bekerja!'})) {
                
            }

            print_r($status);
            // if ($row->{'SETELAH LULUS SMK SAYA '} == 'BEKERJA') {
            //     $status = 1;
            //     if (isset($row->{'Jika bekerja, Tuliskan Nama Tempat anda bekerja!'})) {
            //         $tempat_kerja = $row->{'Jika bekerja, Tuliskan Nama Tempat anda bekerja!'};
            //     }else{
            //         $tempat_kerja = null;
            //     }
            // }else
            // $d = [
            //     'tahun_lulus' => $row->{'TAHUN LULUS'},
            //     'status' => $row->{'SETELAH LULUS SMK SAYA '} == 'BEKERJA' ? 1 : ($row->{'SETELAH LULUS SMK SAYA '} == 'MELANJUTKAN KE PERGURUAN TINGGI' ? 2 : ''),
            //     'status_keterangan' => 
            // ];

            // print_r($tempat_kerja);
        }
    }
}
