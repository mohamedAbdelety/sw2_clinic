@extends('dashboard.layout.app')
@section('header')
    {!! Html::style('dashboard/plugins/datatables/dataTables.bootstrap.css') !!}
@endsection


@section('pageTitle')
 {{get_settings()->sitename}} | {{trans('common.manage_fr')}}
@endsection




@section('content')

        <div class="card">
           <div class="header">
                <h2 style="margin-top: 7px;">
                    <i class="material-icons pull-left" style="margin-top: -4px">person_add</i><span class="pull-left" style="margin-left: 10px">{{trans('common.manage_fr')}}</span>
                </h2>
                <br>
           </div>
           <div class="body">
                {!! $dataTable->table(['class'=>'dataTable table table-border table-hover'],true) !!}
            
        </div>
    </div>



@endsection






@section('fotter')
    {!! Html::script('dashboard/plugins/datatables/jquery.dataTables.min.js') !!}
    {!! Html::script('dashboard/plugins/datatables/dataTables.bootstrap.min.js') !!}
    {!! Html::script('vendor/datatables/buttons.server-side.js') !!}
    {!! Html::script('vendor/datatables/dataTables.buttons.min.js') !!}
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
        });
    </script>
    {!! $dataTable->scripts() !!}
@endsection
