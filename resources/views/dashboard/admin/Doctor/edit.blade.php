@extends('dashboard.layout.app')

@section('header') 
    {!! Html::style('dashboard/plugins/bootstrap-select/css/bootstrap-select.css') !!}
    {!! Html::style('dashboard/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') !!}
    {!! Html::style('dashboard/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css') !!}
@endsection


@section('pageTitle')
{{get_settings()->sitename}} | {{trans('admin.edit_doctor')}}
@endsection




@section('content')
    

       <div class="card">
           <div class="header">
                <h2 style="margin-top: 7px;">
                    <i class="material-icons pull-left" style="margin-top: -4px">person_add</i><span class="pull-left" style="margin-left: 10px">{{trans('admin.edit_doctor')}}</span>
                </h2>
                <br>
           </div>
           <div class="body">
                {{Form::open(['novalidate'=>'novalidate','id'=>'form_validation','url' => 'dashboard/admin/controll/doctor/'.$doctor->id,'method'=>'put','class'=>'demo-masked-input'])}}
                    <input type="hidden" name="doctorsID" value="{{$doctor->doctorsID}}">
                    <div class="col-md-12">
                        <b>{{trans('common.user_name')}}</b>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">person</i>
                            </span>
                            <div class="form-line">
                                {!! Form::text('name',$doctor->name,['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <b>{{trans('common.email')}}</b>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">email</i>
                            </span>
                            <div class="form-line">
                                {!! Form::text('email',$doctor->email,['class'=>'form-control email']) !!}
                            </div>
                        </div>
                    </div>  
                    <div class="col-md-12">
                        <b>{{trans('common.birth_date')}}</b>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">date_range</i>
                            </span>
                                    
                            <div class="form-group">
                                <div class="form-line" id="bs_datepicker_container">
                                    <?php
                                        $date_arr = explode("-",$doctor->birthDate);
                                        $birthDate =  $date_arr[2]."/".$date_arr[1]."/".$date_arr[0];
                                    ?>
                                    {!! Form::text('birthDate',$birthDate,['class'=>'form-control date']) !!}
                                </div>
                            </div>
                               
                        </div>                    
                    </div>
                    <div class="col-md-12">
                        <b>{{trans('common.ditection_salary')}}</b>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">euro_symbol</i>
                            </span>
                            <div class="form-line">
                                {!! Form::number('Dectsalary',$doctor->Dectsalary,['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <b>{{trans('common.expirence')}}</b>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">explicit</i>
                            </span>
                            <div class="form-line">
                                {!! Form::number('experience',$doctor->experience,['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <b>{{trans('common.quail')}}</b>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">note</i>
                            </span>
                            <div class="form-line">
                                {!! Form::text('qualification',$doctor->qualification,['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <b>{{trans('common.spacil')}}</b>
                            {!! Form::select('specail',['Dentist'=>'Dentist','Surgeon'=>'Surgeon','Psychiatrist'=>'Psychiatrist','Internist'=>'Internist','pediatrician'=>'pediatrician','Dermatologist'=>'Dermatologist','Anesthetist'=>'Anesthetist'],$doctor->specail,['class'=>'form-control show-tick']) !!}
                    </div>
                    <div class="col-md-12">
                        <b>{{trans('common.position')}}</b>
                            {!! Form::select('position',['Advisory'=>'Advisory','specialist'=>'specialist'],$doctor->position,['class'=>'form-control show-tick']) !!}
                    </div>

                    <div class="col-md-12">
                        <b>{{trans('common.mobile')}}</b>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">phone_iphone</i>
                            </span>
                            <div class="form-line">
                                {!! Form::text('mobile',$doctor->mobile,['class'=>'form-control mobile-phone-number']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <b>{{trans('common.address')}}</b>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">location_on</i>
                            </span>
                            <div class="form-line">
                                {!! Form::text('address',$doctor->address,['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                     
                    <div class="col-md-6">
                        <b>{{trans('common.start_at')}}</b>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">alarm</i>
                            </span>
                            <div class="form-line">
                                {!! Form::text('start_at',$doctor->start_at,['class'=>'form-control time24']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <b>{{trans('common.end_at')}}</b>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">alarm</i>
                            </span>
                            <div class="form-line">
                                {!! Form::text('end_at',$doctor->end_at,['class'=>'form-control time24']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                            {!! Form::select('gender',['male'=>trans('common.male'),'female'=>trans('common.female')],$doctor->gender,['class'=>'form-control show-tick']) !!}
                    </div>
                    <div class="col-md-6">
                        {!! Form::select('weekend',days(),$doctor->weekend,['class'=>'form-control show-tick']) !!}
                    </div>
                    
                   
                        {!! Form::submit(trans('common.save_doctor'),['class'=>'btn btn-primary']) !!}
                    
                {{Form::close()}}      
           </div>
       </div>
        
@endsection


@section('fotter')
    

    

   
@endsection