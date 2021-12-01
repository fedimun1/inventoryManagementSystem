<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailOrder extends Model
{
    use HasFactory;
    protected $table="DetailOrder";
      protected $fillable=
    [
       'quantity','unitPrice','amount','discount','itemID','tranID'
    ];

}
