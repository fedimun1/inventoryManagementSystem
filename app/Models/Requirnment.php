<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requirnment extends Model
{
    use HasFactory;
      protected $table="requirnment";
    protected $fillable = [
       'ReqNmae',
       'ReqReference'
   ];
}
