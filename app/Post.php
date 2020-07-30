<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Notifications\BrNotification;

class Post extends Model
{
        protected $fillable = [
      'title', 'des','category', 'user_id',
  ];

    public function user()
    {
      return $this->belongsTo(User::class);
    }
    public function comments()
    {
      return $this->morphMany('App\Comment', 'commentable');
    }

    
}
