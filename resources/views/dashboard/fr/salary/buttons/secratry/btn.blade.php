<?php
  $final_salary;
?>
@if($last_month == 0)
  <?php
    $custom = strtotime($created_at);
    $from_year = date('Y',$custom);
    $from_month = date('m',$custom);
    $to_year = date('Y',time());
    $to_month = date('m',time());
    $remaind = ($to_year - $from_year) * 12 + ($to_month -  $from_month);
    $final_salary =  $remaind * $salary;
  ?>
@else
  <?php
    $year = date('Y',time());
    $month = date('m',time());
    $remaind = $year - $last_year;
    $remaind = $remaind * 12 + ($month -  $last_month);
   $final_salary =  $remaind * $salary;
  ?>
@endif





@if($final_salary == 0)
  <i class="material-icons" style="color: #0f0">done</i>
@else
  <a href="{{url('dashboard/fr/salary/secratry/pay/'.$secratryID)}}"><span class="btn btn-info"><i class="material-icons">money</i></span></a>
@endif