<?php
	Route::group(['prefix'=>'/dashboard/hr'], function(){
		
		Route::get('/index',function(){
			return view('dashboard.hr.index');
		});
		
		Route::get('/profile',function(){
			return view('dashboard.hr.profile');
		});

		// controll profile
  		Route::post('/change/password','staff@change_password');
  		Route::post('/change/account','staff@change_account');
  		Route::post('/change/image','staff@change_image');
		
		// controll Doctor
  		Route::resource('/controll/doctor','doctors');
  		Route::delete('doctors/destory/all','doctors@destory_all');	
	});

	

	
?>
