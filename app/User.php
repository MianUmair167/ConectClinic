<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function userType() {
        return $this->belongsTo('App\Models\UserType');
    }



    public function isAdmin(){
        if($this->userType){
            if($this->userType->name=="Admin"){

                return true;

            }

            else{
                return false;
            }

        }

        return false;



    }
}
