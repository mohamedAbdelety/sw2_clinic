@extends('dashboard.layout.app')

@section('header') 
    {!! Html::style('dashboard/plugins/bootstrap-select/css/bootstrap-select.css') !!}
    {!! Html::style('dashboard/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') !!}
    {!! Html::style('dashboard/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css') !!}
@endsection


@section('pageTitle')
 {{get_settings()->sitename}} | {{trans('common.add_hr')}}
@endsection




@section('content')
    

       <div class="card">
           <div class="header">
                <h2 style="margin-top: 7px;">
                    <i class="material-icons pull-left" style="margin-top: -4px">person_add</i><span class="pull-left" style="margin-left: 10px">{{trans('common.add_hr')}}</span>
                </h2>
                <br>
           </div>
           <div class="body">
                {{Form::open(['novalidate'=>'novalidate','id'=>'form_validation','url' => 'dashboard/admin/controll/hr','method'=>'POST','class'=>'demo-masked-input'])}}
                    <div class="col-md-12">
                        <b>{{trans('common.user_name')}}</b>
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
                        <b>{{trans('common.email')}}</b>
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
                        <b>{{trans('common.password')}}</b>
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
                        <b>{{trans('common.birth_date')}}</b>
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
                     <div class="col-md-12">
                        <b>{{trans('common.salary')}}</b>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">euro_symbol</i>
                            </span>
                            <div class="form-line">
                                {!! Form::number('salary',old('salary'),['class'=>'form-control']) !!}
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
                                {!! Form::text('start_at',old('start_at'),['class'=>'form-control time24']) !!}
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
                                {!! Form::text('end_at',old('end_at'),['class'=>'form-control time24']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                            {!! Form::select('gender',['male'=>trans('common.male'),'female'=>trans('common.female')],old('gender'),['class'=>'form-control show-tick']) !!}
                    </div>
                    <div class="col-md-6">
                        {!! Form::select('weekend',days(),old('weekend'),['class'=>'form-control show-tick']) !!}
                    </div>
                    <div class="col-md-6">
                        {!! Form::select('position',position(),old('position'),['class'=>'form-control show-tick']) !!}
                    </div>
                   
                        {!! Form::submit(trans('common.save_hr'),['class'=>'btn btn-primary']) !!}
                    
                {{Form::close()}}      
           </div>
       </div>
        
@endsection


@section('fotter')
    

    

   
@endsection