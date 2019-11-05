<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class webKontentVideo extends Model
{
    protected $table = 'web_konten_videos';
    protected $fillable = ['judul','url','status','username'];
}
