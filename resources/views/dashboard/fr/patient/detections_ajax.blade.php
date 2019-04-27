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

