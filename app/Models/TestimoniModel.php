<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestimoniModel extends Model
{
    use HasFactory;
    protected $table = 'testimoni';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
