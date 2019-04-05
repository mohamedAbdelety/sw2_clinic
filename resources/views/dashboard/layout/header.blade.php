<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
      
    	<meta charset="UTF-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
    	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
       	<meta name="description" content="{{get_settings()->description}}">
  		<meta name="keywords" content="{{get_settings()->keywords}}">

    	<!-- Favicon-->
	    <link rel="icon" href="{{Storage::url(get_settings()->logo)}}" type="image/x-icon">

	    <!-- Google Fonts -->
	    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
	    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

	    <!-- Bootstrap Core Css -->
	    <!-- Bootstrap Core Css -->
	    {!! Html::style('frontend/font-awesome/css/font-awesome.min.css') !!}
	    {!! Html::style('dashboard/plugins/bootstrap/css/bootstrap.css') !!}
	    {!! Html::style('dashboard/plugins/node-waves/waves.css') !!}
	    {!! Html::style('dashboard/plugins/animate-css/animate.css') !!}
	    {!! Html::style('dashboard/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css') !!}
	    {!! Html::style('dashboard/plugins/dropzone/dropzone.css') !!}
	    {!! Html::style('dashboard/plugins/multi-select/css/multi-select.css') !!}
	    {!! Html::style('dashboard/plugins/jquery-spinner/css/bootstrap-spinner.css') !!}
	    {!! Html::style('dashboard/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') !!}
	    {!! Html::style('dashboard/plugins/bootstrap-select/css/bootstrap-select.css') !!}
	    {!! Html::style('dashboard/plugins/nouislider/nouislider.min.css') !!}
	    {!! Html::style('dashboard/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') !!}
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