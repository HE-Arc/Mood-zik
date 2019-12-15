<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;
use App\User;

class Playlist extends Model
{
    protected $table = "playlists";

    protected $fillable = [
      'name', 'user_id',
    ];

    public $timestamps = false;

    public function posts()
    {
      return $this->belongsToMany('App\Post');
    }

    public function users()
    {
      return $this->belongsToMany('App\User');
    }
}
