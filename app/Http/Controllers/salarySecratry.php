<?php
	namespace App\Http\Controllers;
	use App\Http\Controllers\salaryInterface;
	use App\Secretary;
	use App\helper\helper;
	class salarySecratry implements salaryInterface{
		public function paySalary($id) {
			$helper = helper::getInstance();
			$monthNumber = $helper->get_secratrySalary_data($id)['month_payed'] + $helper->get_secratrySalary_data($id)['month_will_payed'];
			Secretary::where('id',$id)->update(['last_month'=>date('m',time()),'last_year'=>date('Y',time()),'month_number'=>$monthNumber]);
		}
	}

?>