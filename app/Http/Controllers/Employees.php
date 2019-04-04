<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use App\Employee;
use App\DataTables\EmployeeDatatable;
use Auth;
class Employees extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(EmployeeDatatable $datatabele)
    {
        if(Auth::user()->role == 1 && get_second_role(Auth::user()->id) == 1){
        return $datatabele->render('dashboard.admin.Employee.index');
    }elseif(Auth::user()->role == 1 && get_second_role(Auth::user()->id) == 2){
        return $datatabele->render('dashboard.hr.Employee.index');
    }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    
       if(Auth::user()->role == 1 && get_second_role(Auth::user()->id) == 1){
        return view('dashboard.admin.Employee.create');
    }elseif (Auth::user()->role == 1 && get_second_role(Auth::user()->id) == 2){
        return view('dashboard.hr.Employee.create');
    }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



        $data = $this->validate(request(),[
            'name' =>'required|max:30|min:4',
            'mobile' => 'sometimes|nullable',
            'address'=>'sometimes|nullable|min:5|max:50',
            'salary' => 'required',
            'start_at' => 'sometimes|nullable',
            'end_at' => 'sometimes|nullable',
            'birthDate' => 'required',
            'weekend'=>'required',
            'gender' => 'required',
            'title' => 'required',
        ]);
        

        $date_arr = explode("/",$data['birthDate']);
        $data['birthDate'] =  $date_arr[2]."-".$date_arr[1]."-".$date_arr[0];
        Employee::create($data);
         session()->flash('add_success',"added is done");
         if(Auth::user()->role == 1 && get_second_role(Auth::user()->id) == 1){
        return redirect('/dashboard/admin/controll/employee');
    }elseif (Auth::user()->role == 1 && get_second_role(Auth::user()->id) == 2){
        return redirect('/dashboard/hr/controll/employee');
    }
                 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
         $employee =  Employee::where('employees.id',$id)->select('employees.id as employeeID',
            'employees.name','employees.mobile','employees.address','employees.gender','employees.birthDate','employees.start_at','employees.end_at','employees.weekend','employees.salary','employees.title'
        )->first();


         if(Auth::user()->role == 1 && get_second_role(Auth::user()->id) == 1){ 
        return view('dashboard.admin.employee.edit',compact('employee'));
    }elseif(Auth::user()->role == 1 && get_second_role(Auth::user()->id) == 2){
        return view('dashboard.hr.employee.edit',compact('employee'));
    }
       }

    public function update($id){

            $data = $this->validate(request(),[
            'name' =>'required|max:30|min:4',
            'mobile' => 'sometimes|nullable',
            'address'=>'sometimes|nullable|min:5|max:50',
            'start_at' => 'sometimes|nullable',
            'end_at' => 'sometimes|nullable',
            'birthDate' => 'required',
            'weekend'=>'required',
            'gender' => 'required',
            'salary' => 'required',
            'title' => 'required',

        ]);
        $date_arr = explode("/",$data['birthDate']);
        $data['birthDate'] =  $date_arr[2]."-".$date_arr[1]."-".$date_arr[0];
        Employee::where('id',$id)->update($data);
        
        session()->flash('update_success','update is done');
        if(Auth::user()->role == 1 && get_second_role(Auth::user()->id) == 1){
        return redirect('/dashboard/admin/controll/employee'); 
    }elseif (Auth::user()->role == 1 && get_second_role(Auth::user()->id) == 2){
        return redirect('/dashboard/hr/controll/employee');
    }
       }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $secretary = Employee::find($id)->delete();
        session()->flash('delete_success',"Employee is deleted");
        if(Auth::user()->role == 1 && get_second_role(Auth::user()->id) == 1){
        return redirect('dashboard/admin/controll/employee');
    }elseif(Auth::user()->role == 1 && get_second_role(Auth::user()->id) == 2){
        return redirect('dashboard/hr/controll/employee');
    }
       }
}
