<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use App\Doctor;
use App\DataTables\DoctorDatatable;
use Auth;
class doctors extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DoctorDatatable $datatable)
    {
        return $datatable->render('dashboard.admin.doctor.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.Doctor.create');
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
            'email' => 'required|email|unique:staff',
            'name' =>'required|max:30|min:4',
            'password' =>'required|min:6|max:20',
            'mobile' => 'sometimes|nullable',
            'address'=>'sometimes|nullable|min:5|max:50',
            'start_at' => 'sometimes|nullable',
            'end_at' => 'sometimes|nullable',
            'birthDate' => 'required',
            'weekend'=>'required',
            'gender' => 'required',
        ]);
        
        


        $date_arr = explode("/",$data['birthDate']);
        $data['birthDate'] =  $date_arr[2]."-".$date_arr[1]."-".$date_arr[0];
        $data['password'] = Hash::make(request('password'));
        $data['role'] = 2;
        $id = User::create($data)->id;

        $doctor_data = $this->validate(request(),[
            'position' => 'required',
            'experience' => 'required',
            'Dectsalary'=>'required|numeric',
            'qualification' => 'required',
            'specail' => 'required'
        ]);
        $doctor_data['staff_id'] = $id;
        Doctor::create($doctor_data);
        session()->flash('add_success',"added is done");
        return redirect('/dashboard/admin/controll/doctor');        
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
         $doctor =  Doctor::join('staff', 'staff.id',   '=', 'doctors.staff_id')->where('staff.id',$id)->select('doctors.id as doctorsID','staff.id',
            'staff.email','staff.name','staff.mobile','staff.address','staff.gender','staff.birthDate','staff.start_at','staff.end_at','staff.weekend','doctors.Dectsalary','doctors.experience','doctors.qualification','doctors.specail','doctors.position'
        )->first();
         if(Auth::user()->role == 1 && get_second_role(Auth::user()->id) == 1){ 
        return view('dashboard.admin.doctor.edit',compact('doctor'));
    }elseif(Auth::user()->role == 1 && get_second_role(Auth::user()->id) == 2){
        return view('dashboard.hr.doctor.edit',compact('doctor'));
    }
       }

    public function update($id){

            $data = $this->validate(request(),[
            'email' => 'required|email|unique:staff,email,'.$id,
            'name' =>'required|max:30|min:4',
            'mobile' => 'sometimes|nullable',
            'address'=>'sometimes|nullable|min:5|max:50',
            'start_at' => 'sometimes|nullable',
            'end_at' => 'sometimes|nullable',
            'birthDate' => 'required',
            'weekend'=>'required',
            'gender' => 'required',

        ]);
        $date_arr = explode("/",$data['birthDate']);
        $data['birthDate'] =  $date_arr[2]."-".$date_arr[1]."-".$date_arr[0];
        User::where('id',$id)->update($data);


        $data2 = $this->validate(request(),[
            'position' => 'required',
            'experience' => 'required',
            'Dectsalary'=>'required|numeric',
            'qualification' => 'required',
            'specail' => 'required'
            
        ]);
        Doctor::where('id', request('doctorsID'))->update($data2);
        session()->flash('update_success','update is done');
        if(Auth::user()->role == 1 && get_second_role(Auth::user()->id) == 1){
        return redirect('/dashboard/admin/controll/doctor'); 
    }elseif (Auth::user()->role == 1 && get_second_role(Auth::user()->id) == 2) {
        return redirect('/dashboard/hr/controll/doctor');
    }
       }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $doctor = User::find($id)->delete();
        session()->flash('delete_success',"Doctor is deleted");
        if(Auth::user()->role == 1 && get_second_role(Auth::user()->id) == 1){
        return redirect('dashboard/admin/controll/doctor');
    }elseif(Auth::user()->role == 1 && get_second_role(Auth::user()->id) == 2){
        return redirect('dashboard/hr/controll/doctor');
    }
       }
}
