<?php
	Route::group(['prefix'=>'/dashboard/admin'], function(){
		
		Route::get('/index','reportController@admin_report');

		Route::get('/test',function(){
			return view('dashboard.admin.hr.edit');
		});

		Route::get('/profile',function(){
			return view('dashboard.admin.profile');
		});

		// controll HR
  		Route::resource('/controll/hr','hr');
  		Route::delete('hr/destory/all','hr@destory_all');

  		// controll profile
  		Route::post('/change/password','staff@change_password');
  		Route::post('/change/account','staff@change_account');
  		Route::post('/change/image','staff@change_image');
		
  		// controll FR
  		Route::resource('/controll/fr','fr');
  		Route::delete('fr/destory/all','fr@destory_all');
  		// controll Doctor
  		Route::resource('/controll/doctor','doctors');
  		Route::delete('doctors/destory/all','doctors@destory_all');
  		// controll Secretary
  		Route::resource('/controll/secretary','secretaries');
  		Route::delete('secratery/destory/all','doctors@destory_all');
      // controll Employee
      Route::resource('/controll/employee','employees');
      Route::delete('employee/destory/all','employees@destory_all');
      
      // controll website setting
      Route::get('/website/setting','SettingController@index');
      Route::post('/website/setting','SettingController@setting_save');

       // controll blocked
      Route::resource('/controll/blocked','blockes');
      Route::get('/controll/blocked/active/all','blockes@active_all');
      
      
	});


  
?>
