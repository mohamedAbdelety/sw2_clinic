<?php
	Route::group(['prefix'=>'/dashboard/hr'], function(){
		
		Route::get('/index',function(){
			return view('dashboard.hr.index');
		});
		
	});
?>
