<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomliModel extends Model
{
    use HasFactory;
    protected $table = 'komli';
    protected $guarded = ['id'];
    public $timestamps = false;
}
