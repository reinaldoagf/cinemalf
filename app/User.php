<?php

namespace Cinema;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable,SoftDeletes;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table= "users";
    protected $fillable = [
        'name', 'email', 'password','typeofuser'
    ];
   
    protected $dates = ['deleted_at'];
   
    public function setPasswordAttribute($value)
       {    
            if(!empty($value)){
                $this->attributes['password'] = \Hash::make($value);
            }
       } 
}
