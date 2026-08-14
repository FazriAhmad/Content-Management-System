<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JurusanGambar extends Model
{
    protected $table = 'jurusan_gambar';

    protected $fillable = ['jurusan_id', 'gambar'];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
}
