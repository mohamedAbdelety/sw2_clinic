<?php
  function get_role($role,$secondRole = null){
  	if($role == 1){
  		if($secondRole == 1 | $secondRole == null){
  			return 'Admin';	
  		} else if($secondRole == 2){
  			return 'HR';	
  		} else if($secondRole == 2){
  			return 'FR';
  		}
  	}else if($role == 2){
  		return 'Doctor';
  	}else if($role == 3){
  		return 'Secratry';
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

  function  position(){

     return [
        'Team Leader'=>'Team Leader',
        'Manager'=>'Manager',
        'Member'=>'Member',
        'Under Testing'=>'Under Testing'
    ];
  }






?>
