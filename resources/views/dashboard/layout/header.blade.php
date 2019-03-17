<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
      
    	<meta charset="UTF-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
    	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
       	

    	<!-- Favicon-->
	    <link rel="icon" href="favicon.ico" type="image/x-icon">

	    <!-- Google Fonts -->
	    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
	    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

	    <!-- Bootstrap Core Css -->
	    {!! Html::style('dashboard/plugins/bootstrap/css/bootstrap.css') !!}

     	{!! Html::style('dashboard/plugins/node-waves/waves.css') !!}
	 	{!! Html::style('dashboard/plugins/animate-css/animate.css') !!}
        {!! Html::style('dashboard/plugins/morrisjs/morris.css') !!}
	    
	   

	    <!-- Custom Css -->
	    
	    {!! Html::style('dashboard/css/style.css') !!}
	    {!! Html::style('dashboard/css/themes/all-themes.css') !!}
	   

      <title>@yield('pageTitle')</title>
      @yield('header')
    </head>
    <body class="theme-red">
    	<div class="page-loader-wrapper">
	        <div class="loader">
	            <div class="preloader">
	                <div class="spinner-layer pl-red">
	                    <div class="circle-clipper left">
	                        <div class="circle"></div>
	                    </div>
	                    <div class="circle-clipper right">
	                        <div class="circle"></div>
	                    </div>
	                </div>
	            </div>
	            <p>Please wait...</p>
	        </div>
    	</div>
    	<div class="overlay"></div>
    	<div class="search-bar">
	        <div class="search-icon">
	            <i class="material-icons">search</i>
	        </div>
	        <input type="text" placeholder="START TYPING...">
	        <div class="close-search">
	            <i class="material-icons">close</i>
	        </div>
    	</div>