<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'username', 'email', 'password',
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

    public function userable(){
        return $this->morphTo();
    }

    public function roles(){
        return $this->belongsToMany('App\Role');
    }

    public function courses(){
        return $this->belongsToMany('App\Course')
        ->using('App\CourseUser');
    }

    public function hasRole($role){
        $count = $this->roles()->where('name', $role)->count();
        if($count==1){
            return true;
        }
        return false;
    }
}
