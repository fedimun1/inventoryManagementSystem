<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class areaofWork extends Model
{
    use HasFactory;
      protected $table="areaofwork";
    protected $fillable = [
    	'id',
       'areaName'
    ];
     public function Tender()
    {
        return $this->hasMany(tenderTable::class);
    }
}
