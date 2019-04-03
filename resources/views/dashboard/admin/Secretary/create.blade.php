@extends('dashboard.layout.app')

@section('header') 
    {!! Html::style('dashboard/plugins/bootstrap-select/css/bootstrap-select.css') !!}
    {!! Html::style('dashboard/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') !!}
    {!! Html::style('dashboard/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css') !!}
@endsection


@section('pageTitle')
 clinic | Add Secretary
@endsection




@section('content')
    
        
       <div class="card">
           <div class="header">
                <h2 style="margin-top: 7px;">
                    <i class="material-icons pull-left" style="margin-top: -4px">person_add</i><span class="pull-left" style="margin-left: 10px">ADD Secretary</span>
                </h2>
                <br>
           </div>
           <div class="body">
                {{Form::open(['novalidate'=>'novalidate','id'=>'form_validation','url' => 'dashboard/admin/controll/secretary','method'=>'POST','class'=>'demo-masked-input'])}}
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
                                {!! Form::text('email',old('email'),['class'=>'form-control email']) !!}
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
                                {!! Form::password('password',['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>  
                   
                    <div class="col-md-12">
                        <b>Birth Date</b>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">date_range</i>
                            </span>
                                    
                            <div class="form-group">
                                <div class="form-line" id="bs_datepicker_container">
                                    {!! Form::text('birthDate',old('birthDate'),['class'=>'form-control date']) !!}
                                </div>
                            </div>
                               
                        </div>
                    </div>
                     <div class="col-md-12">
                        <b>Salary</b>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">euro_symbol</i>
                            </span>
                            <div class="form-line">
                                {!! Form::number('salary',old('salary'),['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                          {!! Form::Label('item', 'Doctors:') !!}
                          <select class="form-control" name="doctor_id">
                            @foreach($Name_Id as $item)
                              <option value="{{$item}}">{{$item}}</option>
                            @endforeach
                          </select> 
                    </div>
                    <div class="col-md-12">
                        <b>Qualification</b>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">note</i>
                            </span>
                            <div class="form-line">
                                {!! Form::text('qualification',old('qualification'),['class'=>'form-control']) !!}
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
                                {!! Form::text('mobile',old('mobile'),['class'=>'form-control mobile-phone-number']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <b>Address</b>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">location_on</i>
                            </span>
                            <div class="form-line">
                                {!! Form::text('address',old('address'),['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <b>Start_at</b>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">alarm</i>
                            </span>
                            <div class="form-line">
                                {!! Form::text('start_at',old('start_at'),['class'=>'form-control time24']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <b>End_at</b>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">alarm</i>
                            </span>
                            <div class="form-line">
                                {!! Form::text('end_at',old('end_at'),['class'=>'form-control time24']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                            {!! Form::select('gender',['male'=>'male','female'=>'female'],old('gender'),['class'=>'form-control show-tick']) !!}
                    </div>
                    <div class="col-md-6">
                        {!! Form::select('weekend',days(),old('weekend'),['class'=>'form-control show-tick']) !!}
                    </div>
                   
                        {!! Form::submit("Save Secretary",['class'=>'btn btn-primary']) !!}
                    
                {{Form::close()}}      
           </div>
       </div>
        
@endsection


@section('fotter')
    

    

   
@endsection