<?php
	Route::group(['prefix'=>'/dashboard/doctor'], function(){
		
		Route::get('/index','reportController@doctor_report');
		Route::get('/profile',function(){
			return view('dashboard.doctor.profile');
		});
		
		// controll profile
  		Route::post('/change/password','staff@change_password');
  		Route::post('/change/account','staff@change_account');
  		Route::post('/change/image','staff@change_image');

  		// controll patient
  		Route::get('/controll/patient/show','doctor_patient@show');
  		Route::get('/controll/patient/detection/today','doctor_patient@detection_today');
  		Route::get('/controll/patient/detectnow','doctor_patient@detection_now_get');
  		Route::post('/controll/patient/detectnow','doctor_patient@detection_now_post');
	});

	
?>