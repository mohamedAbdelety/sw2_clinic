<?php
	namespace App\Http\Controllers;
	use App\Http\Controllers\salaryInterface;
	use App\Doctor;
	use App\helper\helper;
	class salaryDoctor implements salaryInterface{
		public function paySalary($id) {
			$helper = helper::getInstance();
			$number = $helper->get_doctorSalary_data($id)['dect_payed'] + $helper->get_doctorSalary_data($id)['dect_will_payed'];
			Doctor::where('id',$id)->update(['payedDetections'=>$number]);
		}
	}

?>