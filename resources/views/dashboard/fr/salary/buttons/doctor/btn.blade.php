<?php
  $helper = App\helper\helper::getInstance();
  $x = $helper->get_detectnumber_fordoctor($doctorID) - $payedDetections;
?>
@if($x == 0)
<i class="material-icons" style="color: #0f0">done</i>
@else
<a href="{{url('dashboard/fr/salary/doctor/pay/'.$doctorID)}}"><span class="btn btn-info"><i class="material-icons">money</i></span></a>
@endif