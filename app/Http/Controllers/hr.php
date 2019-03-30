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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
