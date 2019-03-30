@extends('dashboard.layout.app')

@section('header') 
    {!! Html::style('dashboard/plugins/bootstrap-select/css/bootstrap-select.css') !!}
    {!! Html::style('dashboard/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') !!}
    {!! Html::style('dashboard/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css') !!}
@endsection


@section('pageTitle')
 clinic | Edit HR
@endsection




@section('content')
    

       <div class="card">
           <div class="header">
                <h2 style="margin-top: 7px;">
                    <i class="material-icons pull-left" style="margin-top: -4px">person_add</i><span class="pull-left" style="margin-left: 10px">Edit HR</span>
                </h2>
                <br>
           </div>
           <div class="body">
                {{Form::open(['novalidate'=>'novalidate','id'=>'form_validation','url' => 'dashboard/admin/controll/hr/'.$hr->id,'method'=>'put','class'=>'demo-masked-input'])}}
                    <input type="hidden" name="adminID" value="{{$hr->adminID}}">
                    <div class="col-md-12">
                        <b>User Name</b>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">person</i>
                            </span>
                            <div class="form-line">
                                {!! Form::text('name',$hr->name,['class'=>'form-control']) !!}
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
                                {!! Form::text('email',$hr->email,['class'=>'form-control email']) !!}
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
                                    <?php
                                        $date_arr = explode("-",$hr->birthDate);
                                        $birthDate =  $date_arr[2]."/".$date_arr[1]."/".$date_arr[0];
                                    ?>
                                    {!! Form::text('birthDate',$birthDate,['class'=>'form-control date']) !!}
                                </div>
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
                                {!! Form::text('mobile',$hr->mobile,['class'=>'form-control mobile-phone-number']) !!}
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
                                {!! Form::text('address',$hr->address,['class'=>'form-control']) !!}
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
                                {!! Form::number('salary',$hr->salary,['class'=>'form-control']) !!}
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
                                {!! Form::text('start_at',$hr->start_at,['class'=>'form-control time24']) !!}
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
                                {!! Form::text('end_at',$hr->end_at,['class'=>'form-control time24']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                            {!! Form::select('gender',['male'=>'male','female'=>'female'],$hr->gender,['class'=>'form-control show-tick']) !!}
                    </div>
                    <div class="col-md-6">
                        {!! Form::select('weekend',days(),$hr->weekend,['class'=>'form-control show-tick']) !!}
                    </div>
                    <div class="col-md-6">
                        {!! Form::select('position',position(),$hr->position,['class'=>'form-control show-tick']) !!}
                    </div>
                   
                        {!! Form::submit("Save HR",['class'=>'btn btn-primary']) !!}
                    
                {{Form::close()}}      
           </div>
       </div>
        
@endsection


@section('fotter')
    

    

   
@endsection