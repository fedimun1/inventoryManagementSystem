@extends('header')
@section('content')
@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
@endsection
<div style="margin-left: 15%;margin-right:15%">
<div class="card" style="margin-top: 60px;border: 5px solid #001959 !important;">
      <h5 class="card-header">Registration Form</h5>
        <div class="card-body">
             <form  style="padding-left:100px"  action="Tender" method="post" enctype="multipart/form-data">
    @csrf
  <div  class="form-group row">
    <label  class="col-sm-2 col-form-label" >Tender Name<span style="color: red">*</span>
 <div class="con"> <span> name of the tender </span>
</div>
    </label>
    <div class="col-sm-8">
      <input name="tend_name"  class="form-control " required="">
    </div>
  </div>
  <br>
   <div class="form-group row">
    <label  class=" col-sm-2 col-form-label">Vendor Name<span style="color: red">*</span>
 <div class="con"> <span> name of organization  </span>
</div>
    </label>
    <div class="col-sm-8">
      <input name="org_name" class="form-control  " required="">
    </div>
  </div>
  <br>
  <div class="form-group row">
    <label  class="  col-sm-2 col-form-label">Bid Number<span style="color: red">*</span> <div class="con"> <span> number of adverted BID  </span>
</div></label>
    <div class="col-sm-8">
      <input name="bid_num" type="Number"  class="form-control " required="">
    </div>
  </div>
  <br>
   <div class="form-group row">
    <label  class=" col-sm-2 col-form-label">Type<span style="color: red">*</span>
 <div class="con"> <span>Type of BID</span>
</div>
    </label>
    <div class="col-sm-8">  
     <select name="type" class="form-control"  required="required">
      <option value="National Competitive Bid(NCB)">National Competitive Bid(NCB)</option>
      <option value="Request for Expression of Interest(EoI)">Request for Expression of Interest(EoI) </option>
      <option value="Request for Proposal(RFP)">Request for Proposal(RFP) </option>
      <option value="Request for Quote(RFQ)">Request for Quote(RFQ) </option>
  </select>
    </div>
  </div> 
  <br>
    <div class="form-group row">
    <label  class="  col-sm-2 col-form-label">Area Of Work<span style="color: red">*</span>
 <div class="con"> <span>Area The BID Focus </span>
</div>
    </label>
    <div class="col-sm-8">  
          <select name="area_work" class="form-control"  required="required">
      @foreach($workArea as $workArea)
 
      <option value="{{$workArea->id}}">{{$workArea->areaName}} </option>
     @endforeach
  </select>
    </div>
  </div>
  <br> 
    <div class="form-group row">
    <label  class="  col-sm-2 col-form-label">Opportunity Status<span style="color: red">*</span>
     <div class="con"> <span> Opportunity Status of the BID  </span>
</div>
    </label>
    <div class="col-sm-8">  
     <select name="Opp_Status" class="form-control"  required="required">
      <option value="Posted">Posted</option>
      <option value="Forcasted">Forcasted </option>
      <option value="Archived">Readvertize</option>
  </select>
    </div>
  </div> 
  
  <br>
  <div class="form-group row">
    <label  class="  col-sm-2 col-form-label">Relase Date<span style="color: red">*</span>
 <div class="con"> <span> Tender posted Date  </span>
</div>
    </label>
    <div class="col-sm-8">
      <input name="rel_date" type="Date" class="form-control  " required="" >
    </div>
  </div>
   <br>
   <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Dead Line<span style="color: red">*</span>
 <div class="con"> <span> Tender Closing Date  </span>
</div>
    </label>
    <div class="col-sm-8">
      <input name="end_date" type="Date" class="form-control " required="" >
    </div>
  </div>
   <br>

    <div class="form-group row">
    <label  class="  col-sm-2 col-form-label"> Document Type <span style="color: red">*</span>
 <div class="con"> <span>  please select document types  </span>
</div>
    </label>
    <div class="col-sm-8">  
     <select name=" " class="form-control"  required="required" id="selectedd" onchange="onSelectChange()">
      <option value="" selected disabled hidden>Please Select Document Type Here</option>
      <option value="BID">BID</option>
      <option value="TOR">TOR </option>
      <option value="Eligiblity">Eligiblity</option>
      <option value="Evaluation">Evaluation</option>
      <option value="">Hide</option>
      <option value="">ShowAll</option>

  </select>
    </div>
  </div>
   <br>
   <div class="form-group row" >
   <label  class="  col-sm-2 col-form-label">Document List
 <div class="con"> <span> Upload Bid Realted Document  </span>
</div>
   </label>
    <div id="BIDdocument" class="col-sm-8" hidden="">
      <input name="BID" type="file" class="form-control  hidden" id="BID" onchange="change()"/ > <p id="BIDdemo" for="img">Please select BID Document</p>
    </div>
    <div id="Eligiblitydocument" class="col-sm-5" hidden="">
      <input name="Eligiblity" type="file" class="form-control hidden" id="Eligiblity" onchange="change()"/> <p id="Eligiblitydemo" for="img">Please select Eligiblity Document</p>
    </div>
      <label  class="col-sm-2 col-form-label"></label>
    <div id="TORdocument" class="col-sm-5" hidden="">
      <input name="TOR" type="file" class="form-control hidden" id="TOR" onchange="change()"/> <p id="TORdemo" for="img">Please select TOR  Document </p>
    </div>
    <div id="Evaluationdocument" class="col-sm-5" hidden="">
      <input name="Evaluation" type="file" class="form-control hidden" id="Evaluation" onchange="change()"/> <p id="Evaluationdemo" for="img">Please select  Evaluation Document</p>
    </div>

  </div>
  <br>
    <div class="form-group row">
    <label  class=" col-sm-2 col-form-label">Requirnment<span style="color: red">*</span>
 <div class="con"> <span>Rerquirnment list </span>
</div>
    </label>
    <div class="col-sm-8">  
       <select id="req_id" name="req_id[]" class="form-control"  multiple="multiple" required="required">
      @foreach($Requirnment as $Requirnment)
      <option value="{{$Requirnment->id}}">{{$Requirnment->ReqNmae}} </option>
     @endforeach
  </select>
    </div>

  </div>
   <br>
     <div class="form-group row">
    <label  class=" col-sm-2 col-form-label">Site/URL <span style="color: red">*</span>
 <div class="con"> <span>reference URL that post the BID </span>
</div>
    </label>
    <div class="col-sm-8">
      <input name="site_Url" type="" class="form-control  " >
    </div>
  </div>
  <br>
     <div class="form-group row">
    <label  class="  col-sm-2 col-form-label">Website Adress
 <div class="con"> <span>web site adress thet used to communicate to vendor</span>
</div>
    </label>
    <div class="col-sm-8">
      <input name="web_adress" type="" class="form-control  " >
    </div>
  </div>
   <!--

  <br>

    <div class="form-group row">
    <label  class="me col-sm-2 col-form-label">Contact Name
 <div class="con"> <span>Name of contact adress </span>
</div>
    </label>
    <div class="col-sm-5 form-group row">
      <input name="name[]" type="" class="form-control rounded-pill " >
    </div>
      <div class="rounded-pil" id="" >
         <a class="collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false" aria-controls="collapseTwo">
            <i id="addcontactName" class="fa" aria-hidden="true"></i>
          </a>
    </div>
     <div id="contact2" class="col-sm-5" hidden="">
      <input name="name" type="" class="form-control rounded-pill " >
    </div>
  </div>
    <br>
    <div class="form-group row">
    <label  class="me col-sm-2 col-form-label">Phone Number
 <div class="con"> <span>phone Adress used to contact </span>
</div>
    </label>
    <div class="col-sm-5 form-group row">
      <input name="phone[]" type="number" class="form-control rounded-pill " >
    </div>
    
     <div id="phone2" class="col-sm-5" hidden="">
      <input name="phone[]" type="" class="form-control rounded-pill " >
    </div>
  </div>
   <br>
  <div class="form-group row">
    <label  class="me col-sm-2 col-form-label">Email
 <div class="con"> <span>Email Adress used to contact  </span>
</div>
    </label>
    <div class="col-sm-5 form-group row">
      <input  name="email" type="Email" class="form-control rounded-pill " >
    </div>
     <div id="email2" class="col-sm-5" hidden="">
      <input  name="email" type="Email" class="form-control rounded-pill " >
    </div>
  </div>
   -->
   <br>
     <div class="form-group row">
    <label  class="  col-sm-2 col-form-label">Map Link
 <div class="con"> <span>google map adress link </span>
</div>
    </label>
    <div class="col-sm-8">
      
      <input name="Maplink[]"  class="form-control  " >
    </div>
  </div>
   <br>
   <div class="form-group row">
    <label for="" class="col-sm-2 col-form-label">Summery<span style="color: red">*</span>

<div class="con"> <span>short summery about the BID  </span>
</div>
    </label>
    <div class="col-sm-8">
        <textarea name="summery"   class="  form-control" required="" ></textarea>
    </div>
  </div>
  <br>
  <!--   <div class="row">
    <div class="form-group col-xl-12 child-repeater-table " id="dynamic_fieldd">
       <table class="table table-boarder table-responsive">
        <thead>
          <tr>
            <th>name</th>
            <th>contact</th>
            <th>email</th>
            <th><button name="addd" id="addd">Add More</button></th>
          </tr>
        </thead>
         <tbody>
           <tr>
             <td><input type="text" name="name[]" id="name" class="form-control name_list" placeholder="enterName"></td>
             <td><input type="" name=""></td>
             <td><input type="" name=""></td>
             <th><a href="javascript:(0)" class="btn btn-danger
              addRow">-</a></th>

           </tr>
         </tbody>
       </table>

    </div>
  </div>
  <br>
  <table class="table table-bordered" id="dynamic_field"> 
<tr>  
<td><input type="text" name="title[]" placeholder="Enter title" class="form-control name_list" / id="title"></td>  
<td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
</tr>  
</table>
-->
<br> 
<br>
<div class="card">
<div class="card-header">
    <label  class="col-sm-7 col-form-label text-success">Vendor Contact  Related information
     <div class="con"> <span>Vendor Contact  Related information</span>
</div>
    </label>
</div>
<div class="card-body">
<div class="form-group">

<div class="alert alert-danger show-error-message" style="display:none">
<ul></ul>
</div>
<div class="alert alert-success show-success-message" style="display:none">
<ul></ul>
</div>
<div class="table-responsive">  
<table class="table " id="dynamic_field"> 
  <thead><tr>  
<td><label>Name <div class="con"> <span> Contact Name related information </span>
</div> </label></td>
<td><label>Phone Number <div class="con"> <span> Contact Number related information </span>
</div> </label></td>  
<td><label>Email <div class="con"> <span> Contact Email related information </span>
</div> </label></td>  

<td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
</tr>
</thead>
  <tbody>
  <tr>  
<td><input type="text" name="name[]" placeholder="Enter name" class="form-control name_list" / id="title"></td>
<td><input type="number"  name="phone[]" placeholder="Enter phone number" class="form-control name_list" / id="title"></td>  
<td><input type="email" name="email[]" placeholder="Enter email" class="form-control name_list" / id="title"></td>  
</tr> 
</tbody>
  
</table>  
</div>
 
</div> 
</div>
</div>
<br>
<br>
<!--<div class="card">
<div class="card-header">
<h6 class="text-success">submission Related information</h6>
</div>
<div class="card-body">
<div class="form-group">

<div class="alert alert-danger show-error-message" style="display:none">
<ul></ul>
</div>
<div class="alert alert-success show-success-message" style="display:none">
<ul></ul>
</div>
<div class="table-responsive">  
<table class="table " id="dynamic_fieldsub"> 
  <thead><tr>  
<td><label>In Person <div class="con"> <span> please fill the physical adress </span>
</div> </label></td>
<td><label>Mail <div class="con"> <span> please fill the pobox  </span>
</div> </label></td>  
<td><label>Email <div class="con"> <span> please fill the email to submit  </span>
</div> </label></td>  

<td><button type="button" name="addsub" id="addsub" class="btn btn-success">Add More</button></td>  
</tr>
</thead>
  <tbody>
  <tr>  
<td><input type="text" name="inPerson[]" placeholder="Enter physicalAdress" class="form-control name_list" / id="title"></td>
<td><input type="text"  name="pobox[]" placeholder="Enter  POX" class="form-control name_list" / id="title"></td>  
<td><input type="email" name="subemail[]" placeholder="Enter email" class="form-control name_list" / id="title"></td>  
</tr> 
</tbody>
  
</table>  
</div>
 
</div> 
</div>
</div>-->
<div class="card">
<div class="card-header">
 <div class="form-group row">
    <label  class="   col-sm-7 col-form-label text-success">submission Related information<span style="color: red">*</span>
     <div class="con"> <span> submission Related information please  select the way and fill  properly  </span>
</div>
    </label>
    <div class="col-sm-5">  
     <select name="" class="form-control"  required="required" id="sub_rel_info">
       <option value="" selected disabled hidden>Choose here</option>
      <option value="Inpersen_id_section">In Person</option>
      <option value="mail_id_section">Mail </option>
      <option value="email_adress_section">Email</option>
        <option value="Url_adress_section">Online</option>
  </select>
    </div>
  </div>
</div>
<div class="card-body" style="display: none;" id="inpersonfill">
<div class="table-responsive">  
<table class="table " id="dynamic_fieldsub"> 
  <thead>
</thead>
  <tbody>
  <tr>  
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="country">Country</label>
      <input name="country" class="form-control" id="" placeholder="Insert country name">
    </div>
    <div class="form-group col-md-6">
      <label for="Region">Region</label>
      <input name="Region"  class="form-control" id="" placeholder="Insert Region Name">
    </div>
  </div>
    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="Zone">Zone</label>
      <input name="Zone" type="text" class="form-control" id="">
    </div>
    <div class="form-group col-md-4">
      <label for="woreda">Woreda</label>
      <input name="woreda" type="text" class="form-control" id="">
    </div>
    <div class="form-group col-md-2">
      <label for="Kebele">Kebele</label>
      <input type="text" class="form-control" id="" name="Kebele">
    </div>
  </div>
  <div class="form-group">
    <label for="AreaName">Area Name</label>
    <input name="AreaName" type="text" class="form-control" id="" placeholder="please Insert Area Name">
  </div>
  <div class="form-group">
    <label for="landMark">LandMark</label>
    <input name="landMark" type="text" class="form-control" id="" placeholder="please Insert Land Mark">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="StretNumber">Street Number</label>
      <input name="StretNumber" type="text" class="form-control" id="">
    </div>
    <div class="form-group col-md-3">
      <label for="BuildingNmae">Building Nmae</label>
      <input name="BuildingNmae" type="text" class="form-control" id="">
    </div>
    <div class="form-group col-md-3">
      <label for="OfficeNo">Office Number</label>
      <input name="OfficeNo" type="text" class="form-control" id="">
    </div>
  </div>
   <div class="form-row">
    <div class="form-group col-md-6">
      <label for="Floor">Floor</label>
      <input name="Floor" type="text" class="form-control" id="">
    </div>
    <div class="form-group col-md-3">
      <label for="ZipCode">Zip Code</label>
      <input name="ZipCode" type="text" class="form-control" id="">
    </div>
    <div class="form-group col-md-3">
      <label for="PoBox">P.O. Box </label>
      <input name="PoBox" type="text" class="form-control" id="">
    </div>
  </div>
</tr> 
</tbody>
</table>  
</div>
</div> 
<div class="card-body" style="display:none" id="mailFill">
<div class="table-responsive">  
<table class="table " id="dynamic_fieldsub"> 
  <thead>
</thead>
  <tbody>
  <tr>  
<div class="form-row">
    <div class="form-group col-md-6">
      <label for="FirstName">First Name</label>
      <input name="FirstName" class="form-control" id="" placeholder="Insert  First name">
    </div>
    <div class="form-group col-md-6">
      <label for="LastName">Last Name</label>
      <input name="LastName"  class="form-control" id="" placeholder="Insert  Last name">
    </div>
    <div class="form-group col-md-6">
      <label for="Country">Country</label>
      <input name="Country" class="form-control" id="" placeholder="Insert country name">
    </div>
    <div class="form-group col-md-6">
      <label for="City">City</label>
      <input name="City"  class="form-control" id="" placeholder="Insert  City name">
    </div>
  </div>
    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="BuisnessName">Buisness Name</label>
      <input name="BuisnessName" type="text" class="form-control" id="" placeholder="Insert  First name">
    </div>
    <div class="form-group col-md-6">
      <label for="StressAdress">Street Address</label>
      <input name="StressAdress" type="text" class="form-control" id="" placeholder="Insert Street Address">
    </div>
  </div>
   <div class="form-row">
    <div class="form-group col-md-6">
      <label for="ZipCode">Zip Code</label>
      <input name="ZipCode" type="text" class="form-control" id=""  placeholder="Insert  Zip Code">
    </div>
    <div class="form-group col-md-6">
      <label for="Pobox">P.O. Box </label>
      <input name="Pobox" type="text" class="form-control" id="" placeholder="Insert  P.O. Box">
    </div>
  </div>
</tr> 
</tbody> 
</table>  
</div> 
</div> 
<div class="card-body" style="display:none" id="emailfilld">
<div class="table-responsive">  
<table class="table " id="dynamic_fieldsub"> 
  <thead>
</thead>
  <tbody>
  <tr>  
   <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Email Adress
    <div class="con"> 
</div>
    </label>
    <div class="col-sm-10">
      <input name="email_adress_submission" type="email" class="form-control form-control-sm" id="" placeholder="Please Insert Email Adress">
    </div>
  </div>
</tr> 
</tbody>
</table>  
</div>
</div> 
<div class="card-body" style="display:none" id="urlFill">
<div class="table-responsive">  
<table class="table " id="dynamic_fieldsub"> 
  <thead>
</thead>
  <tbody>
  <tr>  
   <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">URL Adress</label>
    <div class="col-sm-10">
      <input name="Url_adress" type="" class="form-control form-control-sm" id="" placeholder="Please Insert Url Adress">
    </div>
  </div>
</tr> 
</tbody>
</table>  
</div>
</div>
</div>
<!--<br> 
<br>
<div class="card">
<div class="card-header">
    <label  class="col-sm-7 col-form-label text-success">Document Related Information
     <div class="con"> <span>Please Upload Related Document</span>
</div>
    </label>
</div>
<div class="card-body">
<div class="form-group">
<div class="table-responsive">  
<table class="table " id="dynamic_field"> 
  <thead><tr>  
<td><label>Document Type</label></td>
<td></td>  
<td><label></label></td>  
</tr>
</thead>
  <tbody>
  <tr>  
<td>
     <select name=" " class="form-control"  required="required" id="selecteddd" onchange="onSelectChangeee()">
      <option value="" selected disabled hidden>Please Select Document Type Here</option>
      <option value="BID">BID</option>
      <option value="TOR">TOR </option>
      <option value="Eligiblity">Eligiblity</option>
      <option value="Evaluation">Evaluation</option>
      <option value="">GuidLine</option>
      <option value="">Other</option>

  </select>
</td>
 <td><input id="inputfield" type="file" name="" hidden=""></td>
<td><button type="button" name="add" id="add" class="btn btn-success">Add </button></td>  
</tr> 
  <tr>  
 <td>
  <table id="editTable">
    <thead>
      <th>BID</th>  
      <th></th>  
    </thead>
</table>
</td>
 <td>
  <table id="editTable">
    <thead>
      <th>TOR</th>  
      <th></th>  
    </thead>
</table>
</td>
 <td>
  <table id="editTable">
    <thead>
      <th>Eligiblity</th>  
      <th></th>  
    </thead>
</table>
</td>
 <td>
  <table id="editTable">
    <thead>
      <th>Evaluation</th>  
      <th></th>  
    </thead>
</table>
</td>
 <td>
  <table id="editTable">
    <thead>
      <th>Guidline</th>  
      <th></th>  
    </thead>
</table>
</td>
 <td>
  <table id="editTable">
    <thead>
      <th>Others</th>  
      <th></th>  
    </thead>
</table>
</td>
</tr> 
</tbody>
  
</table>  
</div>
</div> 
</div>
</div>
<button id="add">Add row</button>


<br>
<br>-->

<br> 
<br>
<div class="card">
<div class="card-header">
    <label  class="col-sm-7 col-form-label text-success">Sending To Approval
     <div class="con"> <span>Please Select the name that need to aprove this BID</span>
</div>
    </label>
</div>
<div class="card-body">
<div class="form-group">
<div class="table-responsive">  
<table class="table " id="dynamic_field"> 
  <thead><tr>  
<td><label>Email  </label></td>
<td>
  <select id="assign_id" name="AssignEmail" class="form-control" required="required">
      @foreach($userList as $userList)
      <option value="{{$userList->email}}">Email : {{$userList->email}} -- Role  :{{$userList->role}}</option>
     @endforeach
  </select>
</td>

</tr>
</thead>

  
</table>  
</div>
 
</div> 
</div>
</div>
<br>
<br>




</div>
 <div style="padding-left: 850px;padding-top:20px"><button type="submit" class="btn btn-primary btn-lg">Save</button>
</div>

</form>
        </div>
  </div>

</div>


  @csrf
       @push('script')
       
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">
  $('body').on('click', '#add', function (event) {
  $('#editTable').append('<tr><td>test<td><td><button class="delete">DELETE</button></tr><td>');
});

$('body').on('click', '.delete', function (event) {
    alert("AJAX for delete row");
});
</script>
<script type="text/javascript">
  var pullfiles=function(){
    // love the query selector
    var fileInput = document.querySelector("#BID");
    var files = fileInput.files;
    // cache files.length
    var fl = files.length;
    var i = 0;

    while ( i < fl) {
      var name=[];
        var file = files[i];
         name.push( files.name );
       // alert(file.name);
        i++;
  console.log( "Titles: " + name.join(", ") );
    }
     document.getElementById("BIDdemo").innerHTML = "You select : " + i +"  BID documents" ;
}

// set the input element onchange to call pullfiles
document.querySelector("#BID").onchange=pullfiles;

</script>
<script type="text/javascript">
  var pullfiles=function(){
    // love the query selector
    var fileInput = document.querySelector("#Eligiblity");
    var files = fileInput.files;
    // cache files.length
    var fl = files.length;
    var i = 0;

    while ( i < fl) {
      var name=[];
        var file = files[i];
         name.push( files.name );
       // alert(file.name);
        i++;
  console.log( "Titles: " + name.join(", ") );
    }
     document.getElementById("Eligiblitydemo").innerHTML = "You select : " + i +"  Eligiblity documents" ;
}

// set the input element onchange to call pullfiles
document.querySelector("#Eligiblity").onchange=pullfiles;

</script>
<script type="text/javascript">
  var pullfiles=function(){
    // love the query selector
    var fileInput = document.querySelector("#TOR");
    var files = fileInput.files;
    // cache files.length
    var fl = files.length;
    var i = 0;

    while ( i < fl) {
      var name=[];
        var file = files[i];
         name.push( files.name );
       // alert(file.name);
        i++;
  console.log( "Titles: " + name.join(", ") );
    }
     document.getElementById("TORdemo").innerHTML = "You select : " + i +"   TOR documents" ;
}

// set the input element onchange to call pullfiles
document.querySelector("#TOR").onchange=pullfiles;

</script>
<script type="text/javascript">
  var pullfiles=function(){
    // love the query selector
    var fileInput = document.querySelector("#Evaluation");
    var files = fileInput.files;
    // cache files.length
    var fl = files.length;
    var i = 0;

    while ( i < fl) {
      var name=[];
        var file = files[i];
         name.push( files.name );
       // alert(file.name);
        i++;
  console.log( "Titles: " + name.join(", ") );
    }
     document.getElementById("Evaluationdemo").innerHTML = "You select: " + i +"  Evaluation documents" ;
}

// set the input element onchange to call pullfiles
document.querySelector("#Evaluation").onchange=pullfiles;

</script>
<!--<script type="text/javascript">
  var loader=function(e){
    let file=e.target.files;
    let show="<span> selected file : </span>" + file[0].name;
    let output=document.getElementById("selector");
    output.innerHTML = show;
    output.classList.add("active");
  };
  let fileInput=document.getElementById("file");
  fileInput.addEventListener("change",loader);
</script>-->

<script type="text/javascript">
  function onSelectChange(){
    var sel = document.getElementById("selectedd");
    var strUser = sel.options[sel.selectedIndex].text;  //getting the selected option's text

    if(strUser == 'BID'){ 
    document.getElementById("BIDdocument").hidden =false;  //enabling the text box because user selected 'Other' option.
    }
    else if(strUser == 'TOR'){
         document.getElementById("TORdocument").hidden =false;  //enabling the text box because user selected 'Other' option.
    }
     else if(strUser == 'Eligiblity'){
         document.getElementById("Eligiblitydocument").hidden =false;  //enabling the text box because user selected 'Other' option.
    }
     else if(strUser == 'Evaluation'){
         document.getElementById("Evaluationdocument").hidden =false;  //enabling the text box because user selected 'Other' option.
    }
      else if(strUser == 'Hide'){
         document.getElementById("Evaluationdocument").hidden =true;  //enabling the text box because user selected 'Other' option.
         document.getElementById("Eligiblitydocument").hidden =true;  //enabling the text box because user selected 'Other' option.
         document.getElementById("TORdocument").hidden =true;  //enabling the text box because user selected 'Other' option.
         document.getElementById("BIDdocument").hidden =true;  //enabling the text box because user selected 'Other' option.
    }
       else if(strUser == 'ShowAll'){
         document.getElementById("Evaluationdocument").hidden =false;  //enabling the text box because user selected 'Other' option.
         document.getElementById("Eligiblitydocument").hidden =false;  //enabling the text box because user selected 'Other' option.
         document.getElementById("TORdocument").hidden =false;  //enabling the text box because user selected 'Other' option.
         document.getElementById("BIDdocument").hidden =false;  //enabling the text box because user selected 'Other' option.
    }

}
</script>
<script type="text/javascript">
   function onSelectChangeee(){
    var sel = document.getElementById("selecteddd");
    var strUser = sel.options[sel.selectedIndex].text;
    $field= document.getElementById("inputfield");
     $field.hidden =false;
       //alert(strUser);
       $('#inputfield').attr('name', strUser);
   }
</script>
<!--<script>
document.getElementById("addcontactName").onclick = function() {

  if (  document.getElementById("contact2").hidden ===true) {
   document.getElementById("contact2").hidden =false
      document.getElementById("phone2").hidden =false
   document.getElementById("email2").hidden =false

  } else {
   document.getElementById("contact2").hidden =true
    document.getElementById("phone2").hidden =true
   document.getElementById("email2").hidden =true
  }
}
</script>-->

<script type="text/javascript">
  $(document).ready(function(){      
//var url = "{{ url('add-remove-input-fields') }}";
var i=1;  
$('#add').click(function(){  
//var title = $("#title").val();
i++;  
$('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="name[]" placeholder="Enter name" class="form-control name_list"  /></td><td><input type="text" name="phone[]" placeholder="Enter phone number" class="form-control name_list"  /></td><td><input type="email" name="email[]" placeholder="Enter email" class="form-control name_list" value="" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
});  
$(document).on('click', '.btn_remove', function(){  
var button_id = $(this).attr("id");   
$('#row'+button_id+'').remove();  
});
});
</script>
<!--<script type="text/javascript">    
//var url = "{{ url('add-remove-input-fields') }}";
document.getElementById("add").onclick = function() {
  let i=1; 
//let tle =document.getElementById("title").val();
i++;  
document.getElementById("dynamic_field").append('<tr id="row'+i+'"><td><input type="text" name="name[]" id="name" class="form-control name_list"placeholder="enterName"></td>
             <td><input type="" name=""></td>
             <td><input type="" name=""></td>
             <th><button name="remove" id="'+i+'">remove</button</th></tr>');  
}
</script>
   @csrf
       @push('script')
       <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
           @endpush
-->

<script type="text/javascript">
    $(document).ready(function(){      
//var url = "{{ url('add-remove-input-fields') }}";
var i=1;  
$('#addsub').click(function(){  
//var title = $("#title").val();
i++;  
$('#dynamic_fieldsub').append('<tr id="rowsub'+i+'" class="dynamic-added"><td><input type="text" name="inPerson[]" placeholder="Enter physicalAdress" class="form-control name_list"  /></td><td><input type="text" name="pobox[]" placeholder="Enter POX" class="form-control name_list"  /></td><td><input type="email" name="subemail[]" placeholder="Enter email" class="form-control name_list" value="" /></td><td><button type="button" name="btn_remove_sub" id="'+i+'" class="btn btn-danger btn_remove_sub">X</button></td></tr>');  
});  
$(document).on('click', '.btn_remove_sub', function(){  
var button_id = $(this).attr("id");   
$('#rowsub'+button_id+'').remove();  
});
});
</script>
<script type="text/javascript">
    $(document).ready(function(){      
//var url = "{{ url('add-remove-input-fields') }}";
var i=1;  
$('#addreq').click(function(){  
//var title = $("#title").val();
i++;  
$('#dynamic_fieldReq').append(' <tr id="rowreq'+i+'"><td><select name="Opp_Status" class="form-control"  required="required"><option value="Posted">Posted</option><option value="Forcasted">Forcasted </option><option value="Archived">Archived</option></select></td><td><input type=""  name="reqreference[]" placeholder="" class="form-control name_list" / id="title"><td><td><button type="button" name="btn_remove_req" id="'+i+'" class="btn btn-danger btn_remove_req">X</button></td></tr>');  
});  
$(document).on('click', '.btn_remove_req', function(){  
var button_id = $(this).attr("id");   
$('#rowreq'+button_id+'').remove();  
});
});
</script>
<script type="text/javascript">
  $(document).ready(function() {
  $("#req_id").select2({
      placeholder: "Please select the Requirnment Here",
    allowClear: true
  });
});
</script>
<script type="text/javascript">
  $(document).ready(function() {
  $("#assign_id").select2({
      placeholder: "Please select the email Here",
    allowClear: true
  });
});
</script>
<script type="text/javascript">
  $("#sub_rel_info").change(function() 
{
    var value = $(this).val();
   // alert(value);
    if(value =='Inpersen_id_section')
    {
         document.getElementById("inpersonfill").style.display ="block";
         document.getElementById("emailfilld").style.display ="none";
         document.getElementById("mailFill").style.display ="none"; 
    }
   else if(value =='mail_id_section')
   {
        document.getElementById("inpersonfill").style.display ="none";
         document.getElementById("emailfilld").style.display ="none";
         document.getElementById("mailFill").style.display ="block";   
          document.getElementById("urlFill").style.display ="none"; 
   }
     else if(value =='email_adress_section')
   {
               
         document.getElementById("inpersonfill").style.display ="none";
         document.getElementById("emailfilld").style.display ="block";
         document.getElementById("mailFill").style.display ="none"; 
          document.getElementById("urlFill").style.display ="none";

   }
     else if(value =='Url_adress_section')
   {
       document.getElementById("urlFill").style.display ="block";
        document.getElementById("emailfilld").style.display ="none";
       document.getElementById("inpersonfill").style.display ="none";
       document.getElementById("mailFill").style.display ="none"; 
   }
    else 
    {  document.getElementById("emailfilld").style.display ="none";
       document.getElementById("inpersonfill").style.display ="none";
       document.getElementById("mailFill").style.display ="none"; 
       document.getElementById("urlFill").style.display ="none";
    }

});
</script>
   @endpush
@endsection

