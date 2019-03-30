<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use App\Admin;
use App\DataTables\HRDatatable;
class hr extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(HRDatatable $datatable)
    {
        return $datatable->render('dashboard.admin.hr.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.hr.create');
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

        ]);
        
        


        $date_arr = explode("/",$data['birthDate']);
        $data['birthDate'] =  $date_arr[2]."-".$date_arr[1]."-".$date_arr[0];
        $data['password'] = Hash::make(request('password'));
        $data['role'] = 1;
        $id = User::create($data)->id;

        $admin_data = $this->validate(request(),[
            'position' => 'required',
            'salary'=>'required|numeric|min:500|max:1000000',
        ]);
        $admin_data['role'] = 2;
        $admin_data['staff_id'] = $id;
        Admin::create($admin_data);
        session()->flash('add_success',"added is done");
        return redirect('/dashboard/admin/controll/hr');        
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

        $hr =  Admin::join('staff', 'staff.id',   '=', 'admins.staff_id')->where('staff.id',$id)->select('admins.id as adminID','staff.id',
            'staff.email','staff.name','staff.mobile','staff.address','staff.gender','staff.birthDate','staff.start_at','staff.end_at','staff.weekend','admins.salary','admins.position'
        )->first();
        return view('dashboard.admin.hr.edit',compact('hr'));
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

        ]);
        $date_arr = explode("/",$data['birthDate']);
        $data['birthDate'] =  $date_arr[2]."-".$date_arr[1]."-".$date_arr[0];
        User::where('id',$id)->update($data);


        $data2 = $this->validate(request(),[
            'salary' => 'required|numeric|min:500',
            'position' =>'required',
            
        ]);
        Admin::where('id', request('adminID'))->update($data2);
        session()->flash('update_success','update is done');
        return redirect('/dashboard/admin/controll/hr'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $hr = User::find($id)->delete();
        session()->flash('delete_success',"Hr is deleted");
        return redirect('dashboard/admin/controll/hr'); 
    }
}
