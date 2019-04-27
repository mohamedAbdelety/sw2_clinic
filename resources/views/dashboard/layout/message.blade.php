@if(!empty($errors))
@foreach($errors->all() as $error)
	<div class="alert alert-danger">{{$error}}</div>
@endforeach
@endif

@if(session()->has('add_success'))
	<script>
	   		setTimeout(function(){
	   			showSuccessMessage();		
	   		},4000);
   	</script>
	<div class="alert alert-success">{{ session()->get('add_success') }}</div>
@endif

@if(session()->has('update_success'))
	<div class="alert alert-success">{{ session()->get('update_success') }}</div>
@endif

@if(session()->has('no_observe_success'))
	<div class="alert alert-warning">{{ session()->get('no_observe_success') }}</div>
@endif



@if(session()->has('delete_success'))
	<div class="alert alert-success">{{ session()->get('delete_success') }}</div>
@endif


@if(session()->has('success_setting'))
	<div class="alert alert-success">{{ session()->get('success_setting') }}</div>
@endif
