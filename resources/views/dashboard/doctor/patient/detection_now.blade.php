@extends('dashboard.layout.app')
@section('header')
   <style>
     .title{
        margin-right: 20px;font-size: 17px;font-weight: bold;
     }
     .title-val{
      color: #09c;
     }
     .btn-pres{
        margin-top: 10px;
     }
   </style>
    {!! Html::script('dashboard/ckeditor/ckeditor.js') !!}
    {!! Html::script('dashboard/ckeditor/samples/js/sample.js') !!} 
    {!! Html::style('dashboard/ckeditor/samples/css/sample.css') !!}
    {!! Html::style('dashboard/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css') !!}
  
@endsection


@section('pageTitle')
 {{get_settings()->sitename}} | {{trans('common.now_detection')}}
@endsection




@section('content')

        <div class="card">
           <div class="header">
                <h2 style="margin-top: 7px;">
                    <i class="material-icons pull-left" style="margin-top: -4px">person_add</i><span class="pull-left" style="margin-left: 10px">{{trans('common.now_detection')}}</span>
                </h2>
                <br>
           </div>
           <div class="body">
                @if($patient_detect != null)
                <section style="overflow:hidden">
                    <p class="col-md-6"><span class="title">{{trans('common.patient_name')}} : </span><span class="title-val">{{$patient_detect->name}}</span></p>
                    <p class="col-md-6"><span class="title">{{trans('common.patient_job')}} : </span><span class="title-val">{{$patient_detect->job}}</span></p>
                    <p class="col-md-6"><span class="title">{{trans('common.address')}} : </span><span class="title-val">{{$patient_detect->address}}</span></p>
                    <p class="col-md-6"><span class="title">{{trans('common.patient_age')}} : </span><span class="title-val">{{$patient_detect->age}}</span></p>
                   <p class="col-md-6"><span class="title">{{trans('common.type')}} : </span><span class="title-val">
                    @if($patient_detect->detection_id == null )
                     Detection
                    @else
                     Observation
                    @endif
                  </span></p>
                </section>

                @if($history != null)  
                <section>
                  @foreach($history as $h)
                    <div class="panel panel-primary">
                      <div style="overflow: hidden;" class="panel-heading">
                        <span class="pull-left"> With : Dr / 
                          {{get_doctorby_id($h->doctor_id)}}
                          @if(get_staffid_for_doctorid($h->doctor_id) == Auth::user()->id)
                            <span> (Me)</span>
                          @endif
                        </span>
                        <span class="pull-right">{{ $h->created_at }}</span>
                      </div>
                      <div class="panel-body">
                        {!! $h->prescription !!}  
                      </div>
                    </div>
                  @endforeach
                </section>
                @endif

                  {{Form::open(['novalidate'=>'novalidate','id'=>'form_validation','url' => 'dashboard/doctor/controll/patient/detectnow','method'=>'POST','class'=>'demo-masked-input'])}}
                    <div class="adjoined-bottom">
                      <div class="grid-container">
                        <div class="grid-width-100">
                          <textarea id="editor" name="prescription">
                            <h1>{{trans('common.editor')}}</h1>
                          </textarea>
                        </div>
                      </div>
                    </div>
                    {!! Form::submit(trans('common.save_prescription'),['class'=>'btn btn-primary btn-pres']) !!}
                    {{Form::close()}}

                @else
                  <p class="alert alert-warning">{{trans('common.no_dect_now')}}</p>
                  <?php
                    header("refresh:3;url='/dashboard/doctor/controll/patient/detection/today'");
                  ?>
                @endif
        </div>
    </div>



@endsection






@section('fotter')
    <script>
      initSample();
    </script>

@endsection
