<!DOCTYPE html>
<html>
<head>
	 {!! Html::style('website designe/css/bootstrap.min.css') !!}
	  {!! Html::style('website designe/css/flexslider.css') !!}
	  {!! Html::style('website designe/css/font-awesome.min.css') !!}
	  {!! Html::style('website designe/css/style.css') !!}
	  {!! Html::script('website designe/js/jquery.min.js') !!}

	  {!! Html::style('cus/css/select2.min.css') !!}
	  {!! Html::style('cus/sweetalert.css') !!}
	  {!! Html::style('cus/mohamed.css') !!}
	<title>test</title>
</head>
<body>
	{!! Form::select("bu_location",['1'=>'1','2'=>'2','3'=>'3'],null,['placeholder'=>'building location','class'=>'mo-search select2']) !!}
	 {!! Html::script('website designe/js/responsive-nav.js') !!}
    {!! Html::script('website designe/js/bootstrap.min.js') !!}
    {!! Html::script('website designe/js/jquery.flexslider.js') !!}

    <!-- select box -->
    {!! Html::script('cus/js/select2.min.js') !!}
    {!! Html::script('cus/sweetalert.min.js') !!}
    
    <script>
      $('.select2').select2();
    </script>
</body>
</html>