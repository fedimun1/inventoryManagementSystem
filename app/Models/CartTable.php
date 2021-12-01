<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartTable extends Model
{
    use HasFactory;
    protected $table="cart_table";
     protected $fillable=
    [
        'status',
        'Assign_to',
        'Request_By',
        'tend_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'id','Request_By');
    }
}
