<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelamarModel extends Model
{
    use HasFactory;
    protected $table = 'pelamar_kerja';
    protected $guarded = ['id'];
}
