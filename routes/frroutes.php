<?php
	Route::group(['prefix'=>'/dashboard/fr'], function(){
		
		Route::get('/index',function(){
			return view('dashboard.fr.index');
		});
		
	});
?>
