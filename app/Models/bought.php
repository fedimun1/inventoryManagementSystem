<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bought extends Model
{
    use HasFactory;
      protected $table="bought";
      protected $fillable=
    [
      'BoughtType','cashAmount','checkType','LenderNme','ItemId'
    ];
}
