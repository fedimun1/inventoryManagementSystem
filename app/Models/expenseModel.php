<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class expenseModel extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table="expense";
    protected $fillable=
    [
        'lbourName','paymentReason','paymentType','expenseAmount','paidDate','labourCount','payer'
    ];
}
