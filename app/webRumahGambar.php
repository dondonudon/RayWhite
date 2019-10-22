<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class webRumahGambar extends Model
{
    protected $table = 'web_rumah_gambar';
    protected $fillable = ['id_rumah','gambar'];
}
