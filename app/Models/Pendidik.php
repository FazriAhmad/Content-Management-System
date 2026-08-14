<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendidik extends Model
{
    protected $table = 'pendidik';

    protected $fillable = ['nip', 'nama', 'jabatan', 'foto'];
}
