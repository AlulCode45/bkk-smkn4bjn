<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KepuasanPelangganModel extends Model
{
    use HasFactory;
    protected $table = 'kepuasan_pelanggan';
    protected $guarded = ['id'];
    public $timestamps = false;
}
