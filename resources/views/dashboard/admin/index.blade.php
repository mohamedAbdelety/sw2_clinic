
@section('pageTitle')
 clinic | Dashboard
@endsection        
@include('dashboard.layout.header')
@include('dashboard.layout.nav')







<section class="content">
    

            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-indigo hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">group</i>
                        </div>
                        <div class="content">
                            <div class="text">{{trans('admin.doctor_count')}}</div>
                            <div class="number">{{$doctor_count}}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-teal hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">group</i>
                        </div>
                        <div class="content">
                            <div class="text">{{trans('admin.fr_count')}}</div>
                            <div class="number">{{$fr_count}}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person_outline</i>
                        </div>
                        <div class="content">
                            <div class="text">{{trans('admin.secratry_count')}}</div>
                            <div class="number">{{$secratry_count}}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-red hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">group</i>
                        </div>
                        <div class="content">
                            <div class="text">HR</div>
                            <div class="number">{{$another_hr_count}}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">group</i>
                        </div>
                        <div class="content">
                            <div class="text">{{trans('admin.patient_count')}}</div>
                            <div class="number">{{$patient_count}}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">group</i>
                        </div>
                        <div class="content">
                            <div class="text">{{trans('admin.employee_count')}}</div>
                            <div class="number">{{$employee_count}}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">tag</i>
                        </div>
                        <div class="content">
                            <div class="text">{{trans('admin.detection_count')}}</div>
                            <div class="number">{{$detection_count}}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-brown hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">tag</i>
                        </div>
                        <div class="content">
                            <div class="text">{{trans('admin.observation_count')}}</div>
                            <div class="number">{{$observation_count}}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-blue-grey hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">lock</i>
                        </div>
                        <div class="content">
                            <div class="text">{{trans('admin.block_count')}}</div>
                            <div class="number">{{$block_count}}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-lime hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">money</i>
                        </div>
                        <div class="content">
                            <div class="text">{{trans('admin.exchange_annual')}}</div>
                            <div class="number">{{$exchange_annual}}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">money</i>
                        </div>
                        <div class="content">
                            <div class="text">{{trans('admin.detection_year_price')}}</div>
                            <div class="number">{{$detection_year_price}}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-grey hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">money</i>
                        </div>
                        <div class="content">
                            <div class="text">{{trans('admin.detection_all_price')}}</div>
                            <div class="number">{{$detection_all_price}}</div>
                        </div>
                    </div>
                </div>
            </div>
           
             <div class="row">
                <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Bar Chart For Detection & Observation Last 5 Days</h2>
                        </div>
                        <div class="body">
                            <canvas id="doctor_bar_chart" height="150"></canvas>
                        </div>
                    </div>
                </div>
            </div> 
            
             <div class="row">
                <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Bar Chart For Detection & Observation Last Year</h2>
                        </div>
                        <div class="body">
                            <canvas id="admin_bar_chart" height="150"></canvas>
                        </div>
                    </div>
                </div>
            </div>    
           
 </section>









    {!! Html::script('dashboard/plugins/jquery/jquery.min.js') !!}
   
    {!! Html::script('dashboard/plugins/bootstrap/js/bootstrap.js') !!}
    {!! Html::script('dashboard/plugins/bootstrap-select/js/bootstrap-select.js') !!}
    {!! Html::script('dashboard/plugins/jquery-slimscroll/jquery.slimscroll.js') !!}
    
    {!! Html::script('dashboard/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js') !!}
    {!! Html::script('dashboard/plugins/dropzone/dropzone.js') !!}
    {!! Html::script('dashboard/plugins/jquery-inputmask/jquery.inputmask.bundle.js') !!}
    {!! Html::script('dashboard/plugins/multi-select/js/jquery.multi-select.js') !!}
    {!! Html::script('dashboard/plugins/jquery-spinner/js/jquery.spinner.js') !!}
    {!! Html::script('dashboard/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') !!}
    {!! Html::script('dashboard/plugins/nouislider/nouislider.js') !!}
    {!! Html::script('dashboard/plugins/node-waves/waves.js') !!}
    {!! Html::script('dashboard/plugins/chartjs/Chart.bundle.js') !!}
    {!! Html::script('dashboard/js/pages/forms/advanced-form-elements.js') !!}
    {!! Html::script('dashboard/js/demo.js') !!}     
    
    {!! Html::script('dashboard/plugins/jquery/jquery.min.js') !!}
    {!! Html::script('dashboard/js/admin.js') !!}
    <script>
        $(function () {
            new Chart(document.getElementById("doctor_bar_chart").getContext("2d"), getChartJs());
            new Chart(document.getElementById("admin_bar_chart").getContext("2d"), two());
        });
        function getChartJs() {
                return {
                    type: 'bar',
                    data: {
                        labels: [ "{{ date('D') }}","{{ date('D', strtotime('-1 days')) }}","{{ date('D', strtotime('-2 days')) }}","{{ date('D', strtotime('-3 days')) }}","{{ date('D', strtotime('-4 days')) }}"],
                        datasets: [{
                            label: "Detection",
                            data: ["{{$x1}}","{{$x2}}","{{$x3}}","{{$x4}}","{{$x5}}"],
                            backgroundColor: 'rgba(0, 188, 212, 0.8)'
                        }, {
                                label: "Observation",
                                data: ["{{$y1}}","{{$y2}}","{{$y3}}","{{$y4}}","{{$y5}}"],
                                backgroundColor: 'rgba(233, 30, 99, 0.8)'
                            }]
                    },
                    options: {
                        responsive: true,
                        legend: false
                    }
                }   
            }


           
            function two() {
                return {
                    type: 'bar',
                    data: {
                        labels:["January", "February", "March", "April", "May", "June", "July","Aug","Sep","Auc","Nov","Dec"],
                        datasets: [{
                            label: "Detection",
                            data: ["{{$x6}}","{{$x7}}","{{$x8}}","{{$x9}}","{{$x10}}","{{$x11}}","{{$x12}}","{{$x13}}","{{$x14}}","{{$x15}}","{{$x16}}","{{$x17}}"],
                            backgroundColor: 'rgba(0, 188, 212, 0.8)'
                        }, {
                                label: "Observation",
                                data: ["{{$y6}}","{{$y7}}","{{$y8}}","{{$y9}}","{{$y10}}","{{$y11}}","{{$y12}}","{{$y13}}","{{$y14}}","{{$y15}}","{{$y16}}","{{$y17}}"],
                                backgroundColor: 'rgba(233, 30, 99, 0.8)'
                            }]
                    },
                    options: {
                        responsive: true,
                        legend: false
                    }
                }   
            }
     </script>
</body>
</html>