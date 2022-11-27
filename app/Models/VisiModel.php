<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisiModel extends Model
{
    use HasFactory;
    protected $table = 'visi';
    protected $guarded = ['id'];
    public $timestamps = false;
}
