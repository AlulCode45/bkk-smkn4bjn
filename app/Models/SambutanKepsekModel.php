<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SambutanKepsekModel extends Model
{
    use HasFactory;
    protected $table = 'sambutankepalasekolah';
    protected $fillable = [
        'nama',
        'foto',
        'sambutan',
    ];
    public $timestamps = false;
}
