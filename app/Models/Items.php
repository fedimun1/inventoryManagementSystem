<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    use HasFactory;
       protected $table="items";
      protected $fillable=
    [
      'itemCode','itemName','brandID','ManufactureID','categoryID','ReciptType','amountOnRect','itemInStore',
      'itemInshop','itemBuyPrice','itemSellPrice','itemDescription','reg_by','actualValue'

    ];
}
