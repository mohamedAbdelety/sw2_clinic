@extends('dashboard.layout.app')

@section('header') 
    {!! Html::style('dashboard/plugins/bootstrap-select/css/bootstrap-select.css') !!}
    {!! Html::style('dashboard/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') !!}
    {!! Html::style('dashboard/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css') !!}
@endsection


@section('pageTitle')
 {{get_settings()->sitename}} | {{trans('admin.edit_exchange')}}
@endsection




@section('content')
    

       <div class="card">
           <div class="header">
                <h2 style="margin-top: 7px;">
                    <i class="material-icons pull-left" style="margin-top: -4px">money</i><span class="pull-left" style="margin-left: 10px">{{trans('admin.edit_exchange')}}</span>
                </h2>
                <br>
           </div>
           <div class="body">
                {{Form::open(['novalidate'=>'novalidate','id'=>'form_validation','url' => 'dashboard/fr/controll/exchange/'.$exchange->id,'method'=>'put','class'=>'demo-masked-input'])}}
                    
                   
                       <div class="col-md-12">
                        <b>{{trans('common.exchange_name')}}</b>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">money</i>
                            </span>
                            <div class="form-line">
                                {!! Form::text('name',$exchange->name,['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                     <div class="col-md-12">
                        <b>{{trans('common.exchange_value')}}</b>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">euro_symbol</i>
                            </span>
                            <div class="form-line">
                                {!! Form::number('value',$exchange->value,['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                   <div class="col-md-6">
                        <b>{{trans('common.type')}}</b>
                            {!! Form::select('type',['standard'=>'standard','varient'=>'varient'],$exchange->type,['class'=>'form-control show-tick','placeholder'=>'________________________________','id'=>'type']) !!}
                    </div>
                    <div class="col-md-6">
                        <b>{{trans('common.category')}}</b>
                            {!! Form::select('category',['maintenance'=>'maintenance','rent'=>'rent','water'=>'water','electricity'=>'electricity','Charity'=>'Charity','medical consumption'=>'medical consumption','other'=>'other'],$exchange->category,['class'=>'form-control show-tick']) !!}
                    </div>


                    <div class="col-md-12">
                        <b>{{trans('common.peroid_type')}}</b>
                            {!! Form::select('peroid_type',['daily'=>'daily','monthly'=>'monthly','yearly'=>'yearly'],$exchange->peroid_type,['class'=>'form-control show-tick','placeholder'=>'________________________________','id'=>'peroid_type']) !!}
                    </div>               
                    <div class="col-md-4">
                        <b>{{trans('common.day')}}</b>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">explicit</i>
                            </span>
                            <div class="form-line">
                                {!! Form::number('day',$exchange->day,['class'=>'form-control','disabled'=>'true','id'=>'day']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <b>{{trans('common.month')}}</b>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">explicit</i>
                            </span>
                            <div class="form-line">
                                {!! Form::number('month',$exchange->month,['class'=>'form-control','disabled'=>'true','id'=>'month']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <b>{{trans('common.year')}}</b>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">explicit</i>
                            </span>
                            <div class="form-line">
                                {!! Form::number('year',$exchange->year,['class'=>'form-control','disabled'=>'true','id'=>'year']) !!}
                            </div>
                        </div>
                    </div>
                    
                        {!! Form::submit(trans('common.save_exchange'),['class'=>'btn btn-primary']) !!}
                    
                {{Form::close()}}      
           </div>
       </div>
        
@endsection


@section('fotter')
    
    
<script>
    $('#type').change(function(){
        if($('#type').val() == 'varient'){
            if($('#peroid_type').val() == 'daily'){
                $('#day').removeAttr('disabled');
                $('#day').attr('required','required');
                $('#month').attr('required','required');
                $('#year').attr('required','required');
                $('#month').removeAttr('disabled');
                $('#year').removeAttr('disabled');
            }else if($('#peroid_type').val() == 'monthly'){
                $('#day').val('');
                $('#day').attr('disabled','true');
                $('#day').removeAttr('required');
                $('#month').removeAttr('disabled');
                $('#year').removeAttr('disabled');
                 $('#year').attr('required','required');
                  $('#month').attr('required','required');
            }else if($('#peroid_type').val() == 'yearly'){
                $('#day').val('');
                $('#day').attr('disabled','true');
                $('#day').removeAttr('required');
                $('#month').val('');
                $('#month').attr('disabled','true');
                $('#month').removeAttr('required');
                $('#year').removeAttr('disabled');
                $('#year').attr('required','required');
            } 
        }else{
                $('#day').val('');
                $('#day').attr('disabled','true');
                $('#month').val('');
                $('#month').attr('disabled','true');
                $('#year').val('');
                $('#year').attr('disabled','true');
                $('#day').removeAttr('required');
                $('#month').removeAttr('required');
                $('#year').removeAttr('required');
        }
    });




     $('#peroid_type').change(function(){
        if($('#type').val() == 'varient'){
            if($('#peroid_type').val() == 'daily'){
                
                $('#day').attr('required','required');
                $('#month').attr('required','required');
                $('#year').attr('required','required');
                $('#day').val('');
                $('#month').val('');
                $('#year').val('');
                $('#day').removeAttr('disabled');
                $('#month').removeAttr('disabled');
                $('#year').removeAttr('disabled');
            }else if($('#peroid_type').val() == 'monthly'){
                $('#day').val('');
                $('#day').attr('disabled','true');
                $('#day').removeAttr('required');
                $('#month').removeAttr('disabled');
                $('#year').removeAttr('disabled');
                $('#year').attr('required','required');
                $('#month').attr('required','required');
            }else if($('#peroid_type').val() == 'yearly'){
                $('#day').val('');
                $('#day').attr('disabled','true');
                $('#day').removeAttr('required');
                $('#month').val('');
                $('#month').attr('disabled','true');
                $('#month').removeAttr('required');
                $('#year').removeAttr('disabled');
                $('#year').attr('required','required');
            } 
        }else{
                $('#day').val('');
                $('#day').attr('disabled','true');
                $('#month').val('');
                $('#month').attr('disabled','true');
                $('#year').val('');
                $('#year').attr('disabled','true');
                $('#day').removeAttr('required');
                $('#month').removeAttr('required');
                $('#year').removeAttr('required');
        }
    });




</script>
    

   
@endsection