<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exchange;
use App\DataTables\exchangeDatatable;
class exchangeController extends Controller
{
	public function index(exchangeDatatable $datatable){
		 return $datatable->render('dashboard.fr.exchange.index');
	}
    public function create(){
    	return view('dashboard.fr.exchange.create');
    }
    public function store(){
    	 $data = $this->validate(request(),[
            'name' => 'required|unique:exchanges|min:4|max:30',
            'value' =>'required|numeric|min:10|max:100000000000',
            'type'=>'required|in:standard,varient',
            'category'=>'required',
            'peroid_type'=>'required',
            'day'=>'sometimes|numeric|min:1|max:31',
            'month'=>'sometimes|numeric|min:1|max:12',
            'year'=>'sometimes|numeric|min:1900|max:2099',
        ]);
    	 Exchange::create($data);
    	 session()->flash('add_success',trans('admin.exchange_add_success_msg'));
    	 return redirect('dashboard/fr/controll/exchange');
    }

     public function edit($id){
         	$exchange =  Exchange::find($id); 
           return view('dashboard.fr.exchange.edit',compact('exchange'));
        
   	}

    public function update($id){
            $data = $this->validate(request(),[
            'name' => 'required|unique:exchanges|min:4|max:30',
            'value' =>'required|numeric|min:10|max:100000000000',
            'type'=>'required|in:standard,varient',
            'category'=>'required',
            'peroid_type'=>'required',
            'day'=>'sometimes|numeric|min:1|max:31',
            'month'=>'sometimes|numeric|min:1|max:12',
            'year'=>'sometimes|numeric|min:1900|max:2099',
        ]);
       
        Exchange::where('id',$id)->update($data);
        session()->flash('update_success',trans('admin.exchange_update_success_msg'));
        return redirect('dashboard/fr/controll/exchange');
      
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        Exchange::find($id)->delete();
        session()->flash('delete_success',trans('admin.exchange_delete_success_msg'));
        return redirect('dashboard/fr/controll/exchange');
       
   }
}
