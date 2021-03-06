<?php
	Route::group(['prefix'=>'/dashboard/hr'], function(){
		
		Route::get('/index','reportController@hr_report');
		
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
  		// controll Secretary
  		Route::resource('/controll/secretary','secretaries');
  		Route::delete('secratery/destory/all','doctors@destory_all');
  		// controll Employee
      	Route::resource('/controll/employee','employees');
      	Route::delete('employee/destory/all','employees@destory_all');
	});

	

	
?>
