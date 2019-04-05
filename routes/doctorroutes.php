<?php
	Route::group(['prefix'=>'/dashboard/doctor'], function(){
		
		Route::get('/index',function(){
			return view('dashboard.doctor.index');
		});

		Route::get('/profile',function(){
			return view('dashboard.doctor.profile');
		});
		
		// controll profile
  		Route::post('/change/password','staff@change_password');
  		Route::post('/change/account','staff@change_account');
  		Route::post('/change/image','staff@change_image');
	});

	
?>