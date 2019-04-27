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
class salaryController extends Controller
{
    





    // Salary of employee
    public function index_employee(salaryEmployeeDatatable $datatable){ 
        return $datatable->render('dashboard.fr.salary.employee');
    }

    public function employee_pay_salary($id){ 
         $helper = helper::getInstance();
         session()->flash('add_success',trans('admin.employee_paysalary_success_msg',['monthes'=>$helper->get_employeeSalary_data($id)['month_will_payed'],'name'=>$helper->get_employeeSalary_data($id)['name'],'money'=>$helper->get_employeeSalary_data($id)['money']]));
         $salary_employee = new contextStrategy(new salaryEmployee);
         $salary_employee->executeStrategy($id);
         return redirect('/dashboard/fr/salary/employee');
    }

















    // Salary of secratry
    public function index_secretary(salarySecratryDatatable $datatable){
         return $datatable->render('dashboard.fr.salary.secratry');
    }

    public function secratry_pay_salary($id){
         $helper = helper::getInstance();
         session()->flash('add_success',trans('admin.secratry_paysalary_success_msg',['monthes'=>$helper->get_secratrySalary_data($id)['month_will_payed'],'name'=>$helper->get_secratrySalary_data($id)['name'],'money'=>$helper->get_secratrySalary_data($id)['money']]));
         $salary_employee = new contextStrategy(new salarySecratry);
         $salary_employee->executeStrategy($id);
         return redirect('/dashboard/fr/salary/secretary');
    }



    // Salary of secratry
    public function index_doctor(salaryDoctorDatatable $datatable){
         return $datatable->render('dashboard.fr.salary.doctor');
    }

    public function doctor_pay_salary($id){
         $helper = helper::getInstance();
         session()->flash('add_success',trans('admin.doctor_paysalary_success_msg',['detections'=>$helper->get_doctorSalary_data($id)['dect_will_payed'],'name'=>$helper->get_doctorSalary_data($id)['name'],'money'=>$helper->get_doctorSalary_data($id)['money']]));
         $salary_doctor = new contextStrategy(new salaryDoctor);
         $salary_doctor->executeStrategy($id);
            return redirect('/dashboard/fr/salary/doctor');
    }





}
