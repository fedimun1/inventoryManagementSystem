@component('mail::message', ['emailedTender' => $emailedTender])
# Wellcome To Alephtav Consultancy 
<br>
<br>
please check this tender....<br>
this need your approval to go next step<br>
so please click the button and find the tender<br>
<br>
******************************************************************************************
 tender ID  :{{ $emailedTender['id'] }}<br>
 Tender Name  :{{ $emailedTender['name'] }}<br>
 Opportunity Status  :{{ $emailedTender['staus'] }}<br>
 Registe By  :{{ $emailedTender['reg_by'] }}<br>

 ****************************************************


@component('mail::button', ['url' => 'http://127.0.0.1:8000/tender','color' => 'success'])
Click Here
@endcomponent

Thanks,<br>
With Best Regard<br>
{{ config('app.name') }}
@endcomponent
