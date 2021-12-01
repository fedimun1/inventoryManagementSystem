<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   // protected $primaryKey = 'UserId';
    protected $table="users";
    protected $fillable = [
       'UserId',
        'name',
        'email',
        'role',
        'password',
    ];
    public function tenders(){
        return $this->hasMany(tenderregisters::class);
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
     public function Tender()
    {
        return $this->hasMany(tenderTable::class);
    }
       public function cartTable()
     {
        return $this->hasMany(CartTable::class,'Request_By','id');
     }

}
