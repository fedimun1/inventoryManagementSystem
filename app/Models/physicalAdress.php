<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class physicalAdress extends Model
{
    use HasFactory;
     protected $table="PhysicalAdress";
    protected $fillable = [
       'country','Region','Zone','woreda','Kebele','StretNumber','BuildingNmae','OfficeNo','Floor','landMark','AreaName','ZipCode','PoBox'
   ];
}
