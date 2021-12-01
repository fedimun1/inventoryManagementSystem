
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/3.5.3/select2.min.css">

</head>
<body>
<select style="width: 200px" id="tend_id">
	@foreach($data as $d)
	<option>{{$d->tend_name}}</option>
	@endforeach
</select>

</body>
</html>