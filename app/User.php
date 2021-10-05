<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    //public $timestamps = true;



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','password','last_name','user_type','gender','email','email_verified_at','region_id','country','is_viewed','img','phone_number','viber','whatsapp','block_user_type','block_user_id','create_date',
        //'last_name','gender','email','email_verified_at','region','country','is_viewed','img','phone_number','viber','whatsapp','block_user_type','block_user_id','remember_token','create_date',
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

    public function isAdmin() {
        return $this->user_type === 1; // admin
     }

     public function isUser() {
        return $this->user_type === null;// user
     }
}
