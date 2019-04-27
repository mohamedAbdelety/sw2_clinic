@extends('dashboard.layout.app')

@section('header') 
    {!! Html::style('dashboard/plugins/bootstrap-select/css/bootstrap-select.css') !!}
    {!! Html::style('dashboard/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') !!}
    {!! Html::style('dashboard/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css') !!}
@endsection


@section('pageTitle')
  {{get_settings()->sitename}} | {{trans('common.add_patient')}}
@endsection




@section('content')
    
        
       <div class="card">
           <div class="header">
                <h2 style="margin-top: 7px;">
                    <i class="material-icons pull-left" style="margin-top: -4px">person_add</i><span class="pull-left" style="margin-left: 10px"> {{trans('common.add_patient')}}</span>
                </h2>
                <br>
           </div>
           <div class="body">
                {{Form::open(['novalidate'=>'novalidate','id'=>'form_validation','url' => 'dashboard/secratry/controll/patient','method'=>'POST','class'=>'demo-masked-input'])}}
                    <div class="col-md-12">
                        <b>{{trans('common.patient_name')}}</b>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">person</i>
                            </span>
                            <div class="form-line">
                                {!! Form::text('name',old('name'),['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                     <div class="col-md-6">
                        <b>{{trans('common.patient_job')}}</b>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">person</i>
                            </span>
                            <div class="form-line">
                                {!! Form::text('job',old('job'),['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                     <div class="col-md-6">
                        <b>{{trans('common.patient_age')}}</b>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">person</i>
                            </span>
                            <div class="form-line">
                                {!! Form::number('age',old('age'),['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                         
                    <div class="col-md-12">
                        <b>{{trans('common.mobile')}}</b>
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
                        <b>{{trans('common.address')}}</b>
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
                            {!!Form::select('gender',['male'=>trans('common.male'),'female'=>trans('common.female')],old('gender'),['class'=>'form-control show-tick']) !!}
                    </div>
                    
                        {!! Form::submit(trans('common.save_patient'),['class'=>'btn btn-primary']) !!}
                    
                {{Form::close()}}      
           </div>
       </div>
        
@endsection


@section('fotter')
    

    

   
@endsection