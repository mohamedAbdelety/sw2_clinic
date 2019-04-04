<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use Up;
use DB;
class SettingController extends Controller
{
    public function index(){
    	return view('dashboard.admin.setting');
    }
    public function setting_save(){
    	
    	if(request('blockmail')[0] != null){
    		foreach (request('blockmail') as $value) {
    			DB::table('staff')
            	->where('email', $value)
            	->update(['block' => '1']);
    		}
    	}
    	$data = $this->validate(request(),[
    		'logo' => 'sometimes|nullable|image|mimes:jpg,jpeg,png',
            'status' => 'required',
            'sitename' => 'required|min:3',
            'description' => 'required|min:30',
            'keywords'=>'required|min:10',
            'main_lang' => 'required|in:en,ar,fr,es',
            'message_maintance_frontend'=>'required|min:20',
            'message_maintance_backend'=>'required|min:20',
    	]);
    	if(request('status') == 8){
    		 unset($data['status']);
    	}
    	if(Setting::count() != 0){
    		// setting exisit
    		if(request()->has('logo')){
    			// upload with class
    			$data['logo'] = Up::single_upload(['new_name'=> true,'path'=>'settings','file'=>'logo','delete_file'=>get_settings()->logo]);
    		}
    		Setting::orderBy('id','desc')->update($data);
    		session()->flash('success_setting',trans('admin.success_setting_msg'));
    		return redirect('dashboard/admin/website/setting');
    	}else{
    		if(request()->has('logo')){
    			// upload with class
    			$data['logo'] = Up::single_upload(['new_name'=> true,'path'=>'settings','file'=>'logo']);
    		}
    		Setting::create($data);
    		session()->flash('success_setting',trans('admin.success_setting_msg'));
    		return redirect('dashboard/admin/website/setting');
    	}
    	
    	
    	
    	
    }
}
