<?php
  function get_role($role,$secondRole = null){
  	if($role == 1){
  		if($secondRole == 1 | $secondRole == null){
  			return 'Admin';	
  		} else if($secondRole == 2){
  			return 'HR';	
  		} else if($secondRole == 3){
  			return 'FR';
  		}
  	}else if($role == 2){
  		return 'Doctor';
  	}else if($role == 3){
  		return 'Secratry';
  	}
  }

  function validate_img($exte = null){
    if($exte == null){
      return 'image|mimes:jpg,jpeg,png,gif';
    }else{
      return 'image|mimes:'.$exte;
    }
  }


  function get_second_role($staff_id){
  	$admin = App\Admin::where('staff_id',$staff_id)->first();
  	return $admin->role;
  }


  function get_admin($staff_id){
  	$admin = App\Admin::where('staff_id',$staff_id)->first();
  	return $admin;
  }

  function days(){
    return [
        'friday'=>'Friday',
        'saturday'=>'Saturday',
        'sunday'=>'Sunday',
        'monday'=>'Monday',
        'tuesday'=>'Tuesday',
        'wednesday'=>'Wednesday',
        'thursday'=>'Thursday',
    ];
  }

  function titles(){
    return [
        'security' => 'security',
        'nurse' => 'nurse',
        'office boy' => 'office boy',
        'cleaning' => 'cleaning',
        'techniql' => 'techniql',
        'reception' => 'reception',
        'call center' => 'call center',
        'other' => 'other',
    ];
  }

  function  position(){

     return [
        'Team Leader'=>'Team Leader',
        'Manager'=>'Manager',
        'Member'=>'Member',
        'Under Testing'=>'Under Testing'
    ];
  }

 function get_settings(){
  return \App\Setting::orderBy('id','desc')->first();
 }



?>
