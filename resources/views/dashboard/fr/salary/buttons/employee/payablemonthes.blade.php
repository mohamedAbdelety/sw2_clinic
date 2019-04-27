@if($last_month == 0)
	<?php
		$custom = strtotime($created_at);
		$from_year = date('Y',$custom);
		$from_month = date('m',$custom);
		$to_year = date('Y',time());
		$to_month = date('m',time());
		$remaind = ($to_year - $from_year) * 12 + ($to_month -  $from_month);
		echo $remaind;
	?>
@else
	<?php
		$year = date('Y',time());
		$month = date('m',time());
		$remaind = $year - $last_year;
		$remaind = $remaind * 12 + ($month -  $last_month);
		echo $remaind;
	?>
@endif