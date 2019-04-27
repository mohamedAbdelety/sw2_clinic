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


  function get_doctorid_forsecratry($staff_id){
    $secratry = App\Secretary::where('staff_id',$staff_id)->first();
    return $secratry->doctor_id;
  }

  function get_doctorname_forsecratry($staff_id){
    $secratry = App\Secretary::where('staff_id',$staff_id)->first();
    $doctor = App\Doctor::where('id',$secratry->doctor_id)->first();
    $staff = App\User::where('id',$doctor->staff_id)->first();
    return $staff->name;
  }

  function all_patients(){
    $arr = App\Patient::pluck('name','id');
    return $arr;  
  }

   function get_doctorprice_forsecratry($staff_id){
    $secratry = App\Secretary::where('staff_id',$staff_id)->first();
    $doctor = App\Doctor::where('id',$secratry->doctor_id)->first();
    return $doctor->Dectsalary;
  }

   function get_doctorby_id($id){
    $doctor = App\Doctor::where('id',$id)->first();
    $staff = App\User::where('id',$doctor->staff_id)->first();
    return $staff->name;
  }


  function get_doctorid($staff_id){
    $doctor = App\Doctor::where('staff_id',$staff_id)->first();
    return $doctor->id;
  }

  function get_staffid_for_doctorid($doctor_id){
    $doctor = App\Doctor::where('id',$doctor_id)->first();
    return $doctor->staff_id;
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
