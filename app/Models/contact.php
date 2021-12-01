<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    use HasFactory;
    protected $table="contact";
      protected $fillable=
    [
       'name','phone','email','Maplink','tend_id','web_adress '
    ];
    public function Tender()
    {
        return $this->belongsTo(tenderTable::class);
    }
    /*
       protected $casts = [
        'name' => 'array',
         'phone' => 'array',
          'email' => 'array',
           'physicalAdress' => 'array',
            'Maplink' => 'array',
             'tend_id' => 'array',

    ];
    */
}
