@extends('dashboard.layout.app')

@section('header') 
    {!! Html::style('dashboard/plugins/bootstrap-select/css/bootstrap-select.css') !!}
    {!! Html::style('dashboard/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') !!}
    {!! Html::style('dashboard/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css') !!}
     {!! Html::style('dashboard/css/select2.min.css') !!}
     <style>
       .select2,.select2-container,.select2-container--default,.select2-container--below,.select2-container--focus{
        width: 310px;
       }
     </style>
@endsection


@section('pageTitle')
  {{get_settings()->sitename}} | {{trans('common.add_detection')}}
@endsection




@section('content')
    
        
       <div class="card">
           <div class="header">
                <h2 style="margin-top: 7px;">
                    <i class="material-icons pull-left" style="margin-top: -4px">person_add</i><span class="pull-left" style="margin-left: 10px"> {{trans('common.add_detection')}}</span>
                </h2>
                <br>
           </div>
           <div class="body">
                {{Form::open(['novalidate'=>'novalidate','id'=>'form_validation','url' => 'dashboard/secratry/controll/detection/create','method'=>'POST','class'=>'demo-masked-input'])}}
                   
                    <div class="col-md-4">
                        {!! Form::select("patient_id",all_patients(),null,['placeholder'=>'patient name','class'=>'select2']) !!}
                    </div>      
                    <div class="col-md-5">
                            {!!Form::select('type',['0'=>trans('common.detection'),'1'=>trans('common.observation')],old('gender'),['class'=>'form-control show-tick']) !!}
                    </div>           
                        {!! Form::submit(trans('common.save_detection'),['class'=>'btn btn-primary']) !!}
                    
                {{Form::close()}}      
           </div>
       </div>
        
@endsection


@section('fotter')
    <!-- select box -->
    {!! Html::script('dashboard/js/select2.min.js') !!}
    <script>
      $('.select2').select2();
    </script>
   
@endsection