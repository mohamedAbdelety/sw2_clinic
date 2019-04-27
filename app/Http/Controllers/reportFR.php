<?php
	namespace App\Http\Controllers;
	use App\Http\Controllers\reportInterface;
	use App\Detection;
	use App\Exchange;
	use App\Employee;
	use App\Secretary;
 	use App\helper\helper;
 	use DB;
	use App\Doctor;
	class reportFR implements reportInterface{
		public function report() {
			$detection_today = Detection::whereBetween('detections.created_at',[date('Y-m-d 00:00:00',time()),date('Y-m-d 23:59:59',time())])->where('price','>',0)->count();
			$detection_today_price = Detection::whereBetween('detections.created_at',[date('Y-m-d 00:00:00',time()),date('Y-m-d 23:59:59',time())])->where('price','>',0)->sum('price');
			$detection_payed_today = Detection::whereBetween('detections.created_at',[date('Y-m-d 00:00:00',time()),date('Y-m-d 23:59:59',time())])->where('price','>',0)->where('pull','1')->count();
			$detection_price_payed_today = Detection::whereBetween('detections.created_at',[date('Y-m-d 00:00:00',time()),date('Y-m-d 23:59:59',time())])->where('price','>',0)->where('pull','1')->sum('price');
			$detection_all = Detection::where('price','>',0)->where('pull','1')->count();
			$detection_all_price = Detection::where('price','>',0)->where('pull','1')->sum('price');

			// Exchange
			$exchange_standard = Exchange::where('type','standard')->sum('value');
			$exchange_varient = Exchange::where('type','varient')->sum('value');
			$exchange_standard_daily = Exchange::where('type','standard')->where('peroid_type','daily')->sum('value');
			$exchange_standard_monthly = Exchange::where('type','standard')->where('peroid_type','monthly')->sum('value');
			$exchange_standard_yearly = Exchange::where('type','standard')->where('peroid_type','yearly')->sum('value');
			$exchange_all_price = Exchange::all()->sum('value');


			//salary
			$employee_salary = Employee::all()->sum('salary');
			$secratry_salary = Secretary::all()->sum('salary');
			$employee_count = Employee::all()->count();
			$secratry_count = Secretary::all()->count();
			$doctor_count = Doctor::all()->count();
			$doctor_max = Doctor::all()->max('Dectsalary');


			// top
			$employees = Employee::all();
			$total_employee_salary = 0;
			foreach($employees as $employee){
				if($employee->last_month == 0){
					$custom = strtotime($employee->created_at);
					$from_year = date('Y',$custom);
					$from_month = date('m',$custom);
					$to_year = date('Y',time());
					$to_month = date('m',time());
					$remaind = ($to_year - $from_year) * 12 + ($to_month -  $from_month);
					$total_employee_salary += $remaind * $employee->salary;
				}else{
					$year = date('Y',time());
					$month = date('m',time());
					$remaind = $year - $employee->last_year;
					$remaind = $remaind * 12 + ($month -  $employee->last_month);
					$total_employee_salary += $remaind * $employee->salary;
				}	
			}

			$secretaries = Secretary::all();
			$total_secratry_salary = 0;
			foreach($secretaries as $secretary){
				if($secretary->last_month == 0){
					$custom = strtotime($secretary->created_at);
					$from_year = date('Y',$custom);
					$from_month = date('m',$custom);
					$to_year = date('Y',time());
					$to_month = date('m',time());
					$remaind = ($to_year - $from_year) * 12 + ($to_month -  $from_month);
					$total_secratry_salary += $remaind * $secretary->salary;
				}else{
					$year = date('Y',time());
					$month = date('m',time());
					$remaind = $year - $secretary->last_year;
					$remaind = $remaind * 12 + ($month -  $secretary->last_month);
					$total_secratry_salary += $remaind * $secretary->salary;
				}
			}

			$doctors = Doctor::all();
			$total_doctor_salary = 0;
			$helper = helper::getInstance();
			foreach($doctors as $doctor){
				$total_doctor_salary += ($helper->get_detectnumber_fordoctor($doctor->id) - $doctor->payedDetections) * $doctor->Dectsalary;
			}
			$another_fr = DB::table('admins')->where('role','3')->count();
			$another_fr -=1;

			return [$detection_today,$detection_today_price,$detection_payed_today,$detection_price_payed_today,$detection_all,$detection_all_price,$exchange_standard,$exchange_varient,$exchange_standard_daily,$exchange_standard_monthly,$exchange_standard_yearly,$exchange_all_price,$employee_salary,$secratry_salary,$employee_count,$secratry_count,$doctor_count,$doctor_max,$total_employee_salary,$total_secratry_salary,$total_doctor_salary,$another_fr];
		}
	}

?>