<?php
	Route::group(['prefix'=>'/dashboard/secratry'], function(){
		Route::get('/profile',function(){
			return view('dashboard.secratry.profile');
		});

		// controll profile
  		Route::post('/change/password','staff@change_password');
  		Route::post('/change/account','staff@change_account');
  		Route::post('/change/image','staff@change_image');

  		// contoll patient
  		Route::resource('/controll/patient','patientController');
  		Route::get('/controll/detection/create','patientController@add_dection');
  		Route::get('/controll/detection/today','patientController@today_dection');
  		Route::get('/controll/detection/notpull','patientController@notpull_dection');
  		Route::get('/controll/detection/notpull/delete/all','patientController@notpull_delete_all');
  		Route::delete('/controll/detection/notpull/{id}','patientController@notpull_dection_destory');
  		Route::post('/controll/detection/create','patientController@add_dection_post');
  		
  		Route::get('/controll/detection/today/send/{id}','patientController@sendto_doctor');
  		

	});


	
?>