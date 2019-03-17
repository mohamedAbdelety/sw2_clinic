<!doctype html>
<html lang="{{ app()->getLocale() }}" class="fullscreen-bg">
    <head>
      
    	<meta charset="UTF-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
    	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
       	

    	<!-- Favicon-->
	    <link rel="icon" href="favicon.ico" type="image/x-icon">


		<title>{{ env('APP_NAME') }} | Login</title>
		
		{!! Html::style('dashboard/css/style.css') !!}

		{!! Html::style('dashboard/plugins/bootstrap/css/bootstrap.css') !!}

     	
     	{!! Html::style('dashboard/assets/vendor/font-awesome/css/font-awesome.min.css') !!}
	 	{!! Html::style('dashboard/assets/vendor/linearicons/style.css') !!}
        {!! Html::style('dashboard/assets/css/main.css') !!}

		{!! Html::style('dashboard/assets/css/demo.css') !!}		
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
		<!-- ICONS -->
		<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
		<style type="text/css">
			.auth-box .right{
				background-image: url("assets/img/dept-5.jpg");
			*/}
		</style>
		
	    
	   
	    
	    
	    
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
							<div class="header">
								<div class="logo text-center"><img src="assets/img/logo-dark.png" alt="Klorofil Logo"></div>
								<p class="lead">Login to your account</p>
							</div>
							{!! Form::open(['class'=>'form-auth-small','url'=>url('/dashboard/login'),'method'=>'post']) !!}
								<div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="email" class="form-control" name="email">
                                            <label class="form-label">Email</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="password" class="form-control" name="password">
                                            <label class="form-label">Password</label>
                                        </div>
                                    </div>
                                </div>
                                <br><br>
                                <div class="form-group form-float">
                                	<br>
                                    <input type="checkbox" id="checkbox" name="rember" value="1">
                                    <label for="checkbox">Remember Me</label>
                                </div>
								<button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
								<div class="bottom">
									<span class="helper-text"><i class="fa fa-lock"></i> <a href="#">Forgot password?</a></span>
								</div>
							{!! Form::close() !!}
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading">Clinic Management System</h1>
							<p>by The FCIH Develovers</p>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
	{!! Html::script('dashboard/plugins/jquery/jquery.min.js') !!}
	 <!-- Jquery Core Js -->
    {!! Html::script('dashboard/plugins/bootstrap/js/bootstrap.js') !!}
    {!! Html::script('dashboard/plugins/bootstrap-select/js/bootstrap-select.js') !!}
   
    {!! Html::script('dashboard/plugins/node-waves/waves.js') !!}
   

    <!-- Jquery CountTo Plugin Js -->



    {!! Html::script('dashboard/js/admin.js') !!}
    
    {!! Html::script('dashboard/js/demo.js') !!}   
</body>

</html>