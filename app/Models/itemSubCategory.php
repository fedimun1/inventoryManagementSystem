<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class itemSubCategory extends Model
{
    use HasFactory;
          protected $table="itemSubCategory";
      protected $fillable=
    [
      'itemSubCatName','itemCatID'
    ];
}
