@extends('dashboard.layout.app')

@section('header')

@endsection


@section('pageTitle')
 clinic | Dashboard
@endsection




@section('content')
	

	<div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-indigo hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person_outline</i>
                        </div>
                        <div class="content">
                            <div class="text">{{trans('admin.employee_salary_payable')}}</div>
                            <div class="number">{{$employee_salary_payable}}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-teal hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person_outline</i>
                        </div>
                        <div class="content">
                            <div class="text">{{trans('admin.secratry_salary_payable')}}</div>
                            <div class="number">{{$secratry_salary_payable}}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person_outline</i>
                        </div>
                        <div class="content">
                            <div class="text">{{trans('admin.doctor_salary_payable')}}</div>
                            <div class="number">{{$doctor_salary_payable}}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-red hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">group</i>
                        </div>
                        <div class="content">
                            <div class="text">{{trans('admin.another_fr')}}</div>
                            <div class="number">{{$another_fr}}</div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="body bg-cyan">
                            <div class="m-b--35 font-bold">{{trans('admin.detections_box')}}</div>
                            <ul class="dashboard-stat-list">
                                <li>
                                    {{trans('admin.detection_today')}}
                                    <span class="pull-right">
                                       {{$detection_today}}
                                    </span>
                                </li>
                                <li>
                                    {{trans('admin.detection_price_today')}}
                                    <span class="pull-right">
                                        {{$detection_today_price}}
                                    </span>
                                </li>
                                <li>
                                    {{trans('admin.detection_payed_today')}}
                                    <span class="pull-right">
                                        {{$detection_payed_today}}
                                    </span>
                                </li>
                                <li>
                                    {{trans('admin.detection_price_payed_today')}}
                                    <span class="pull-right">
                                        {{$detection_price_payed_today}}
                                    </span>
                                </li>
                                <li>
                                    {{trans('admin.detection_all')}}
                                    <span class="pull-right">
                                        {{$detection_all}}
                                    </span>
                                </li>
                                <li>
                                    {{trans('admin.detection_all_price')}}
                                    <span class="pull-right">
                                        {{$detection_all_price}}
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="body bg-purple">
                            <div class="m-b--35 font-bold">{{trans('admin.exchange_box')}}</div>
                            <ul class="dashboard-stat-list">
                                <li>
                                    {{trans('admin.exchange_standard')}}
                                    <span class="pull-right">
                                       {{$exchange_standard}}
                                    </span>
                                </li>
                                <li>
                                    {{trans('admin.exchange_varient')}}
                                    <span class="pull-right">
                                        {{$exchange_varient}}
                                    </span>
                                </li>
                                <li>
                                    {{trans('admin.exchange_standard_daily')}}
                                    <span class="pull-right">
                                        {{$exchange_standard_daily}}
                                    </span>
                                </li>
                                <li>
                                    {{trans('admin.exchange_standard_monthly')}}
                                    <span class="pull-right">
                                        {{$exchange_standard_monthly}}
                                    </span>
                                </li>
                                <li>
                                    {{trans('admin.exchange_standard_yearly')}}
                                    <span class="pull-right">
                                        {{$exchange_standard_yearly}}
                                    </span>
                                </li>
                                <li>
                                    {{trans('admin.exchange_all_price')}}
                                    <span class="pull-right">
                                        {{$exchange_all}}
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="body bg-grey">
                            <div class="m-b--35 font-bold">{{trans('admin.salary_box')}}</div>
                            <ul class="dashboard-stat-list">
                                <li>
                                    {{trans('admin.secratry_count')}}
                                    <span class="pull-right">
                                       {{$secratry_count}}
                                    </span>
                                </li>
                                <li>
                                    {{trans('admin.secratry_salary')}}
                                    <span class="pull-right">
                                       {{$secratry_salary}}
                                    </span>
                                </li>
                                <li>
                                    {{trans('admin.employee_count')}}
                                    <span class="pull-right">
                                       {{$employee_count}}
                                    </span>
                                </li>
                                <li>
                                    {{trans('admin.employee_salary')}}
                                    <span class="pull-right">
                                        {{$employee_salary}}
                                    </span>
                                </li>
                                <li>
                                    {{trans('admin.doctor_count')}}
                                    <span class="pull-right">
                                       {{$doctor_count}}
                                    </span>
                                </li>
                                <li>
                                    {{trans('admin.doctor_max_dectsalary')}}
                                    <span class="pull-right">
                                        {{$doctor_max_dectsalary}}
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

@endsection


@section('fotter')

@endsection
