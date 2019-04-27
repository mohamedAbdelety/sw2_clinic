<?php
	namespace App\Http\Controllers;
	use App\Http\Controllers\reportInterface;
	use App\Detection;
	use App\Exchange;
	use App\Employee;
	use App\Admin;
	use App\Secretary;
 	use App\helper\helper;
 	use DB;
 	use Auth;
	use App\Doctor;
	use App\Patient;
	class reportHR implements reportInterface{
		
		public function report() {
			
			$doctor_count = Doctor::count();
			$fr_count = Admin::where('role','3')->count();
			$hr_count = Admin::where('role','2')->count();
			$hr_count -=1;
			$secratry_count = Secretary::count();
			$patient_count = Patient::count();
			$employee_count = Employee::count();
			$detection_count = Detection::where('price','>',0)->where('finish','1')->count();
			$observation_count = Detection::where('price',0.00)->where('finish','1')->count();

			// report
			 $x1 = Detection::where('price','>',0)->where('finish','1')->whereDate('created_at',date('Y-m-d',time()))->count();
			 $x2 = Detection::where('price','>',0)->where('finish','1')->whereDate('created_at',date('Y-m-d',strtotime('-1 days')))->count();
			 $x3 = Detection::where('price','>',0)->where('finish','1')->whereDate('created_at',date('Y-m-d',strtotime('-2 days')))->count();
			 $x4 = Detection::where('price','>',0)->where('finish','1')->whereDate('created_at',date('Y-m-d',strtotime('-3 days')))->count();
			 $x5 = Detection::where('price','>',0)->where('finish','1')->whereDate('created_at',date('Y-m-d',strtotime('-4 days')))->count();


		  	 $y1 = Detection::where('price',0.00)->where('finish','1')->whereDate('created_at',date('Y-m-d',time()))->count();
			 $y2 = Detection::where('price',0.00)->where('finish','1')->whereDate('created_at',date('Y-m-d',strtotime('-1 days')))->count();
			 $y3 = Detection::where('price',0.00)->where('finish','1')->whereDate('created_at',date('Y-m-d',strtotime('-2 days')))->count();
			 $y4 = Detection::where('price',0.00)->where('finish','1')->whereDate('created_at',date('Y-m-d',strtotime('-3 days')))->count();
			 $y5 = Detection::where('price',0.00)->where('finish','1')->whereDate('created_at',date('Y-m-d',strtotime('-4 days')))->count();



			 	
			return [$doctor_count,$fr_count,$hr_count,$secratry_count,$patient_count,$employee_count,$detection_count,$observation_count,$x1,$x2,$x3,$x4,$x5,$y1,$y2,$y3,$y4,$y5];
		}
	}

?>