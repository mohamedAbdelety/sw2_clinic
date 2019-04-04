<?php
	Route::group(['prefix'=>'/dashboard/fr'], function(){
		
		Route::get('/index',function(){
			return view('dashboard.fr.index');
		});

		// controll profile
  		Route::post('/change/password','staff@change_password');
  		Route::post('/change/account','staff@change_account');
  		Route::post('/change/image','staff@change_image');
	
		Route::get('/profile',function(){
		return view('dashboard.fr.profile');
		});

	});
	

?>

