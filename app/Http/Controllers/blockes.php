<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Admin;
use App\DataTables\blockesDatatable;
class blockes extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(blockesDatatable $datatable)
    {
        return $datatable->render('dashboard.admin.blockers');
    }

 
    public function edit($id){    
        
        User::where('id',$id)->update(['block'=>'0']);
        return redirect('/dashboard/admin/controll/blocked'); 
    }

}
