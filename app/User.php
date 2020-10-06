<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Blogpost;
use App\Comment;
use App\Role;
use App\ApiKey;


class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id', 'role_name', 'banned_until'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dates = ['banned_until'];

    public function blogpost()
    {
        return $this->hasMany('App\Blogpost');
    }

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function token(){

        return $this->hasOne('App\ApiKey');
    }

    // public function generateToken()
    // {
    //     $this->api_token = str_random(60);
    //     $this->save();

    //     return $this->api_token;
    // }
}
