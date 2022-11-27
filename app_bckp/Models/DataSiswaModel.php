<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSiswaModel extends Model
{
    use HasFactory;
    protected $table = 'data_siswa';
    protected $guarded = ['id'];
    public $timestamps = false;
}
