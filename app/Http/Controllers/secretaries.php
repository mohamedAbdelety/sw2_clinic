<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use App\Secretary;
use App\Doctor;
use App\DataTables\SecretaryDatatable;
use Auth;
class secretaries extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SecretaryDatatable $datatabele)
    {
        if(Auth::user()->role == 1 && get_second_role(Auth::user()->id) == 1){
        return $datatabele->render('dashboard.admin.Secretary.index');
    }elseif(Auth::user()->role == 1 && get_second_role(Auth::user()->id) == 2){
        return $datatabele->render('dashboard.hr.secretary.index');
    }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $doctor =  Doctor::join('staff', 'staff.id',   '=', 'doctors.staff_id')->select('doctors.id as doctorsID','staff.name')->get();
          
          $Name_Id=[];
          $count = 0;
          foreach ($doctor as $doc) {
              $Name_Id[$count] = $doc->doctorsID."-".$doc->name;
              $count++;
          }
                

       if(Auth::user()->role == 1 && get_second_role(Auth::user()->id) == 1){
        return view('dashboard.admin.Secretary.create',compact('Name_Id'));
    }elseif (Auth::user()->role == 1 && get_second_role(Auth::user()->id) == 2){
        return view('dashboard.hr.Secretary.create',compact('Name_Id'));
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
        $data['role'] = 3;
        $id = User::create($data)->id;
       

        $secretary_data = $this->validate(request(),[
            'salary' => 'required',
            'doctor_id' => 'required',
            'qualification' => 'required',
        ]);
        $DocID = explode("-",$secretary_data['doctor_id']);
        $secretary_data['doctor_id'] = $DocID[0];


        $secretary_data['staff_id'] = $id;
         Secretary::create($secretary_data);
         session()->flash('add_success',"added is done");
         if(Auth::user()->role == 1 && get_second_role(Auth::user()->id) == 1){
        return redirect('/dashboard/admin/controll/secretary');
    }elseif (Auth::user()->role == 1 && get_second_role(Auth::user()->id) == 2){
        return redirect('/dashboard/hr/controll/secretary');
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
         $secretary =  Secretary::join('staff', 'staff.id',   '=', 'secretaries.staff_id')->where('staff.id',$id)->select('secretaries.id as secretaryID','staff.id',
            'staff.email','staff.name','staff.mobile','staff.address','staff.gender','staff.birthDate','staff.start_at','staff.end_at','staff.weekend','secretaries.salary','secretaries.doctor_id','secretaries.qualification'
        )->first();

         $doctor =  Doctor::join('staff', 'staff.id',   '=', 'doctors.staff_id')->select('doctors.id as doctorsID','staff.name')->get();
          
          $Name_Id=[];
          $count = 0;
          foreach ($doctor as $doc) {
              $Name_Id[$count] = $doc->doctorsID."-".$doc->name;
              $count++;
          }


         if(Auth::user()->role == 1 && get_second_role(Auth::user()->id) == 1){ 
        return view('dashboard.admin.secretary.edit',compact('secretary','Name_Id'));
    }elseif(Auth::user()->role == 1 && get_second_role(Auth::user()->id) == 2){
        return view('dashboard.hr.secretary.edit',compact('secretary','Name_Id'));
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


        $secretary_data = $this->validate(request(),[
            'salary' => 'required',
            'doctor_id' => 'required',
            'qualification' => 'required',
        ]);
        $DocID = explode("-",$secretary_data['doctor_id']);
        $secretary_data['doctor_id'] = $DocID[0];

        Secretary::where('id', request('secretaryID'))->update($secretary_data);
        session()->flash('update_success','update is done');
        if(Auth::user()->role == 1 && get_second_role(Auth::user()->id) == 1){
        return redirect('/dashboard/admin/controll/secretary'); 
    }elseif (Auth::user()->role == 1 && get_second_role(Auth::user()->id) == 2) {
        return redirect('/dashboard/hr/controll/secretary');
    }
       }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $secretary = User::find($id)->delete();
        session()->flash('delete_success',"Secretary is deleted");
        if(Auth::user()->role == 1 && get_second_role(Auth::user()->id) == 1){
        return redirect('dashboard/admin/controll/secretary');
    }elseif(Auth::user()->role == 1 && get_second_role(Auth::user()->id) == 2){
        return redirect('dashboard/hr/controll/secretary');
    }
       }
}
