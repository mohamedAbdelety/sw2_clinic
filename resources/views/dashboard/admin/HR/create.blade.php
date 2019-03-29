@extends('dashboard.layout.app')

@section('header') 
    {!! Html::style('dashboard/plugins/bootstrap-select/css/bootstrap-select.css') !!}
    {!! Html::style('dashboard/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') !!}
    {!! Html::style('dashboard/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css') !!}
   

@endsection


@section('pageTitle')
 clinic | Add HR
@endsection




@section('content')
	

	   <div class="card">
           <div class="header">
                <h2 style="margin-top: 7px;">
                    <i class="material-icons pull-left" style="margin-top: -4px">person_add</i><span class="pull-left" style="margin-left: 10px">ADD HR</span>
                </h2>
                <br>
           </div>
           <div class="body">
                {{Form::open(['novalidate'=>'novalidate','id'=>'form_validation','url' => 'dashboard/admin/controll/hr','method'=>'POST','class'=>'demo-masked-input'])}}
                    <div class="col-md-12">
                        <b>User Name</b>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">person</i>
                            </span>
                            <div class="form-line">
                                {!! Form::text('name',old('name'),['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <b>Email Address</b>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">email</i>
                            </span>
                            <div class="form-line">
                                {!! Form::email('email',old('email'),['class'=>'form-control email']) !!}
                            </div>
                        </div>
                    </div>  
                     <div class="col-md-12">
                        <b>Password</b>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">vpn_key</i>
                            </span>
                            <div class="form-line">
                                {!! Form::text('password',old('password'),['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>  
                    <div class="col-md-12">
                        <b>Birth Date</b>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">date_range</i>
                            </span>
                            <div class="form-line">
                                {!! Form::text('birth',old('birth'),['class'=>'form-control date']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <b>Mobile</b>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">phone_iphone</i>
                            </span>
                            <div class="form-line">
                                {!! Form::text('mobile',old('mobile'),['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <b>Address</b>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">phone_iphone</i>
                            </span>
                            <div class="form-line">
                                {!! Form::text('address',old('address'),['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                     <div class="col-md-12">
                        <b>Salary</b>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">phone_iphone</i>
                            </span>
                            <div class="form-line">
                                {!! Form::number('salary',old('salary'),['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <b>Start_at</b>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">phone_iphone</i>
                            </span>
                            <div class="form-line">
                                {!! Form::number('start_at',old('start_at'),['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <b>End_at</b>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">phone_iphone</i>
                            </span>
                            <div class="form-line">
                                {!! Form::number('end_at',old('end_at'),['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                            {!! Form::select('gender',['male'=>'male','female'=>'female'],old('gender'),['class'=>'form-control show-tick']) !!}
                    </div>
                    <div class="col-md-6">
                        {!! Form::select('weekend',days(),old('weekend'),['class'=>'form-control show-tick']) !!}
                    </div>
                    <div class="col-md-6">
                        {!! Form::select('position',position(),old('position'),['class'=>'form-control show-tick']) !!}
                    </div>
                   
                        {!! Form::submit("Save HR",['class'=>'btn btn-primary']) !!}
                    
                {{Form::close()}}      
           </div>
       </div>
        
@endsection


@section('fotter')

@endsection
