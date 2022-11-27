<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PerusahaanModel;
use Illuminate\Support\Facades\DB;
use App\Models\JurusanModel;

class LowonganModel extends Model
{
    use HasFactory;
    protected $table = 'lowongan';
    protected $guarded = ['id'];

    public function jurusan()
    {
        return $this->belongsToMany(JurusanModel::class, 'lowongan_jurusan', 'id_lowongan', 'id_jurusan', 'id_lowongan', 'id');
    }

    public function scopeJoinA($query)
    {
        return $query->join('data_perusahaan', 'data_perusahaan.id', '=', 'lowongan.id_perusahaan')
            // ->leftJoin('data_perusahaan', 'data_perusahaan.id_user', '=', 'users.id')
            ->leftJoin('lowongan_jurusan', 'lowongan_jurusan.id_lowongan', '=', 'lowongan.id')
            ->leftJoin('jurusan', 'jurusan.id', '=', 'lowongan_jurusan.id_jurusan')
            ->select('data_perusahaan.id as id_perusahaan', 'data_perusahaan.nama', 'data_perusahaan.alamat', 'data_perusahaan.email', 'data_perusahaan.no_telp', 'data_perusahaan.id_user', 'lowongan.id as id_lowongan', 'lowongan.judul', 'lowongan.tanggal',  'lowongan.gaji', 'lowongan.deskripsi', 'lowongan.status', 'lowongan_jurusan.id_jurusan', 'jurusan.id', 'jurusan.nama_jurusan')
            ->where(function ($query) {
                $query->where(DB::raw('lowongan_jurusan.id'))
                    ->orWhere(DB::raw('NOT lowongan_jurusan.id'));
            });
    }


    public function scopeFilter($query, $filter)
    {
        $query->when($filter['filterchk'] ?? false, function ($query, $chk) {
            $query->whereIn('jurusan.id', $chk);
        });

        $query->when($filter['search'] ?? false, function ($query, $search) {
            $query->where(fn ($data) => ($data->where('data_perusahaan.nama', 'LIKE', "%$search%")
                ->orWhere('lowongan.judul', 'LIKE', "%$search%")
            ));
        });

        $query->groupBy('lowongan.id')
            ->groupBy('lowongan_jurusan.id_lowongan');

        return;
    }
}
