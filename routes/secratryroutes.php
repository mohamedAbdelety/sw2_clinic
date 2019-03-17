<?php
	Route::group(['prefix'=>'/dashboard/secratry'], function(){
		
		Route::get('/index',function(){
			return view('dashboard.secratry.index');
		});
		
	});
?>