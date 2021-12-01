@component('mail::message', ['emailedTender' => $emailedTender])
# Wellcome To Alephtav Consultancy 
<br>
<br>
please check this Request....<br>
and add to our system
<br>
*******************************************************************************************
 Request Name  :{{ $emailedTender['name'] }}<br>
 Request Status  :{{ $emailedTender['staus'] }}<br>
 Requested By  :{{ $emailedTender['reg_by'] }}<br>

 ****************************************************


@component('mail::button', ['url' => 'http://127.0.0.1:8000/tender','color' => 'success'])
Click Here
@endcomponent

Thanks,<br>
With Best Regard<br>
{{ config('app.name') }}
@endcomponent
