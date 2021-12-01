@extends('header')
@section('css')
    <link rel="stylesheet" href="/assets/css/newstyle.css">
     <link rel="stylesheet" href="/assets/css/newstyle1.css">
@endsection
@section('content')
<div class=" " style="width:80%;margin-left:10%">
<div id="aria-tab-panel" class="tabpanel" aria-multiselectable="false" style="margin-top: 100px">
			<ul class="aria-tablist tabsSidebar" role="tablist" style="margin-left:13px">
	            <li  id="defaultOpen" title="Click to see synopsis tab" class=" tablinks tabs_button  aria-tab " aria-controls="TenderDetailTab" role="tab" tabindex="0" data-for-tab="1"  onclick="openCity(event, 'TenderDetailTab')">Tender Detail</li>
	            	
	            <li id="relatedDocumentsTab" title="Click to see related documents tab" class="tablinks tabs_button aria-tab" aria-controls="relatedDocumentsPanel" role="tab" tabindex="-1"  data-for-tab="2" onclick="openCity(event, 'TenderDocumentTab')">Related Documents</li>
			</ul>
  <div id="TenderDetailTab" class="tabcontent" >
      <div data-for-tab="1" id="" class=" tabs_content     aria-panel" aria-labeledby="synopsisDetailsTab" role="tabpanel" aria-hidden="false" style="display: block;">
        
          <div id="synopsisDetailsContent">
          <table width="100%">
             <tbody><tr>  
             <td width="99%" align="right">   
            <div align="right" id=""><br><a style="font-weight: bolder;" href="javascript:displayPrintView('printSynopsisDetails');">Tender Detail View</a></div>
            </td>
            <td align="right">
              <a style="font-weight: bolder;"> <i class="fa fa-book" aria-hidden="true"></i></a>
            </td>
            </tr>
          </tbody></table>
                      
                      <!-- =============================== -->
                      <!-- ===== General Information ===== -->
                      <!-- =============================== -->
               <fieldset>
               <legend >General Information</legend>
            <table width="100%" cellpadding="5" cellspacing="0" border="0">
                  <tbody>
                    <tr>
                  <td valign="top" width="50%">
                   <div id="synopsisDetailsGeneralInfoTableLeft">
                    <table cellpadding="5" cellspacing="0" border="0">
                      <tbody>
                      <tr>

                      <th style="width: 40%" scope="row" valign="top" nowrap="nowrap" class="label">Tender ID:</th>
                      <td><span class="search-custom">{{$tenderall->TendId}}</span></td>
                      </tr>
   <tr>
  <th scope="row" valign="top" nowrap="nowrap" class="label">Tender Name:</th>
  <td><span class="search-custom">{{$tenderall->tend_name}}</span></td>
    </tr>
    <tr>
    <th scope="row" valign="top" nowrap="nowrap" class="label">Vendor Name :</th>
    <td><span class="search-custom">{{$tenderall->org_name}}</span></td>
    </tr>
    <tr>
    <th scope="row" valign="top" nowrap="nowrap" class="label">Tender Number :</th>
    <td><span class="search-custom">{{$tenderall->bid_num}}</span></td>
    </tr>
    <tr>
    <th scope="row" valign="top" nowrap="nowrap" class="label">Tender Type:</th>
    <td><span class="search-custom">{{$tenderall->type}}</span></td>
    </tr>
    <tr>
    <th scope="row" valign="top" nowrap="nowrap" class="label">Area Of Work:</th>
    <td><span class="search-custom"><span class="search-custom">{{$tenderall->areaName}}</span></span></td>
    <tr>
    <th scope="row" valign="top" nowrap="nowrap" class="label">Opportunity Statud:</th>
    <td><span class="search-custom"><span class="search-custom"></span>{{$tenderall->Opp_Status}}</span></td>
  </tbody></table></div></td>
    <td valign="top" width="50%">
     <div id="synopsisDetailsGeneralInfoTableRight">
      <table cellpadding="5" cellspacing="0" border="0">
      <tbody>
      <tr>
      <th  style="width: 40%" scope="row" valign="top" nowrap="nowrap" class="label">Posted  Date:</th>
      <td><span class="search-custom">{{$tenderall->rel_date}} </span></td>
      </tr>
      <tr>
      <th scope="row" valign="top" nowrap="nowrap" class="label">Closing  Date:</th>
      <td><span class="search-custom">{{$tenderall->end_date}}</span></td>
      </tr>  
       <tr>
      <th scope="row" valign="top" nowrap="nowrap" class="label">URL Adress Publish Tender:</th>
      <td><a href="{{$tenderall->site_Url}}">{{$tenderall->site_Url}}</a></td>
     </tr>
        <tr>
      <th scope="row" valign="top" nowrap="nowrap" class="label">Tender Registerd By:</th>
      <td><span class="search-custom">{{$tenderall->name}}</span></td>
     </tr>

  </tbody>
   </table>
   </div>
   </td>
   </tr>
      </tbody></table>
                      </fieldset>
                      
                      <!-- ======================= -->
                      <!-- ===== Vendor Contact Relation Information ===== -->
                      <!-- ======================= -->
        <fieldset>
              <legend >Vendor Contact Relation Information</legend>
     <div id="">
    <table width="100%" cellpadding="5" cellspacing="0" border="0">
        <thead>
          <tr>
            <th>contact Name</th>
            <th>contact Phone </th>
            <th>Contact  Email</th>
            <th>Map Adress Link</th>
            <th>Website Adress</th>
          </tr>
        </thead>
            <tbody>
           @foreach($contact as $tend)
            <tr>
              <td >{{$tend->name}}</td>
              <td><a href="tel:{{$tend->phone}}">{{$tend->phone}}</a></td>
              <td><a href="mailto:{{$tend->email}}">{{$tend->email}}<a/></td>
              <td class="newte"><a href={{$tend->Maplink}}>{{$tend->Maplink}}</a></td>
              <td class="newte"><a href={{$tend->web_adress}}>{{$tend->web_adress}}</a></td>
             
        @endforeach
              </tr> 
        </tbody>
      </table>
      <!--            <table>
    <tr>
      <th scope="row" valign="top" nowrap="nowrap" class="label" style="width: 200PX">Contact Related Name::</th>
        @foreach($contact as $user)
            <td>{{ $user->name }}</td>
        @endforeach
    </tr>

    <tr>
        <th  scope="row" valign="top" nowrap="nowrap" class="label" style="width: 200PX">Contact phone Number:</th>

        @foreach($contact as $user)
            <td>{{ $user->phone }}</td>
        @endforeach
    </tr>
  <tr>
        <th scope="row" valign="top" nowrap="nowrap" class="label" style="width: 200PX">Contact Email Adress<:</th>

        @foreach($contact as $user)
            <td>{{ $user->email }} </td>
        @endforeach
    </tr>
    <tr>
        <th  scope="row" valign="top" nowrap="nowrap" class="label" style="width: 200PX">Contact Website Adress:</th>

        @foreach($contact as $user)
            <td>{{ $user->email }} </td>
        @endforeach
    </tr>
      <tr>
        <th  scope="row" valign="top" nowrap="nowrap" class="label" style="width: 200PX">Map Link:</th>

        @foreach($contact as $user)
            <td>{{ $user->email }} </td>
        @endforeach
    </tr>
</table>-->

     </div>
</fieldset>
              <!-- ======================= -->
                    <!-- ===== Requirnment ===== -->
                      <!-- ======================= -->
    <fieldset>
              <legend >Requirnment</legend>
     <div id="">
       <table width="100%" cellpadding="5" cellspacing="0" border="0">
        <thead>
          <tr>
            <th>Reuirnment Name</th>
            <th>Requirnment Value  </th>
           
          </tr>
        </thead>
            <tbody>
           @foreach($Requirnment as $tend)
            <tr>
              <td >{{$tend->ReqNmae}}</td>
              <td >{{$tend->ReqReference}}</td>     
        @endforeach
              </tr> 
        </tbody>
      </table>
     </div>
</fieldset>
                     <!-- ======================= -->
                    <!-- ===== Summery ===== -->
                      <!-- ======================= -->
    <fieldset>
              <legend >Summery</legend>
     <div id="synopsisDetailsEligibilityTable">
      <table width="100%" cellpadding="5" cellspacing="0" border="0">
     <tbody>
     <tr>
     <th style="width: 16%" scope="row" valign="top" nowrap="nowrap" class="label">Summery Note:</th>
     <td width="100%">
      <span class="search-custom">{{$tenderall->summery}}</span>
     </td>
    </tr>
   </tbody>
    </table>
     </div>
</fieldset>
                     <!-- ======================= -->
                      <!-- ===== Submission Related Information ===== -->
                      <!-- ======================= -->
    <fieldset>
              <legend >Submission Related Information <span id="sub_relared_info"></span></legend>
              <input id="Inpersen_id_value" value="{{$tenderall->Inpersen_id}}"  style="display: none;"></input>
              <input id="mail_id_value" value="{{$tenderall->mail_id}}" style="display: none;"></input>
              <input id="email_adress_submission_value" value="{{$tenderall->email_adress_submission}}" style="display: none;"></input>
              <input id="Url_adress_value" value="{{$tenderall->Url_adress}}" style="display: none;"></input>
                         <!-- ======================= -->
                      <!-- ===== in person  ===== -->
                      <!-- ======================= -->
      <div  hidden="" id="physicalAdress_field">
     <fieldset style="margin-right: 5px;margin-left: 5px">
     <legend >Submit Inperson <span id="sub_relared_info"></span></legend>
       <table width="100%" cellpadding="5" cellspacing="0" border="0"  id="">
       <tbody>
        <tr>
        <td valign="top" width="50%">
     <div id="">
        <table cellpadding="5" cellspacing="0" border="0">
         <tbody>
      <tr>
      <th style="width: 180px" scope="row" valign="top" nowrap="nowrap" class="label">Country:</th>
    <td><span class="search-custom">{{$tenderall->country}}</span></td>
   </tr>
   <tr>
  <th scope="row" valign="top" nowrap="nowrap" class="label">Region:</th>
  <td><span class="search-custom">{{$tenderall->Region}}</span></td>
    </tr>
    <tr>
    <th scope="row" valign="top" nowrap="nowrap" class="label">Zone :</th>
    <td><span class="search-custom">{{$tenderall->Zone}}</span></td>
    </tr>
    <tr>
    <th scope="row" valign="top" nowrap="nowrap" class="label">Kebele :</th>
    <td><span class="search-custom">{{$tenderall->Kebele}}</span></td>
    </tr>
    <tr>
    <th scope="row" valign="top" nowrap="nowrap" class="label">Street Number:</th>
    <td><span class="search-custom">{{$tenderall->StretNumber}}</span></td>
    </tr>
    <tr>
    <th scope="row" valign="top" nowrap="nowrap" class="label">Building Name:</th>
    <td><span class="search-custom"><span class="search-custom">{{$tenderall->BuildingNmae}}</span></span></td>
    <tr>
    <th scope="row" valign="top" nowrap="nowrap" class="label">Office Number:</th>
    <td><span class="search-custom"><span class="search-custom"></span>{{$tenderall->OfficeNo}}</span></td>
  </tbody></table></div></td>
    <td valign="top" width="50%">
     <div id="synopsisDetailsGeneralInfoTableRight">
      <table cellpadding="5" cellspacing="0" border="0">
      <tbody>
      <tr>
      <th  style="width: 180px" scope="row" valign="top" nowrap="nowrap" class="label">Floor:</th>
      <td><span class="search-custom">{{$tenderall->Floor}} </span></td>
      </tr>
      <tr>
      <th scope="row" valign="top" nowrap="nowrap" class="label">Land Mark:</th>
      <td><span class="search-custom">{{$tenderall->landMark}}</span></td>
      </tr>  
       <tr>
      <th scope="row" valign="top" nowrap="nowrap" class="label">Area Name:</th>
      <td><span class="search-custom">{{$tenderall->AreaName}}</span></td>
     </tr>
        <tr>
      <th scope="row" valign="top" nowrap="nowrap" class="label">Zip Code:</th>
      <td><span class="search-custom">{{$tenderall->ZipCode}}</span></td>
     </tr>
        <tr>
      <th scope="row" valign="top" nowrap="nowrap" class="label">P.O BOX:</th>
      <td><span class="search-custom">{{$tenderall->PoBox}}</span></td>
     </tr>
  </tbody>
   </table>
   </div>
   </td>
   </tr>
      </tbody></table>
        </fieldset>
      </div>

  

                      <!-- ======================= -->
                      <!-- ===== by mail ===== -->
                      <!-- ======================= -->
  <div  hidden="" id="mailAdress_field">
     <fieldset style="margin-right: 5px;margin-left: 5px">
          <legend >Submit By Mail <span id="sub_relared_info"></span></legend>
          <table width="100%" cellpadding="5" cellspacing="0" border="0" >
       <tbody>
        <tr>
        <td valign="top" width="50%">
     <div id="synopsisDetailsGeneralInfoTableLeft">
        <table cellpadding="5" cellspacing="0" border="0">
         <tbody>
      <tr>
      <th style="width: 180px" scope="row" valign="top" nowrap="nowrap" class="label">First Name:</th>
    <td><span class="search-custom">{{$tenderall->FirstName}}</span></td>
   </tr>
   <tr>
  <th scope="row" valign="top" nowrap="nowrap" class="label">Last Name:</th>
  <td><span class="search-custom">{{$tenderall->LastName}}</span></td>
    </tr>
    <tr>
    <th scope="row" valign="top" nowrap="nowrap" class="label">Buisness Name :</th>
    <td><span class="search-custom">{{$tenderall->BuisnessName}}</span></td>
    </tr>
     <tr>
    <th scope="row" valign="top" nowrap="nowrap" class="label">P.O B.OX :</th>
    <td><span class="search-custom">{{$tenderall->Pobox}}</span></td>
    </tr>
  </tbody></table></div></td>
    <td valign="top" width="50%">
     <div id="synopsisDetailsGeneralInfoTableRight">
      <table cellpadding="5" cellspacing="0" border="0">
      <tbody>
       <tr>
    <th style="width: 180px" scope="row" valign="top" nowrap="nowrap" class="label">Country:</th>
    <td><span class="search-custom"><span class="search-custom"></span>{{$tenderall->Country}}</span></td></tr>
          <tr>
              <tr>
    <th scope="row" valign="top" nowrap="nowrap" class="label">City:</th>
    <td><span class="search-custom">{{$tenderall->City}}</span></td>
    </tr>
     <tr>
    <th scope="row" valign="top" nowrap="nowrap" class="label">Stress Adress :</th>
    <td><span class="search-custom">{{$tenderall->StressAdress}}</span></td>
    </tr>
    <th scope="row" valign="top" nowrap="nowrap" class="label">Zip Code:</th>
    <td><span class="search-custom"><span class="search-custom">{{$tenderall->ZipCode}}</span></span></td>
  </tr>
  </tbody>
   </table>
   </div>
   </td>
   </tr>
      </tbody></table>
       </fieldset>
      </div>

  
                     <!-- ======================= -->
                      <!-- ===== through email ===== -->
                      <!-- ======================= -->

    <div  hidden="" id="emailAdress_field">
     <fieldset style="margin-right: 5px;margin-left: 5px">
          <legend >Send By Email <span id="sub_relared_info"></span></legend>
          <table width="100%" cellpadding="5" cellspacing="0" border="0">
     <tbody>
     <tr>
     <th style="width: 16%" scope="row" valign="top" nowrap="nowrap" class="label">Email Adress For Submission:</th>
     <td width="100%">
      <span class="search-custom"><a href="mailto:{{$tenderall->email_adress_submission}}">{{$tenderall->email_adress_submission}}</a></span>
     </td>
    </tr>
   </tbody>
    </table>
     </fieldset>
     </div>

                      <!-- ======================= -->
                      <!-- ===== through  ===== -->
                      <!-- ======================= -->
   <div  hidden="" id="urlAdress_field"> 
    <fieldset style="margin-right: 5px;margin-left: 5px">
    <legend>By Filling Form <span id="sub_relared_info"></span></legend>
         <table width="100%" cellpadding="5" cellspacing="0" border="0">
     <tbody>
     <tr>
     <th style="width: 16%" scope="row" valign="top" nowrap="nowrap" class="label">Url Adress For Submission:</th>
     <td width="100%">
      <span class="search-custom"><a href="{{$tenderall->Url_adress}}">{{$tenderall->Url_adress}}</a></span>
     </td>
    </tr>
   </tbody>
    </table>
    </fieldset>
     </div>
</fieldset>
   </div>
    </div>

        <fieldset>
              <legend >Aproval Status</legend>
     <div id="">
       <table width="100%" cellpadding="5" cellspacing="0" border="0">
        <thead>
          <tr>
            <th>Tender  Admin Approval Status</th>
            <th>Subject Matter Approval Status</th>
             <th>Tender Cheker Approval Status</th>
           </tr>
        </thead>
            <tbody>
         
            <tr>
              <td >{{$tenderall->Tend_mang_Status}}</td>
              <td >{{$tenderall->Sub_Mat_Ex_Status}}</td> 
              <td >{{$tenderall->Tend_Check_Status}}</td>      

              </tr> 
        </tbody>
      </table>
     </div>
</fieldset>
                
  </div>
  <!-- ================================= -->
                <!-- ===== Related Documents Tab ===== -->
                <!-- ================================= -->
                <!-- <div class="TabbedPanelsContent"> -->     
            <div id="TenderDocumentTab" class="tabcontent">
                <div data-for-tab="1" id="" class=" tabs_content     aria-panel" aria-labeledby="synopsisDetailsTab" role="tabpanel" aria-hidden="false" style="display: block;">
          <div id="synopsisDetailsContent">
         <fieldset>
              <legend >Docment List</legend>
     <div id="">
    <table width="100%" cellpadding="5" cellspacing="0" border="0">
        <thead>
          <tr>
            <th>BID</th>
            <th>TOR </th>
            <th>Eligiblity</th>
            <th>Evaluation</th>
            <th>GuidLine</th>
            <th>Other Document</th>
          </tr>
        </thead>
            <tbody>
           @foreach($images as $img)
            <tr>
              <td ><a href="{{ route('BID', ['id' => $img->tend_id]) }}"> {{$img->BID}}  </a></td>
              <td ><a href="{{ route('TOR', ['id' => $img->tend_id]) }}"> {{$img->TOR}}  </a></td>
              <td ><a href="{{ route('Evaluation', ['id' => $img->tend_id]) }}"> {{$img->Evaluation}}  </a></td>
              <td ><a href="{{ route('Eligiblity', ['id' => $img->tend_id]) }}"> {{$img->Eligiblity}}  </a></td>
              <td ><a href="{{ route('BID', ['id' => $img->tend_id]) }}"> {{$img->GuidLine}}  </a></td>
              <td ><a href="{{ route('BID', ['id' => $img->tend_id]) }}"> {{$img->Others}}  </a></td>
            
             
        @endforeach
              </tr> 
        </tbody>
      </table>
</div>
</fieldset>
</div>
</div>
</div>
    	</div>
    	</div>
    	 @csrf
       @push('script')
       <script type="text/javascript">
      // 	function setupTabs()
      // 	{
      // 		document.querySelectorAll('.tabs_button').forEach(li=>{
       		//	li.addEventListener("click",()=>{
       			//	const sideBar=li.parentElement;
       			//	const tabsContainer=sideBar.parentElement;
       			//	const tabNumber=li.dataset.forTab;
       			 //   const tabActive=tabsContainer.querySelector('.tabs_content[data-tab="${tabNumber}"]');
       			  // sideBar.querySelectorAll('.tabs_button').forEach(li=>{
       			  // 	li.classList.remove("tabs_button_active");

       			  // });
                //  tabsContainer.querySelectorAll('.tabs_content').forEach(tab=>{
       			   //	tab.classList.remove("tabs_content_active");

       		//	});
                  //li.classList.add("tabs_button_active");
                 // tabToActive.classList.add("tabs_content_active")
       	//	});
       //	}
       	//document.addEventListener("DOMContentLoaded",()=>{
       	//	setupTabs();
       	//	document.querySelectorAll(".tabpanel").forEach(tabsContainer=>{
             // tabsContainer.querySelector(".tabsSidebar  .tabs_button").click();            
       //		});
     //  	});
       </script>
       <script type="text/javascript">
         $( document ).ready(function() {
         var inperson_val=$('#Inpersen_id_value').val();
         var  mail_val=$('#mail_id_value').val();
         var email_val=$('#email_adress_submission_value').val();
         var url_val=$('#Url_adress_value').val();

      
         if (!inperson_val) {   // check if empty 
           document.getElementById("physicalAdress_field").hidden =true;  
               }
               else{
          document.getElementById("physicalAdress_field").hidden =false;  

               }
                if (!mail_val) {   // check if empty 
    
        document.getElementById("mailAdress_field").hidden =true;  

               }
               else{
        document.getElementById("mailAdress_field").hidden =false;  
              
               }
                if (!email_val) {   // check if empty 
         document.getElementById("emailAdress_field").hidden =true;  

               }
               else{
         document.getElementById("emailAdress_field").hidden =false;  
      
               }
                if (!url_val) {   // check if empty 
                  
       document.getElementById("urlAdress_field").hidden =true; 
               }
               else{
                
      document.getElementById("urlAdress_field").hidden =false; 
               
               }
         });

       </script>

<script>
function openCity(evt, tabname) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(tabname).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
   
</body>
</html> 

       @endpush
@endsection