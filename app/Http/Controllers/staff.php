<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Hash;
use App\User;

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
}