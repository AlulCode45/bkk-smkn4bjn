<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MisiModel extends Model
{
    use HasFactory;
    protected $table = 'misi';
    protected $guarded = ['id'];
    public $timestamps = false;
}
