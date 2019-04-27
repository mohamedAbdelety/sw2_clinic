@if($finish == 1 )
	<i class="material-icons" style="color: #0f0">done</i>
@elseif($send == 1)

	<a style="text-decoration: none" href="{{url('/dashboard/doctor/controll/patient/detectnow')}}"><span class="label label-info">Now</span></a>
@else
	<i class="material-icons" style="color: #f00">close</i>
@endif
