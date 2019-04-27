<?php

namespace App\helper;
use App\Employee;
use App\Secretary;
use App\Doctor;
use App\User;
use Auth;
use App\Detection;
class helper{
	
	private function __construct(){}
    private function __clone(){}
    private function __wakeup(){}
	
    public static function getInstance()
    {
        static $instance = null; 	
        if (is_null($instance)) {
            $instance = new helper();
        }
        return $instance;   
    }

    public function hello(){
    	echo "hello";
    }

    public function get_employeeSalary_data($id){
    	$employee = Employee::where('id',$id)->first();
    	if($employee->last_month == 0){
		    $custom = strtotime($employee->created_at);
		    $from_year = date('Y',$custom);
		    $from_month = date('m',$custom);
		    $to_year = date('Y',time());
		    $to_month = date('m',time());
		    $remaind = ($to_year - $from_year) * 12 + ($to_month -  $from_month);
		    $final_salary =  $remaind * $employee->salary;
		}else{
		    $year = date('Y',time());
		    $month = date('m',time());
		    $remaind = $year - $employee->last_year;
		    $remaind = $remaind * 12 + ($month -  $employee->last_month);
		   	$final_salary =  $remaind * $employee->salary;
  		}
  		return ['month_payed'=>$employee->month_number,'name'=>$employee->name,'month_will_payed'=>$remaind,'money'=>$final_salary];
    }



    public function get_secratrySalary_data($id){
    	$secratry = Secretary::join('staff', 'staff.id',   '=', 'secretaries.staff_id')->where('secretaries.id',$id)->select('secretaries.id as secratryID','secretaries.salary','secretaries.last_month','secretaries.last_year','secretaries.month_number','staff.name','staff.created_at')->first();

    	if($secratry->last_month == 0){
		    $custom = strtotime($secratry->created_at);
		    $from_year = date('Y',$custom);
		    $from_month = date('m',$custom);
		    $to_year = date('Y',time());
		    $to_month = date('m',time());
		    $remaind = ($to_year - $from_year) * 12 + ($to_month -  $from_month);
		    $final_salary =  $remaind * $secratry->salary;
		}else{
		    $year = date('Y',time());
		    $month = date('m',time());
		    $remaind = $year - $secratry->last_year;
		    $remaind = $remaind * 12 + ($month -  $secratry->last_month);
		   	$final_salary =  $remaind * $secratry->salary;
  		}
  		return ['month_payed'=>$secratry->month_number,'name'=>$secratry->name,'month_will_payed'=>$remaind,'money'=>$final_salary];
    }





    public function get_detectnumber_fordoctor($id){
    	$dect_number = Detection::where('doctor_id',$id)->where('finish','1')->where('price','>',0.0)->count();
  		return $dect_number;
    }

    public function get_doctorSalary_data($id){
    	$doctor = Doctor::join('staff', 'staff.id',   '=', 'doctors.staff_id')->where('doctors.id',$id)->first();
    	$dect_number = Detection::where('doctor_id',$id)->where('finish','1')->where('price','>',0.0)->count();
    	return ['dect_payed'=>$doctor->payedDetections,'name'=>$doctor->name,'dect_will_payed'=>$dect_number - $doctor->payedDetections,'money'=>($dect_number - $doctor->payedDetections) * $doctor->Dectsalary];
    }


    public function get_all_stff(){
        return User::whereNotIn('id',[Auth::user()->id])->get();
    }




}