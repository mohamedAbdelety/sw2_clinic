
<?php
	$helper = App\helper\helper::getInstance();
	echo $helper->get_detectnumber_fordoctor($doctorID) - $payedDetections;
