<?php
	Route::group(['prefix'=>'/dashboard/secratry'], function(){
		
		Route::get('/index',function(){
			return view('dashboard.secratry.index');
		});
		
		Route::get('/profile',function(){
			return view('dashboard.secratry.profile');
		});

		// controll profile
  		Route::post('/change/password','staff@change_password');
  		Route::post('/change/account','staff@change_account');
  		Route::post('/change/image','staff@change_image');

	});


	
?>