<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate \ Database \ Eloquent \ SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    use SoftDeletes;
    protected $fillable = [
        'name','telefono', 'email', 'password','mroles_id','msedes_id','descripcion','imagen'
        //'name','telefono', 'email', 'password','msedes_id','mroles_id','descripcion','imagen',
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

    public function mroles(){
        return $this->belongsTo('App\Mrole');
    }

    public function msedes(){
        return $this->belongsTo('App\Msede');
    }
    protected $dates = ['deleted_at'];
}
