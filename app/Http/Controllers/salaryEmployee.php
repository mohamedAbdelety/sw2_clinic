<?php
	namespace App\Http\Controllers;
	use App\Http\Controllers\salaryInterface;
	use App\Employee;
	use App\helper\helper;
	class salaryEmployee implements salaryInterface{
		public function paySalary($id) {
			$helper = helper::getInstance();
			$monthNumber = $helper->get_employeeSalary_data($id)['month_payed'] + $helper->get_employeeSalary_data($id)['month_will_payed'];
			Employee::where('id',$id)->update(['last_month'=>date('m',time()),'last_year'=>date('Y',time()),'month_number'=>$monthNumber]);
		}
	}

?>