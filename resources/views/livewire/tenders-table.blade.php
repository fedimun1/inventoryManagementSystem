<DOCTYPE html>
    <html>
        <head>
            <title>edit</title>

               <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
             <link href="{{ asset('css/main2.css') }}" rel="stylesheet">
             <link href="{{ asset('css/util.css') }}" rel="stylesheet">
             <link href="{{ asset('ckeditor/ckeditor.js') }}" >
            <link href="{{ asset('js/main.js') }}" >
             <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
           <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
         
</head>
<body> 
  <style type="text/css">
    nav svg{
      height: 10px;
    }
  </style>
<div class="limiter">
        <div class="container-table100">
            <div class="wrap-table100">
             
                    <div class="table">
                        <div class="roww header">
                            <div class="cell">

                             Tender Nmae
                            </div>
                            <div class="cell">
                               Organization Name
                            </div>
                            <div class="cell">
                               Bid Number
                            </div>
                            <div class="cell">
                              Type
                            </div>
                              <div style="display: none;" class="cell">
                              id
                            </div>

                             <!-- 
                             <div class="cell">
                              release date
                            </div>
                             <div class="cell">
                              end date
                            </div>
                             <div class="cell">
                              document
                            </div>
                               <div class="cell">
                              contact
                            </div>
                             <div class="cell">
                              email
                            </div>

                             <div class="cell">
                              summery
                            </div>-->
                           
                        </div>
    @foreach($tender as $tend)
  <div class="row roww notfirst" id=" {{$tend->id}}" >

                    <div class="cell" data-title="tend_name">
                               {{$tend->tend_name}}
                            </div>
                             <div class="cell" data-title="org_name">
                              {{$tend->org_name}}
                            </div>
                            <div class="cell" data-title="bid_num">
                               {{$tend->bid_num}}
                            </div>
                            <div class="cell" data-title="type">
                               {{$tend->type}}
                            </div>
                             <div class="cell" style="display: none;" data-title="id">
                               {{$tend->id}}
                            </div>
                             <!-- 
                            <div class="cell" data-title="rel_date">
                                {{$tend->rel_date}}
                            </div>
                            <div class="cell" data-title="tend_name">
                              {{$tend->end_date}}
                            </div>
                             <div class="cell" data-title="org_name">
                           {{$tend->doc}}
                            </div>
                               <div class="cell" data-title="type">
                            {{$tend->contact}}
                            </div>
                            <div class="cell" data-title="rel_date">
                              {{$tend->email}}
                             </div>
                             <div class="cell " data-title="rel_date">
        <textarea name="summery"   class="ckeditor" >       {{$tend->summery}}</textarea>

                    
                            </div>-->

                      
                        </div>
                        @endforeach
                      
                    </div>
                     {{$tender->links()}}
            </div>
        </div>

    </div>

<div class="modal newmodal"  style="background-color: red; height: 100%;w">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!--<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>-->

<script type="text/javascript">
  $(".notfirst").click(function(){
     $( ".newmodal" ).dialog();
   //alert('fedila')

});
    </script>
      </body>

</html>
