<?php
	namespace App\Http\Controllers;
	use App\Http\Controllers\reportInterface;
	use App\Detection;
	use App\Exchange;
	use App\Employee;
	use App\Secretary;
 	use App\helper\helper;
 	use DB;
 	use Auth;
	use App\Doctor;
	class reportDoctor implements reportInterface{
		
		public function report() {
			$doctor = Doctor::where('staff_id',Auth::user()->id)->first();
			$id = $doctor->id;
			$detection_count = Detection::where('price','>',0)->where('finish','1')->where('doctor_id',$id)->count();
			$observation_count = Detection::where('price',0.00)->where('finish','1')->where('doctor_id',$id)->count();
			
			$patient_count = Detection::where('finish','1')->where('doctor_id',$id)->distinct('patient_id')->count('patient_id');
			
			$another_doctor_specail = Doctor::where('specail',$doctor->specail)->count();
			$another_doctor_specail -=1;
			

			// Detection
			 $x1 = Detection::where('price','>',0)->where('finish','1')->where('doctor_id',$id)->whereMonth('created_at','1')->whereYear('created_at',date('Y',time()))->count();
			 $x2 = Detection::where('price','>',0)->where('finish','1')->where('doctor_id',$id)->whereMonth('created_at','2')->whereYear('created_at',date('Y',time()))->count();
			 $x3 = Detection::where('price','>',0)->where('finish','1')->where('doctor_id',$id)->whereMonth('created_at','3')->whereYear('created_at',date('Y',time()))->count();
			 $x4 = Detection::where('price','>',0)->where('finish','1')->where('doctor_id',$id)->whereMonth('created_at','4')->whereYear('created_at',date('Y',time()))->count();
			 $x5 = Detection::where('price','>',0)->where('finish','1')->where('doctor_id',$id)->whereMonth('created_at','5')->whereYear('created_at',date('Y',time()))->count();
			 $x6 = Detection::where('price','>',0)->where('finish','1')->where('doctor_id',$id)->whereMonth('created_at','6')->whereYear('created_at',date('Y',time()))->count();
			 $x7 = Detection::where('price','>',0)->where('finish','1')->where('doctor_id',$id)->whereMonth('created_at','7')->whereYear('created_at',date('Y',time()))->count();
			 $x8 = Detection::where('price','>',0)->where('finish','1')->where('doctor_id',$id)->whereMonth('created_at','8')->whereYear('created_at',date('Y',time()))->count();
			 $x9 = Detection::where('price','>',0)->where('finish','1')->where('doctor_id',$id)->whereMonth('created_at','9')->whereYear('created_at',date('Y',time()))->count();
			 $x10 = Detection::where('price','>',0)->where('finish','1')->where('doctor_id',$id)->whereMonth('created_at','10')->whereYear('created_at',date('Y',time()))->count();
			 $x11 = Detection::where('price','>',0)->where('finish','1')->where('doctor_id',$id)->whereMonth('created_at','11')->whereYear('created_at',date('Y',time()))->count();
			 $x12 = Detection::where('price','>',0)->where('finish','1')->where('doctor_id',$id)->whereMonth('created_at','12')->whereYear('created_at',date('Y',time()))->count();
			 //observation
			 $y1 = Detection::where('price',0.00)->where('finish','1')->where('doctor_id',$id)->whereMonth('created_at','1')->whereYear('created_at',date('Y',time()))->count();
			 $y2 = Detection::where('price',0.00)->where('finish','1')->where('doctor_id',$id)->whereMonth('created_at','2')->whereYear('created_at',date('Y',time()))->count();
			 $y3 = Detection::where('price',0.00)->where('finish','1')->where('doctor_id',$id)->whereMonth('created_at','3')->whereYear('created_at',date('Y',time()))->count();
			 $y4 = Detection::where('price',0.00)->where('finish','1')->where('doctor_id',$id)->whereMonth('created_at','4')->whereYear('created_at',date('Y',time()))->count();
			 $y5 = Detection::where('price',0.00)->where('finish','1')->where('doctor_id',$id)->whereMonth('created_at','5')->whereYear('created_at',date('Y',time()))->count();
			 $y6 = Detection::where('price',0.00)->where('finish','1')->where('doctor_id',$id)->whereMonth('created_at','6')->whereYear('created_at',date('Y',time()))->count();
			 $y7 = Detection::where('price',0.00)->where('finish','1')->where('doctor_id',$id)->whereMonth('created_at','7')->whereYear('created_at',date('Y',time()))->count();
			 $y8 = Detection::where('price',0.00)->where('finish','1')->where('doctor_id',$id)->whereMonth('created_at','8')->whereYear('created_at',date('Y',time()))->count();
			 $y9 = Detection::where('price',0.00)->where('finish','1')->where('doctor_id',$id)->whereMonth('created_at','9')->whereYear('created_at',date('Y',time()))->count();
			 $y10 = Detection::where('price',0.00)->where('finish','1')->where('doctor_id',$id)->whereMonth('created_at','10')->whereYear('created_at',date('Y',time()))->count();
			 $y11 = Detection::where('price',0.00)->where('finish','1')->where('doctor_id',$id)->whereMonth('created_at','11')->whereYear('created_at',date('Y',time()))->count();
			 $y12 = Detection::where('price',0.00)->where('finish','1')->where('doctor_id',$id)->whereMonth('created_at','12')->whereYear('created_at',date('Y',time()))->count();
			 
			return [$detection_count,$observation_count,$patient_count,$another_doctor_specail,$x1,$x2,$x3,$x4,$x5,$x6,$x7,$x8,$x9,$x10,$x11,$x12,$y1,$y2,$y3,$y4,$y5,$y6,$y7,$y8,$y9,$y10,$y11,$y12];
		}
	}

?>