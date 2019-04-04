<a href="{{url('dashboard/hr/controll/secretary/'.$id.'/edit')}}"><span class="btn btn-info"><i class="material-icons">edit</i></span></a>



<!-- Modal -->
<div id="sigle_del{{$id}}" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete Secretary</h4>
      </div>
      <div class="modal-body">
        <p class="alert alert-warning">{{ trans('admin.are_sure_single',['name'=>$name]) }}</p>
      </div>
      <div class="modal-footer">
        
	        {!!Form::submit(trans('admin.yes'),['class'=>'btn btn-danger','data-dismiss'=>'model']) !!}
	        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('admin.no') }}</button>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>