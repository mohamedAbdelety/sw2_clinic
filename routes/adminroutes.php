<?php
	Route::group(['prefix'=>'/dashboard/admin'], function(){
		
		Route::get('/index',function(){
			return view('dashboard.admin.index');
		});

		// controll HR
  		Route::resource('/controll/hr','hr');
  		Route::delete('hr/destory/all','hr@destory_all');
		
	});
?>
