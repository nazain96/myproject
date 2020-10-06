<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Blogpost;
use App\User;

class Comment extends Model
{
    //
    public function blogpost()
    {
        return $this->belongsTo('App\Blogpost');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
