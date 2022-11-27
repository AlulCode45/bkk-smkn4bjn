<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StrukturModel extends Model
{
    use HasFactory;
    protected $table = 'struktur_bkk';
    protected $guarded = ['id'];
    public $timestamps = false;
}
