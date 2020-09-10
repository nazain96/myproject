<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blogpost extends Model
{
    //
    protected $primaryKey = 'p_id';

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
