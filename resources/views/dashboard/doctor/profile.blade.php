@extends('dashboard.layout.app')

@section('header')
    {!! Html::style('dashboard/plugins/bootstrap-select/css/bootstrap-select.css') !!}
    {!! Html::style('dashboard/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') !!}
    {!! Html::style('dashboard/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css') !!}
@endsection


@section('pageTitle')
 profile | {{Auth::user()->name}}
@endsection




@section('content')
	

	
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-3">
                    <div class="card profile-card">
                        <div class="profile-header">&nbsp;</div>
                        <div class="profile-body">
                            <div class="image-area">
                                @if(Auth::user()->image != null)
                                    <img src="{{ Storage::url(Auth::user()->image) }}" alt="AdminBSB - Profile Image" style="width:100px;height:100px" />
                                @else
                                    <img src="{{url('dashboard/images/user.png')}}" alt="AdminBSB - Profile Image" style="width:100px;height:100px" />
                                @endif
                            </div>
                            <div class="content-area">
                                <h4>{{Auth::user()->name}}</h4>
                                <p>{{get_role(Auth::user()->role,2)}}</p>
                            </div>
                        </div>
                        <div class="profile-footer">
                            <ul>
                                <li>
                                    <span>Register at</span>
                                    <?php
                                        $new_time = strtotime(Auth::user()->created_at);
                                        $last = date('M , Y',$new_time);
                                    ?>
                                    <span>{{$last}}</span>
                                </li>
                                <li>
                                    <span>Gender</span>
                                    <span>{{Auth::user()->gender}}</span>
                                </li>
                                <li>
                                    <span>weekend</span>
                                    <span>{{Auth::user()->weekend}}</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card card-about-me">
                        <div class="header">
                            <h2>ABOUT ME</h2>
                        </div>
                        <div class="body">
                            <ul>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">location_on</i>
                                        Address
                                    </div>
                                    <div class="content">
                                        {{Auth::user()->address}}
                                    </div>
                                </li>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">phone</i>
                                        Mobile
                                    </div>
                                    <div class="content">
                                        {{Auth::user()->mobile}}
                                    </div>
                                </li>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">notes</i>
                                        Description
                                    </div>
                                    <div class="content">
                                        start work at {{Auth::user()->start_at}} and finish work day at
                                        {{Auth::user()->end_at}}.
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-9">
                    <div class="card">
                        <div class="body">
                            <div>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab">Profile Settings</a></li>
                                    <li role="presentation"><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab">Change Password</a></li>
                                    <li role="presentation"><a href="#change_image" aria-controls="change_image" role="tab" data-toggle="tab">Change image</a></li>
                                </ul>

                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="profile_settings">
                                       
                                        {{Form::open(['novalidate'=>'novalidate','id'=>'form_validation','url' => 'dashboard/doctor/change/account','method'=>'POST','class'=>'form-horizontal demo-masked-input'])}}
                                            <div class="form-group">
                                                <label for="name" class="col-sm-2 control-label">User name</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        {!! Form::text('name',Auth::user()->name,['class'=>'form-control','id'=>'name']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Email" class="col-sm-2 control-label">Email</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        {!! Form::text('email',Auth::user()->email,['class'=>'form-control email']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="birthdate" class="col-sm-2 control-label">BirthDate</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line" id="bs_datepicker_container">
                                                        <?php
                                                            $date_arr = explode("-",Auth::user()->birthDate);
                                                            $birthDate =  $date_arr[2]."/".$date_arr[1]."/".$date_arr[0];
                                                        ?>
                                                        {!! Form::text('birthDate',$birthDate,['class'=>'form-control date','id'=>'birthdate']) !!}
                                                    </div>
                                                </div>         
                                            </div>
                                      
                                            <div class="form-group">
                                                <label for="mobile" class="col-sm-2 control-label">Mobile</label>

                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                       {!! Form::text('mobile',Auth::user()->mobile,['class'=>'form-control mobile-phone-number','id'=>'mobile']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="mobile" class="col-sm-2 control-label">Adderss</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                       {!! Form::text('address',Auth::user()->address,['class'=>'form-control','id'=>'address']) !!}
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <input required type="checkbox" name="check" id="terms_condition_check" class="chk-col-red filled-in" value="1"/>
                                                    <label for="terms_condition_check">I agree to the <a href="#">terms and conditions</a></label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    {!! Form::submit("Update",['class'=>'btn btn-danger']) !!}
                                                </div>
                                            </div>
                                        {{ Form::close() }}
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade in" id="change_password_settings">
                                        {{Form::open(['url' => 'dashboard/doctor/change/password','method'=>'POST','class'=>'form-horizontal'])}}
                                            <div class="form-group">
                                                <label for="oldpassword" class="col-sm-3 control-label">Old Password</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        {!! Form::password('oldpassword',['class'=>'form-control','placeholder'=>'Old Password','id'=>'oldpassword','required'=>'required']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="password" class="col-sm-3 control-label">New Password</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        {!! Form::password('password',['class'=>'form-control','placeholder'=>'New Password','id'=>'password','required'=>'required']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="newpasswordc" class="col-sm-3 control-label">New Password (Confirm)</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        {!! Form::password('password_confirmation',['class'=>'form-control','placeholder'=>'New Password Confirm','id'=>'newpasswordc','required'=>'required']) !!}
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    {!! Form::submit("Change Password",['class'=>'btn btn-danger']) !!}
                                                </div>
                                            </div>
                                        {{ Form::close() }}
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade in" id="change_image">
                                        {{Form::open(['url' => 'dashboard/doctor/change/image','method'=>'POST','class'=>'form-horizontal dropzone','id'=>'frmFileUpload','files'=>true])}}
                                            <!-- <div class="dz-message">
                                                <div class="drag-icon-cph">
                                                    <i class="material-icons">touch_app</i>
                                                </div>
                                                <h3>Drop image here or click to upload.</h3>
                                                <em>(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</em>
                                            </div> -->
                                            <!-- <div class="fallback"> -->
                                                <input name="image" type="file"/>
                                            <!-- </div>  -->                               
                                        {{Form::close()}}
                                        <br>
                                        {!! Form::submit("Change image",['class'=>'btn btn-danger col-sm-offset-5','form'=>'frmFileUpload']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection


@section('fotter')
@endsection
