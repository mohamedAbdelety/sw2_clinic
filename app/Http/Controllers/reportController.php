<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use App\Doctor;
use App\DataTables\salaryEmployeeDatatable;
use App\DataTables\salarySecratryDatatable;
use App\DataTables\salaryDoctorDatatable;
use Auth;
use App\Http\Controllers\contextStrategy;
use App\Http\Controllers\salaryEmployee;
use App\Http\Controllers\salaryDoctor;
use App\helper\helper;
use App\Http\Controllers\reportFactory;
class reportController extends Controller
{
    


    // report for FR
    public function fr_report(){ 
        $reportFact = new reportFactory();
        $fr_report = $reportFact->getReport("fr");
        $arr = $fr_report->report();
        return view('dashboard.fr.index',['detection_today'=>$arr[0],'detection_today_price'=>$arr[1],'detection_payed_today'=>$arr[2],'detection_price_payed_today'=>$arr[3],'detection_all'=>$arr[4],'detection_all_price'=>$arr[5],'exchange_standard'=>$arr[6],'exchange_varient'=>$arr[7],'exchange_standard_daily'=>$arr[8],'exchange_standard_monthly'=>$arr[9],'exchange_standard_yearly'=>$arr[10],'exchange_all'=>$arr[11],'employee_salary'=>$arr[12],'secratry_salary'=>$arr[13],'employee_count'=>$arr[14],'secratry_count'=>$arr[15],'doctor_count'=>$arr[16],'doctor_max_dectsalary'=>$arr[17],'employee_salary_payable'=>$arr[18],'secratry_salary_payable'=>$arr[19],'doctor_salary_payable'=>$arr[20],'another_fr'=>$arr[21]]);
    }




    // report for Doctor
    public function doctor_report(){ 
        $reportFact = new reportFactory();
        $fr_report = $reportFact->getReport("doctor");
        $arr = $fr_report->report();
        return view('dashboard.doctor.index',['detection_count'=>$arr[0],'observation_count'=>$arr[1],'patient_count'=>$arr[2],'another_doctor_specail'=>$arr[3],'x1'=>$arr[4],'x2'=>$arr[5],'x3'=>$arr[6],'x4'=>$arr[7],'x5'=>$arr[8],'x6'=>$arr[9],'x7'=>$arr[10],'x8'=>$arr[11],'x9'=>$arr[12],'x10'=>$arr[13],'x11'=>$arr[14],'x12'=>$arr[15],'y1'=>$arr[16],'y2'=>$arr[17],'y3'=>$arr[18],'y4'=>$arr[19],'y5'=>$arr[20],'y6'=>$arr[21],'y7'=>$arr[22],'y8'=>$arr[23],'y9'=>$arr[24],'y10'=>$arr[25],'y11'=>$arr[26],'y12'=>$arr[27]]);
    }



    // report for HR
    public function hr_report(){     	
        $reportFact = new reportFactory();
        $fr_report = $reportFact->getReport("hr");
        $arr = $fr_report->report();
        return view('dashboard.hr.index',['doctor_count'=>$arr[0],'fr_count'=>$arr[1],'another_hr_count'=>$arr[2],'secratry_count'=>$arr[3],'patient_count'=>$arr[4],'employee_count'=>$arr[5],'detection_count'=>$arr[6],'observation_count'=>$arr[7],'x1'=>$arr[8],'x2'=>$arr[9],'x3'=>$arr[10],'x4'=>$arr[11],'x5'=>$arr[12],'y1'=>$arr[13],'y2'=>$arr[14],'y3'=>$arr[15],'y4'=>$arr[16],'y5'=>$arr[17]]);
    }


    public function admin_report(){
        $reportFact = new reportFactory();
        $fr_report = $reportFact->getReport("admin");
        $arr = $fr_report->report();
        return view('dashboard.admin.index',['doctor_count'=>$arr[0],'fr_count'=>$arr[1],'another_hr_count'=>$arr[2],'secratry_count'=>$arr[3],'patient_count'=>$arr[4],'employee_count'=>$arr[5],'detection_count'=>$arr[6],'observation_count'=>$arr[7],'x1'=>$arr[8],'x2'=>$arr[9],'x3'=>$arr[10],'x4'=>$arr[11],'x5'=>$arr[12],'y1'=>$arr[13],'y2'=>$arr[14],'y3'=>$arr[15],'y4'=>$arr[16],'y5'=>$arr[17],'block_count'=>$arr[18],'exchange_annual'=>$arr[19],'detection_year_price'=>$arr[20],'detection_all_price'=>$arr[21],'x6'=>$arr[22],'x7'=>$arr[23],'x8'=>$arr[24],'x9'=>$arr[25],'x10'=>$arr[26],'x11'=>$arr[27],'x12'=>$arr[28],'x13'=>$arr[29],'x14'=>$arr[30],'x15'=>$arr[31],'x16'=>$arr[32],'x17'=>$arr[33],'y6'=>$arr[34],'y7'=>$arr[35],'y8'=>$arr[36],'y9'=>$arr[37],'y10'=>$arr[38],'y11'=>$arr[39],'y12'=>$arr[40],'y13'=>$arr[41],'y14'=>$arr[42],'y15'=>$arr[43],'y16'=>$arr[44],'y17'=>$arr[45]]);
    }


}
