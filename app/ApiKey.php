<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class ApiKey extends Model
{
    //
    protected $primaryKey = 'id';

    public function user(){

    	return $this->belongsTo('App\User', 'user_id');
    }
}
