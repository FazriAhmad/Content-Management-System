<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table = 'jurusan';

    protected $fillable = ['nama', 'singkatan', 'deskripsi', 'gambar_sampul'];

    public function gambar()
    {
        return $this->hasMany(JurusanGambar::class);
    }
}
