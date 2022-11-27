<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPerusahaanModel extends Model
{
    use HasFactory;
    protected $table = 'data_perusahaan';
    protected $guarded = ['id'];
}
