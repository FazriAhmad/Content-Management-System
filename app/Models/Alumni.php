<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    protected $table = 'alumni';

    protected $fillable = ['nama', 'tahun_lulus', 'jurusan_id', 'pekerjaan', 'perusahaan', 'kota', 'lat', 'lng'];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
}
