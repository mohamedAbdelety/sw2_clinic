@extends('dashboard.layout.app')

@section('header') 
    {!! Html::style('dashboard/plugins/bootstrap-select/css/bootstrap-select.css') !!}
    {!! Html::style('dashboard/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') !!}
    {!! Html::style('dashboard/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css') !!}
@endsection


@section('pageTitle')
 clinic | {{trans('admin.setting_title')}}
@endsection




@section('content')
    

       <div class="card">
           <div class="header">
                <h2 style="margin-top: 7px;">
                    <i class="material-icons pull-left" style="margin-top: -4px">settings</i><span class="pull-left" style="margin-left: 10px"></span>  {{trans('admin.setting_title')}}
                </h2>
                <br>
           </div>
           <div class="body">
                {{Form::open(['novalidate'=>'novalidate','id'=>'form_validation form_dynamic','url' => 'dashboard/admin/website/setting','method'=>'POST','class'=>'demo-masked-input','files'=>true])}}
                    <div class="col-md-12">
                        <b>{{trans('admin.setting_sitename')}}</b>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">note</i>
                            </span>
                            <div class="form-line">
                                {!! Form::text('sitename',get_settings()->sitename,['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>         
                     <div class="col-md-12">
                        <b>{{trans('admin.setting_keywords')}}</b>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">keyboard</i>
                            </span>
                            <div class="form-line">
                                {!! Form::text('keywords',get_settings()->keywords,['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <b>{{trans('admin.setting_desc')}}</b>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">note</i>
                            </span>
                            <div class="form-line">
                                {!! Form::textarea('description',get_settings()->description,['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <b>{{trans('admin.setting_mainlang')}}</b>
                            {!! Form::select('main_lang',['ar'=>'ar','en'=>'en','fr'=>'fr','es'=>'es'],get_settings()->main_lang,['class'=>'form-control show-tick']) !!}
                    </div>
                    <div class="col-md-12">

                        {!! Form::label('logo',trans('admin.setting_logo')) !!}
                        @if(!empty(get_settings()->logo))
                        <div style="margin-bottom: 10px">
                           <a href="{{Storage::url(get_settings()->logo)}}">
                              <img class="img-thumbnail img-responsive" src="{{Storage::url(get_settings()->logo)}}" style="width:80px;height:80px" alt="Website logo" title="website logo">  
                          </a>
                        </div>
                      @endif
                      {!! Form::file('logo',['class'=>'form-control']) !!}
                    </div>
                    <div class="col-md-12">
                        <b>{{trans('admin.setting_status')}}</b>
                            {!! Form::select('status',['1'=>trans('admin.open'),'2'=>trans('admin.close'),'3'=>trans('admin.close_patient'),'4'=>trans('admin.close_hr'),'5'=>trans('admin.close_fr'),'6'=>trans('admin.close_doctor'),'7'=>trans('admin.close_secratry'),'8'=>trans('admin.close_specific')],get_settings()->status,['class'=>'form-control show-tick','id'=>'status']) !!}
                    </div>
                    
                        <div id="block" class="modal fade" role="dialog">
                          <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">{{trans('admin.block_mail')}}</h4>
                              </div>
                              <div class="modal-body" id="form_dynamic">
                                <input type="hidden" name="mail_count" id="mail_count" value="1">
                                <input type="text" name="blockmail[]" class="form-control">
                              </div>
                              <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" id="add_mail">{{ trans('admin.add_blockmail') }}</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('admin.close') }}</button>     
                              </div>
                            </div>
                          </div>
                        </div>
                    
                    <div class="col-md-12">
                        <b>{{trans('admin.setting_maintance_frontend')}}</b>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">format_quote</i>
                            </span>
                            <div class="form-line">
                                {!! Form::textarea('message_maintance_frontend',get_settings()->message_maintance_frontend,['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <b>{{trans('admin.setting_maintance_backend')}}</b>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">format_quote</i>
                            </span>
                            <div class="form-line">
                                {!! Form::textarea('message_maintance_backend',get_settings()->message_maintance_backend,['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>

                        {!! Form::submit(trans('admin.setting_submit'),['class'=>'btn btn-primary']) !!}<a href="{{url('/dashboard/admin/controll/blocked')}}" style="margin-left: 10px">Blocked Staff</a>
                    
                {{Form::close()}}

           </div>
       </div>
















        
@endsection


@section('fotter')
    <script>
        
        $('#status').change(function(){
            if($('#status').val() == 8){
                $('.modal').modal('show');
            }
        });
        $('#add_mail').click(function(){
              var x = parseInt($('#mail_count').val())+1;
             $('#form_dynamic').append("<input type='text' class='form-control' name='blockmail[]' style='margin-top:10px;'>");
            $('#mail_count').val( parseInt($('#mail_count').val())+1);         
         });
    </script>
@endsection