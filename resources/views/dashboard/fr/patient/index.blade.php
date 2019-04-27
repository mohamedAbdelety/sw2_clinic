@extends('dashboard.layout.app')
@section('header')
    {!! Html::style('dashboard/plugins/datatables/dataTables.bootstrap.css') !!}
    <style>
      .testing{
        background: #e9e9e9;
        font-size: 20px;

      }
      .search-div{
        margin-bottom: 40px;
        margin-top: 20px;
      }


    </style>
@endsection


@section('pageTitle')
 {{get_settings()->sitename}} | {{trans('common.price_dect')}}
@endsection




@section('content')

        
           
          
                
                
                      <div class="col-md-8 col-md-offset-2 search-div">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons" style="font-size: 28px">search</i>
                            </span>
                            <div class="form-line">
                                {!! Form::text('search','',['autocomplete'=>'off','id'=>'search','placeholder'=>'Search...','class'=>'form-control testing']) !!}
                            </div>
                        </div>
                      </div>  
                
                <section id="content_detections">
                    @foreach($detections as $dect)
                      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                      <div class="card">
                        <div class="header bg-cyan">
                            <h2>
                                {{$dect->name}}
                            </h2>
                        </div>
                        <div class="body">
                            <p>Price : {{$dect->price}}</p>
                            <p>Created at : {{$dect->created_at}}</p>
                            <p>With Doctor : {{get_doctorby_id($dect->doctor_id)}}</p>
                            <span onclick="pull(<?php echo $dect->id ?>)"><span class="btn btn-info"><i class="material-icons">done_all</i></span></span>
                        </div>
                      </div>
                      </div>
                    @endforeach
               </section>


@endsection






@section('fotter')
   <script>
     $('#search').keyup(function(){       
            $.get('/dashboard/fr/detection/price/search/',{keyword:$('#search').val()},function(data){
              $('#content_detections').html(data);
            });
     });
     
     var clock = setInterval(function(){
        $.get('/dashboard/fr/detection/price/search/',{keyword:$('#search').val()},function(data){
              $('#content_detections').html(data);
            });
      },3000);
     

     function pull(id){
         $.get('/dashboard/fr/detection/price/pull/',{id:id},function(data){
            document.getElementById("search").value = '';  
             $('#content_detections').html(data);
         });
     }
   </script>
@endsection
