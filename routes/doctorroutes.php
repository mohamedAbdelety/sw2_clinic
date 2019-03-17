<?php
	Route::group(['prefix'=>'/dashboard/doctor'], function(){
		
		Route::get('/index',function(){
			return view('dashboard.doctor.index');
		});
		
	});
?>