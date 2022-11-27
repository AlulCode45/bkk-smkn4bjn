<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MottoModel extends Model
{
    use HasFactory;
    protected $table = 'motto';
    protected $guarded = ['id'];
    public $timestamps = false;
}
