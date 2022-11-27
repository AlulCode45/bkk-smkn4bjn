<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JurusanLowonganModel extends Model
{
    use HasFactory;
    protected $table = 'lowongan_jurusan';
    protected $guarded = ['id'];
    public $timestamps = false;
}
