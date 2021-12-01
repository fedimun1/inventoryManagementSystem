<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenderRequirnmentList extends Model
{
    use HasFactory;
      protected $table="tender_requirnment_list";
      protected $fillable=
    [
       'ted_id','req_id'
    ];
}
