<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tenderTable extends Model
{
    use HasFactory;
    protected $table="tender_tables";
      protected $fillable=
    [
       'id','TendId','tend_name','org_name','bid_num','type','rel_date','end_date','summery','Opp_Status','area_work','reg_by','site_Url','Sub_Mat_Ex_Status','Tend_mang_Status','Tend_Check_Status','web_adress','Inpersen_id','mail_id','email_adress_submission','Url_adress'
    ];
      public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function contact()
    {
        return $this->hasMany(contact::class);
    }
      public function imageSS()
    {
        return $this->hasOne(image::class,'tend_id','id');
    }
     public function areaofWork()
    {
        return $this->belongsTo(areaofWork::class,'area_work','id');
    }
}
