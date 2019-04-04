@extends('dashboard.layout.app')

@section('header') 
    {!! Html::style('dashboard/plugins/bootstrap-select/css/bootstrap-select.css') !!}
    {!! Html::style('dashboard/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') !!}
    {!! Html::style('dashboard/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css') !!}
@endsection


@section('pageTitle')
 clinic | Edit Secretary
@endsection




@section('content')
    

       <div class="card">
           <div class="header">
                <h2 style="margin-top: 7px;">
                    <i class="material-icons pull-left" style="margin-top: -4px">person_add</i><span class="pull-left" style="margin-left: 10px">Edit Secretary</span>
                </h2>
                <br>
           </div>
           <div class="body">
                {{Form::open(['novalidate'=>'novalidate','id'=>'form_validation','url' => 'dashboard/hr/controll/secretary/'.$secretary->id,'method'=>'put','class'=>'demo-masked-input'])}}
                    <input type="hidden" name="secretaryID" value="{{$secretary->secretaryID}}">
                    <div class="col-md-12">
                        <b>User Name</b>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">person</i>
                            </span>
                            <div class="form-line">
                                {!! Form::text('name',$secretary->name,['class'=>'form-control']) !!}
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
                                {!! Form::text('email',$secretary->email,['class'=>'form-control email']) !!}
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
                                        $date_arr = explode("-",$secretary->birthDate);
                                        $birthDate =  $date_arr[2]."/".$date_arr[1]."/".$date_arr[0];
                                    ?>
                                    {!! Form::text('birthDate',$birthDate,['class'=>'form-control date']) !!}
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
                                {!! Form::number('salary',$secretary->salary,['class'=>'form-control']) !!}
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
                                {!! Form::text('qualification',$secretary->qualification,['class'=>'form-control']) !!}
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
                                {!! Form::text('mobile',$secretary->mobile,['class'=>'form-control mobile-phone-number']) !!}
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
                                {!! Form::text('address',$secretary->address,['class'=>'form-control']) !!}
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
                                {!! Form::text('start_at',$secretary->start_at,['class'=>'form-control time24']) !!}
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
                                {!! Form::text('end_at',$secretary->end_at,['class'=>'form-control time24']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                            {!! Form::select('gender',['male'=>'male','female'=>'female'],$secretary->gender,['class'=>'form-control show-tick']) !!}
                    </div>
                    <div class="col-md-6">
                        {!! Form::select('weekend',days(),$secretary->weekend,['class'=>'form-control show-tick']) !!}
                    </div>
                    
                   
                        {!! Form::submit("Save Secretary",['class'=>'btn btn-primary']) !!}
                    
                {{Form::close()}}      
           </div>
       </div>
        
@endsection


@section('fotter')
    

    

   
@endsection