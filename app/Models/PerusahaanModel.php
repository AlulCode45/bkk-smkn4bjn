<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerusahaanModel extends Model
{
    use HasFactory;
    protected $table = 'data_perusahaan';
    protected $guarded = ['id'];

    public function scopeFilter($query, $filter)
    {
        $query->when($filter['search'] ?? false, fn ($query, $search) => ($query->where(
            fn ($query) => ($query->where('data_perusahaan.nama', 'LIKE', "%$search%")
                ->orWhere('data_perusahaan.kode', 'LIKE', "%$search%")
                ->orWhere('data_perusahaan.no_telp', 'LIKE', "%$search%")
            )
        )));


        $query->when($filter['mou'] ?? false, function ($query, $chk) {
            $query->where('data_perusahaan.mou', $chk);
        });


        $query->when($filter['umkm'] ?? false, function ($query, $chk) {
            $query->where('data_perusahaan.umkm', $chk);
        });

        return;
    }
}
