<?php

namespace App\Http\Controllers;
use App\Models\tenderTable;
use App\Models\User;
use App\Models\contact;
use App\Models\image;
use App\Models\areaofWork;
use App\Models\portfolio;
use App\Models\department;
use App\Models\Requirnment;
use App\Models\TenderRequirnmentList;
use App\Models\physicalAdress;
use App\Models\mailAdress;
use App\Models\reques_form;
use App\Models\CartTable;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Mail;
use App\Mail\projectCreated;

//use Nexmo\Laravel\Facades\Nexmo;


use DB;
use Response;


use Illuminate\Http\Request;
use Auth;

class tender extends Controller
{
  protected  $tenderTable;
  protected  $contact;
  protected  $image;
  protected $physicalAdress;
    public function __construct()
  {
    $this->tenderTable=new tenderTable();
    $this->contact=new contact();
    $this->image=new image();
    $this->physicalAdress=new physicalAdress();

  }
  public function getScreeaning()
  {
     $portfolioList=portfolio::all();
      $workArea=areaofwork::all();
     //dd( $portfolioList);
       return view('posts.Screan',compact('portfolioList','workArea'));
  }

     public function screaning(Request $req)
    {
    $Service= $req->Service;
    $Material= $req->Material;
    $Consultancy= $req->Consultancy;
    $area= $req->area;
    $amount= $req->amount;
    $time= $req->time;
    $licence= $req->licence;
    if($Material==1)
    {
  return back()->with('success','tender is not in  our scope because we are not work on Material Provision');
    }
    else{
     $sum=$Service+$Consultancy+$area+ $amount+$time+$licence;
      if($sum>=4.5){
      return $this->createtenderr();
      }
      else{

           return back()->with('success','The bid cannot meet all the requirements');

      }
    }


    }
    public function createtenderr()
    {
       // $Department=department::all();
       // $Portfolio=portfolio::all();
      $userList = DB::table('users')
         ->select('users.email','users.role')
          ->where('users.role','tenderAdmin')
          ->get();
        $workArea=areaofwork::all();
       $Requirnment=Requirnment::all();
      // $Requirnment=json($REQQ);
        return view('posts.createTender',compact('workArea','Requirnment','userList'));
    }

    public function  createtender(Request $req)
    {


        // $basic  = new \Nexmo\Client\Credentials\Basic(getenv("NEXMO_KEY"), getenv("NEXMO_SECRET"));
        //     $client = new \Nexmo\Client($basic);

        //     $receiverNumber = "251910108362";
        //     $message = "This is FROM  FEDILA";

        //     $message = $client->message()->send([
        //         'to' => $receiverNumber,
        //         'from' => 'FEDILA MUNEWER',
        //         'text' => $message
        //     ]);
        //     dd('SMS Sent Successfullyyyyyyyyyyyyyyyyyyyyyyyyyy.');
    // Nexmo::messages()->send([
    //   'to'=>'251911966277',
    //   'from'=>'251910108362',
    //   'to'=>'test message pleasseeeee'
    // ]);
       $user_id=Auth::user()->id;
      $tenderId=Helper::IDGenerator(new tenderTable,'TendId','5','TEND');
      $nameCount=count($req->name);
      $phoneCount=count($req->phone);
      $emailCount=count($req->email);
      $namevalue=$req->name;
      $phonevalue=$req->phone;
      $emailvalue=$req->email;
      $physicalAdressvalue=$req->physicalAdress;
      //$Maplinkvalue=$req->Maplink;
      $maxnumber=max($nameCount, $phoneCount, $emailCount);
       DB::beginTransaction();
      try{

         if($req->country != null||$req->Region!= null||$req->Zone!= null||$req->woreda != null||$req->Kebele != null||$req->StretNumber != null||$req->BuildingNmae != null||$req->OfficeNo != null|| $req->Floor !=null||$req->landMark != null||$req->AreaName != null)
           {
       $personalInformation =physicalAdress::create([
        'country'=>$req->country,
        'Region'=>$req->Region,
        'Zone'=>$req->Zone,
        'woreda'=>$req->woreda,
        'Kebele'=>$req->Kebele,
        'StretNumber'=>$req->StretNumber,
        'BuildingNmae'=>$req->BuildingNmae,
        'OfficeNo'=>$req->OfficeNo,
        'Floor'=>$req->Floor,
        'landMark'=>$req->landMark,
        'AreaName'=>$req->AreaName,
        'ZipCode'=>$req->ZipCode,
        'PoBox'=>$req->PoBox

       ]);
       $inperson=$personalInformation->id;
     }
     else
     {
        $inperson=null;
     }
       if($req->Pobox != null)
       {

          $mailAdress =mailAdress::create([
        'FirstName'=>$req->FirstName,
        'LastName'=>$req->LastName,
        'BuisnessName'=>$req->BuisnessName,
        'StressAdress'=>$req->StressAdress,
        'City'=>$req->City,
        'ZipCode'=>$req->ZipCode,
        'Country'=>$req->Country,
        'Pobox'=>$req->Pobox,
       ]);
          $mailadress_info=$mailAdress->id;
       }
        else
     {
        $mailadress_info=null;
     }

         $tender = tenderTable::create([
        'TendId'=> $tenderId,
        'tend_name'=>$req->tend_name,
        'org_name'=>$req->org_name,
        'bid_num'=>$req->bid_num,
        'type'=>$req->type,
        'area_work'=>$req->area_work,
        'Opp_Status'=>$req->Opp_Status,
        'rel_date'=>$req->rel_date,
        'end_date'=>$req->end_date,
        'summery'=>$req->summery,
        'site_Url'=>$req->site_Url,

        'reg_by'=>$user_id,
        'Sub_Mat_Ex_Status'=>'pending-to-Aproval',
        'Tend_mang_Status'=>"pending-to-Aproval",
        'Tend_Check_Status'=>"pending-to-Aproval",
        'Inpersen_id'=>$inperson,
        'mail_id'=>$mailadress_info,
        'email_adress_submission'=>$req->email_adress_submission,
        'Url_adress'=>$req->Url_adress,
       ]);


      if( $req->BID!=null )
         {
         $fileName1 = $req->BID->getClientOriginalName();
         $req->file('BID')->storeAs('public/'.$tender->id, $fileName1);
         }
         else{
            $fileName1 = null;
         }
          if( $req->TOR!=null )
         {
         $fileName2 = $req->TOR->getClientOriginalName();
          $req->file('TOR')->storeAs('public/'.$tender->id, $fileName2);
         }
         else
         {
            $fileName2 =null;

         }
           if( $req->Eligiblity!=null )
         {
         $fileName3 = $req->Eligiblity->getClientOriginalName();
         $req->file('Eligiblity')->storeAs('public/'.$tender->id, $fileName3);
         }
         else{
            $fileName3 = null;
         }
           if( $req->Evaluation!=null )
         {
         $fileName4 = $req->Evaluation->getClientOriginalName();
         $req->file('Evaluation')->storeAs('public/'.$tender->id, $fileName4);
         }
         else{
            $fileName4 = null;
         }
          $img=image::create([
        $filePath = 'public/'.$tender->id,
        'filePath'=>$filePath,
        'tend_id'=> $tender->id,
            'BID' => $fileName1,
            'TOR' => $fileName2,
            'Evaluation' => $fileName4,
            'Eligiblity' => $fileName3,
            // 'GuidLine'=> $fileName2,
            // 'Others'=>  $fileName2,
       ]);
           for($i=0; $i<count($req->req_id); $i++)
         {
        $req_save=TenderRequirnmentList::create([
        'req_id'=>$req->req_id[$i],
        'ted_id'=> $tender->id
       ]);
        }
          if($nameCount>1 || $phoneCount>1 || $emailCount>1)
         {

             for($i=0; $i<$maxnumber;$i++)
         {
        $con=contact::create([
        'name'=>$namevalue[$i],
        'phone'=>$phonevalue[$i],
        'email'=>$emailvalue[$i],
        'web_adress'=>$req->web_adress[$i],
        'Maplink'=>$req->Maplink[$i],
        'tend_id'=>$tender->id
       ]);
          }
         }
         else{

             for($i=0; $i<$maxnumber;$i++)
         {
        $con=contact::create([
        'name'=>$namevalue[$i],
        'phone'=>$phonevalue[$i],
        'email'=>$emailvalue[$i],
        'web_adress'=>$req->web_adress[$i],
        'Maplink'=>$req->Maplink[$i],
        'tend_id'=>$tender->id

       ]);
          }
         }
            $userNme=Auth::user()->name;
          $emailedTender = [
        'selector'=>1,
        'id' =>$tender->id,
        'name' => $tender->tend_name,
        'staus'=>$tender->Opp_Status,
        'reg_by'=>$userNme
           ];
              $CartSave =CartTable::create ([
        'tend_id' =>$tender->id,
        'Request_By' =>$user_id,
        'Assign_to'=>5,
        'status'=>0,
           ]);

           if($tender)
           {
           DB::commit();
           $assignemail=$req->AssignEmail;
           Mail::to($assignemail)->send(new projectCreated($emailedTender));
          return redirect()->route('getScreeaning')->with('success', 'tender registers successfully');
            }
           else{

            DB::rollback();
           }
          //return redirect()->back();
      }
      catch(Exception $ex)
      {

        DB::rollback();
        return back()->with('error',' some thing wrong Tender is not save!');
      }
    }

    public function edittender(tenderregisters $tenderregisters)
     {
          // return view('posts.document',['tend'=>$tenderregisters]);
          //return view('posts.UpdateTender',['tend'=>$tenderregisters]);
       $tend=tenderregisters::find($tenderregisters->id);
        //dd($tend);
   return view('posts.UpdateTender',compact('tend'));
       // return view('posts.update');
     }
     public function update(tenderregisters $tenderregisters)
     {

           $tenderregisters->update([
           // 'TendId'=>request('TendId'),
            'tend_name'=>request('tend_name'),
            'org_name'=>request('org_name'),
            'bid_num'=>request('bid_num'),
            'type'=>request('type'),
            'rel_date'=>request('rel_date'),
            'end_date'=>request('end_date'),
           // 'doc'=>request('doc'),
            'contact'=>request('contact'),
             'email'=>request('email'),
            'summery'=>request('summery'),
        ]);
         return redirect("/tender");

       // return redirect()->route('tender.viewtender')->with('success','Post updated successfully');
        /*
         $request->validate([
            'title'=>'required',
            'content'=>'required',
         ]);
        // dd(request()->all());
        $post->update([
            'title'=>request('title'),
            'content'=>request('content'),
        ]);
        return redirect("/");
        */
     }

public function getTenderByRegId()
{
   $tend_id=Auth::user()->id;
     $tender = areaofwork::join('tender_tables', 'tender_tables.area_work', '=', 'areaofwork.id')
                ->where('tender_tables.reg_by', $tend_id)
                 ->get(['tender_tables.*', 'areaofwork.areaName']);
    $tenderCount = areaofwork::join('tender_tables', 'tender_tables.area_work', '=', 'areaofwork.id')
                ->where('tender_tables.reg_by', $tend_id)
                 ->count();
     $workArea=areaofwork::all();
          $cartAllcont = DB::table('cart_table')
         ->where('cart_table.Assign_to', $tend_id)
         ->count();
    // $tender =tenderTable::all();
  // $post = DB::table('tender_tables')->where('Opp_Status', "Posted")->count();
   //$forcast = DB::table('tender_tables')->where('Opp_Status', "Forcasted")->count();
   //$archive = DB::table('tender_tables')->where('Opp_Status', "Archived")->count();
   return view('User.userdashboard',compact('tender','workArea','tenderCount','cartAllcont'));
}


 public function gettender()
 {
    $data=DB::table('tenderregisters')->get();
    return view('posts.Assign',compact('data'));
 }
 public function CountRecord()
 {
       return view('home');
 }
  public function tenderbyid()
 {
   $uid =Auth::user()->id;

  $tender=tenderregisters::where('user_id', $uid);
   dd($tender);

    /* $tender = use::with('users')->find($id)->users;
 $users = DB::table('users')
->join('tenderregisters', 'users.id', '=', 'tenderregisters.user_id')
->select('tenderregisters.*', 'users.name')
->get();
return $users;
*/
 }

 public function getBIDDocument(Request $request)
 {
     $tend= $request->id;
      $BIDDocument = DB::table('images')
       ->select('images.tend_id','images.BID')
         ->where('images.tend_id', $tend)->first();
      return view('posts.detailview',compact('BIDDocument'));
 }
 public function getTORDocument(Request $request)
 {
     $tend= $request->id;
      $TORDocument = DB::table('images')
       ->select('images.tend_id','images.TOR')
         ->where('images.tend_id', $tend)->first();
      return view('posts.detailviewTOR',compact('TORDocument'));
 }
  public function getEligiblityDocument(Request $request)
 {
     $tend= $request->id;
      $EligiblityDocument = DB::table('images')
       ->select('images.tend_id','images.Eligiblity')
         ->where('images.tend_id', $tend)->first();
      return view('posts.detailviewEvaluation',compact('EligiblityDocument'));
 }
  public function getEvaluationDocument(Request $request)
 {
     $tend= $request->id;
      $EvaluationDocument = DB::table('images')
       ->select('images.tend_id','images.Evaluation')
         ->where('images.tend_id', $tend)->first();
      return view('posts.detailviewEligible',compact('EvaluationDocument'));
 }


  public function  viewtender()
 {

   $tender = areaofwork::join('tender_tables', 'tender_tables.area_work', '=', 'areaofwork.id')
            ->get(['tender_tables.*', 'areaofwork.areaName']);
     $workArea=areaofwork::all();
    // $tender =tenderTable::all();
   $post = DB::table('tender_tables')->where('Opp_Status', "Posted")->count();
   $forcast = DB::table('tender_tables')->where('Opp_Status', "Forcasted")->count();
   $archive = DB::table('tender_tables')->where('Opp_Status', "Archived")->count();
   return view('posts.tender',compact('post','forcast','tender','workArea'));
 }
 // use to get detaikl tender review
   public function  getTenderDetail(Request $req)
 {
    $tend_id= $req->data;
 $tenderall = DB::table('tender_tables')
    ->select('tender_tables.*','areaofwork.*','mail_adresses.*','PhysicalAdress.*','users.name')
    ->leftJoin('areaofwork', 'tender_tables.area_work', '=', 'areaofwork.id')
    ->leftJoin('mail_adresses', 'tender_tables.mail_id', '=', 'mail_adresses.id')
    ->leftJoin('PhysicalAdress', 'tender_tables.Inpersen_id', '=', 'PhysicalAdress.id')
    ->leftJoin('users', 'tender_tables.reg_by', '=', 'users.id')
    ->where('tender_tables.id', $tend_id)->first();
    $contact=DB::table('contact')->where('contact.tend_id',$tend_id)->get();
    $images=DB::table('images')->where('images.tend_id',$tend_id)->get();
    $Requirnment = DB::table('tender_requirnment_list')
    ->select('tender_requirnment_list.*','requirnment.*')
    ->leftJoin('requirnment', 'tender_requirnment_list.req_id', '=', 'requirnment.id')
      ->where('tender_requirnment_list.ted_id', $tend_id)->get();
     // dd($Requirnment);
      return view('posts.test',compact('tenderall','contact','Requirnment','images'));


 }
  public function getAllCartList()
  {
       $UsserId=Auth::user()->id;
        $cartAll = DB::table('cart_table')
         ->select('cart_table.*','users.name')
          ->leftJoin('users', 'cart_table.Request_By', '=', 'users.id')
          ->where('cart_table.Assign_to',$UsserId)
         ->get();
     return view('User.CartList',compact('cartAll'));

  }
   public function getAllCartListAll()
  {
       $UsserId=Auth::user()->id;
        $cartAll = DB::table('cart_table')
         ->select('cart_table.*','users.name','users.email')
          ->leftJoin('users', 'cart_table.Assign_to', '=', 'users.id')
          ->get();
     return view('User.CartListAll',compact('cartAll'));

  }
    public function askRequestForm()
  {
       $userList = DB::table('users')
         ->select('users.*')
          ->where('users.role','SystemAdmin')
          ->get();
     return view('User.Request',compact('userList'));
  }
  public function SaveRequest(Request $req)
  {
     $user_id=Auth::user()->id;
      $userNme=Auth::user()->name;
     $req=reques_form::create([
       'requested_By'=>$user_id,
       'Req_type'=>$req->Req_type,
       'Req_name'=>$req->Req_name,
       'Req_value'=>$req->Req_value,
       'Req_summery'=>$req->Req_value,
       'Req_Status'=>0,
       'AssigTo'=>$req->AssigTo,
     ]);
          $mailRequest = [
        'selector'=>2,
        'id' =>$req->id,
        'name' =>  $req->Req_type,
        'staus'=>"Waiting",
        'reg_by'=>$userNme
           ];
           $Assign_to = DB::table('users')
         ->select('users.email')
          ->where('users.id',$req->AssigTo)
          ->first();
    Mail::to($Assign_to)->send(new projectCreated($mailRequest));
    return back()->with('success','request send Sucessfully');
  }
  public function ViewRequest()
  {
   $allRequest = DB::table('request')
         ->select('request.*','users.name')
          ->leftJoin('users', 'request.requested_By', '=', 'users.id')
          ->where('request.Req_Status',0)
          ->get();
       //  dd($allRequest);
    return view('admin.RequestView',compact('allRequest'));
  }
  public function updateRequestStatus(Request $req)
  {

     $req_id=$req->data;
   $data=reques_form::find( $req_id);
    $data->Req_Status =1;
    $data->save();
    $requestedBy=$data->requested_By;
  //  dd($requestedBy);
     $mailRequest = [
        'selector'=>3,
        'id' =>$data->id,
        'name' =>$data->Req_type,
        'staus'=>"Registered",
        'reg_by'=>$userNme
           ];
           $emailBack = DB::table('users')
         ->select('users.email')
          ->where('users.id',$requestedBy)
          ->first();
    Mail::to($emailBack)->send(new projectCreated($mailRequest));
 return redirect()->route('viewrequest')->with('success', 'tender registers successfully and send the message to'.$emailBack );

   // return $this->ViewRequest();
     // $allRequest = DB::table('request')
     //     ->select('request.*','users.name')
     //      ->leftJoin('users', 'request.requested_By', '=', 'users.id')
     //       ->where('request.Req_Status',0)
     //      ->get();
     //       return view('admin.RequestView',compact('allRequest'));
  }
}

