<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reques_form extends Model
{
    use HasFactory;
        protected $table="request";
     protected $fillable=
    [
        'requested_By',
        'Req_type',
        'Req_name',
        'Req_value',
        'Req_summery',
        'Req_Status',
        'AssigTo',
    ];
}
