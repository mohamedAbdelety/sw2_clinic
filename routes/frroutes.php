<?php
	Route::group(['prefix'=>'/dashboard/fr'], function(){
		// report	
		Route::get('/index','reportController@fr_report');
		// controll profile
  		Route::post('/change/password','staff@change_password');
  		Route::post('/change/account','staff@change_account');
  		Route::post('/change/image','staff@change_image');
	
		Route::get('/profile',function(){
		return view('dashboard.fr.profile');
		});

		// controll patient
		Route::get('/detection/price','patientController@fr_detection_price_list');
		Route::get('/detection/price/search','patientController@fr_detection_price_search');
		Route::get('/detection/price/pull','patientController@fr_detection_price_pull');
		
		// controll exchange 
		Route::resource('/controll/exchange','exchangeController');


		// employee salary
		Route::get('/salary/employee','salaryController@index_employee');
		Route::get('/salary/employee/pay/{id}','salaryController@employee_pay_salary');

		// secratry salary
		Route::get('/salary/secretary','salaryController@index_secretary');
		Route::get('/salary/secratry/pay/{id}','salaryController@secratry_pay_salary');


		// doctor salary
		Route::get('/salary/doctor','salaryController@index_doctor');
		Route::get('/salary/doctor/pay/{id}','salaryController@doctor_pay_salary');
		

	});
	

?>

