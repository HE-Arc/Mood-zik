<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    protected $table = "playlists";

    public $timestamps = false;

    public function posts()
    {
      return $this->belongsToMany('App\Post');
    }
}
