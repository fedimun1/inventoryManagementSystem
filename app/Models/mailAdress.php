<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mailAdress extends Model
{
    use HasFactory;
     protected $table="mail_adresses";
    protected $fillable = [
       'FirstName','LastName','BuisnessName','StressAdress','City','ZipCode','Country','Pobox'
   ];
}
