<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Hash;
use App\User;
use Up;
class staff extends Controller
{
	public function login_post(Request $req){
		$rember = $req->has('rember') && $req->rember == 1 ?true:false;		
		if( Auth::attempt(['email'=> $req->email,'password'=>$req->password],$rember)){
			if(Auth::user()->role == 1){
				$second_role = get_second_role(Auth::user()->id);
				if ($second_role == 1){
					return redirect('/dashboard/admin/index');
				}else if($second_role == 2){
					return redirect('/dashboard/hr/index');
				}else if($second_role == 3){
					return redirect('/dashboard/fr/index');
				}
			}else if(Auth::user()->role == 2){
				return redirect('/dashboard/doctor/index');
			}else if(Auth::user()->role == 3){
				return redirect('/dashboard/secratry/index');
			}
		}else{
			session()->flash('error_message','incorrect info');
			return back();
		}
	}

	public function logout(){
    	Auth::guard('web')->logout();
    	return redirect('dashboard/login');
	}

	public function change_password(){
		$data = $this->validate(request(),[
			'oldpassword'=>'required',
			'password' => 'required|string|min:6|confirmed',
		]);
		$naw_data = ['password'=>Hash::make(request('password'))];
		if (Hash::check(request('oldpassword'), Auth::user()->password)){
    		User::where('id',Auth::user()->id)->update($naw_data);
    		session()->flash('update_success',trans('admin.update_success_msg'));
		}else{
    		session()->flash('update_success','enter old password correct');
		}		
        return back();
	}

	public function change_account(Request $req){
		$data = $this->validate(request(),[
			'name'=>'required|min:4',
			'email' => 'required|email|unique:staff,email,'.Auth::user()->id,
			'birthDate' => 'required',
			'mobile'=>'required',
			'address'=>'required|min:4',
		]);
		$date_arr = explode("/",$data['birthDate']);
        $data['birthDate'] =  $date_arr[2]."-".$date_arr[1]."-".$date_arr[0];
		$check = $req->has('check') && $req->check == 1 ?true:false;
		if ($check){
    		User::where('id',Auth::user()->id)->update($data);
    		session()->flash('update_success',trans('admin.update_success_msg'));
		}else{
    		session()->flash('update_success','please agree on term');
		}		
        return back();
	}


	public function change_image(){
		$data = $this->validate(request(),[
            'image' => 'required|image'
    	]);
		if(request()->has('image')){
            if(Auth::user()->image != null){
            	$data['image'] = Up::single_upload(['delete_file'=>Auth::user()->image,'new_name'=> true,'path'=>'staff_img','file'=>'image']);
            }else{
           		 $data['image'] = Up::single_upload(['new_name'=> true,'path'=>'staff_img','file'=>'image']); 		
            }
            User::where('id',Auth::user()->id)->update($data);
    		session()->flash('update_success',trans('admin.update_success_msg'));
        }
        return back();	
	}


}