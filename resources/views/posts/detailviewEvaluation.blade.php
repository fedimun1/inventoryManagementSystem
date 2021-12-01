<!DOCTYPE html>
<html>
<head>
  		<title></title>
  	</head>
  	<body>
  	<div  class="container"> 
  		<!-- <img src="{{ Storage::url('fedi.jpg')}}"  width="60" height="60" alt="">
    <img src="{{ Storage::url('uploads/Capture1.PNG') }}" alt="feilassssss" />
   <img src="{{ asset('/storage/uploads/Capture1.PNG') }}">
-->
    <iframe src="{{ Storage::url($EvaluationDocument->tend_id.'/'.$EvaluationDocument->Evaluation)}}"   style="height: 1000px;width: 2000px" ></iframe>
  	</div>
  	</body>
  	</html>