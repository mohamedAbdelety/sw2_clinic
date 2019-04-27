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
	use App\User;
	class reportAdmin implements reportInterface{
		
		public function report() {
			
			$doctor_count = Doctor::count();
			$fr_count = Admin::where('role','3')->count();
			$hr_count = Admin::where('role','2')->count();
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


			 // 
			 $block_count = User::where('block','1')->count();
			 $exchange_annual_s = Exchange::all();
			 $exchange_annual = 0;
			 foreach ($exchange_annual_s as $exchange) {
			 	if($exchange->type == 'standard'){
			 		if($exchange->peroid_type == 'yearly'){
			 			$exchange_annual += $exchange->value;
			 		}else if($exchange->peroid_type == 'monthly'){
			 			$exchange_annual += $exchange->value * 12;
			 		}else{
			 			$exchange_annual += $exchange->value * 365;
			 		}
			 	}else{
			 		$exchange_annual += $exchange->value;
			 	}
			 }

			 $detection_year_price = Detection::where('price','>',0)->where('finish','1')->whereYear('created_at',date('Y',time()))->sum('price');
			 $detection_all_price = Detection::where('price','>',0)->where('finish','1')->sum('price');
			




			// Detection
			 $x6 = Detection::where('price','>',0)->where('finish','1')->whereMonth('created_at','1')->whereYear('created_at',date('Y',time()))->count();
			 $x7 = Detection::where('price','>',0)->where('finish','1')->whereMonth('created_at','2')->whereYear('created_at',date('Y',time()))->count();
			 $x8 = Detection::where('price','>',0)->where('finish','1')->whereMonth('created_at','3')->whereYear('created_at',date('Y',time()))->count();
			 $x9 = Detection::where('price','>',0)->where('finish','1')->whereMonth('created_at','4')->whereYear('created_at',date('Y',time()))->count();
			 $x10 = Detection::where('price','>',0)->where('finish','1')->whereMonth('created_at','5')->whereYear('created_at',date('Y',time()))->count();
			 $x11 = Detection::where('price','>',0)->where('finish','1')->whereMonth('created_at','6')->whereYear('created_at',date('Y',time()))->count();
			 $x12 = Detection::where('price','>',0)->where('finish','1')->whereMonth('created_at','7')->whereYear('created_at',date('Y',time()))->count();
			 $x13 = Detection::where('price','>',0)->where('finish','1')->whereMonth('created_at','8')->whereYear('created_at',date('Y',time()))->count();
			 $x14 = Detection::where('price','>',0)->where('finish','1')->whereMonth('created_at','9')->whereYear('created_at',date('Y',time()))->count();
			 $x15 = Detection::where('price','>',0)->where('finish','1')->whereMonth('created_at','10')->whereYear('created_at',date('Y',time()))->count();
			 $x16 = Detection::where('price','>',0)->where('finish','1')->whereMonth('created_at','11')->whereYear('created_at',date('Y',time()))->count();
			 $x17 = Detection::where('price','>',0)->where('finish','1')->whereMonth('created_at','12')->whereYear('created_at',date('Y',time()))->count();
			 //observation
			 $y6 = Detection::where('price',0.00)->where('finish','1')->whereMonth('created_at','1')->whereYear('created_at',date('Y',time()))->count();
			 $y7 = Detection::where('price',0.00)->where('finish','1')->whereMonth('created_at','2')->whereYear('created_at',date('Y',time()))->count();
			 $y8 = Detection::where('price',0.00)->where('finish','1')->whereMonth('created_at','3')->whereYear('created_at',date('Y',time()))->count();
			 $y9 = Detection::where('price',0.00)->where('finish','1')->whereMonth('created_at','4')->whereYear('created_at',date('Y',time()))->count();
			 $y10 = Detection::where('price',0.00)->where('finish','1')->whereMonth('created_at','5')->whereYear('created_at',date('Y',time()))->count();
			 $y11 = Detection::where('price',0.00)->where('finish','1')->whereMonth('created_at','6')->whereYear('created_at',date('Y',time()))->count();
			 $y12 = Detection::where('price',0.00)->where('finish','1')->whereMonth('created_at','7')->whereYear('created_at',date('Y',time()))->count();
			 $y13 = Detection::where('price',0.00)->where('finish','1')->whereMonth('created_at','8')->whereYear('created_at',date('Y',time()))->count();
			 $y14 = Detection::where('price',0.00)->where('finish','1')->whereMonth('created_at','9')->whereYear('created_at',date('Y',time()))->count();
			 $y15 = Detection::where('price',0.00)->where('finish','1')->whereMonth('created_at','10')->whereYear('created_at',date('Y',time()))->count();
			 $y16 = Detection::where('price',0.00)->where('finish','1')->whereMonth('created_at','11')->whereYear('created_at',date('Y',time()))->count();
			 $y17 = Detection::where('price',0.00)->where('finish','1')->whereMonth('created_at','12')->whereYear('created_at',date('Y',time()))->count();


			 	
			return [$doctor_count,$fr_count,$hr_count,$secratry_count,$patient_count,$employee_count,$detection_count,$observation_count,$x1,$x2,$x3,$x4,$x5,$y1,$y2,$y3,$y4,$y5,$block_count,$exchange_annual,$detection_year_price,$detection_all_price,$x6,$x7,$x8,$x9,$x10,$x11,$x12,$x13,$x14,$x15,$x16,$x17,$y6,$y7,$y8,$y9,$y10,$y11,$y12,$y13,$y14,$y15,$y16,$y17];
		}
	}

?>




















