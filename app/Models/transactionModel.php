<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transactionModel extends Model
{
    use HasFactory;
        protected $table="totalTrans";
     protected $fillable=
    [
       'refNumber','paidAmount','PaymentMethod','doneBy','Totaldiscount','vatAmount','transDate','custId',
    ];
}
