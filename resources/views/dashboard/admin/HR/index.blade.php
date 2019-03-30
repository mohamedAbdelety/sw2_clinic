@extends('dashboard.layout.app')

@section('header')
	
@endsection


@section('pageTitle')
 {{trans('admin.hr_panel')}}
@endsection




@section('content')

	
	 <div class="card">
           <div class="header">
                <h2 style="margin-top: 7px;">
                    <i class="material-icons pull-left" style="margin-top: -4px">person_add</i><span class="pull-left" style="margin-left: 10px">Manage HR</span>
                </h2>
                <br>
           </div>
           		<div class="body">
                 
           		 <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        
                                       
                                        <tr>
                                            <td>Cara Stevens</td>
                                            <td>Sales Assistant</td>
                                            <td>New York</td>
                                            <td>46</td>
                                            <td>2011/12/06</td>
                                            <td>$145,600</td>
                                        </tr>
                                        <tr>
                                            <td>Hermione Butler</td>
                                            <td>Regional Director</td>
                                            <td>London</td>
                                            <td>47</td>
                                            <td>2011/03/21</td>
                                            <td>$356,250</td>
                                        </tr>
                                        <tr>
                                            <td>Lael Greer</td>
                                            <td>Systems Administrator</td>
                                            <td>London</td>
                                            <td>21</td>
                                            <td>2009/02/27</td>
                                            <td>$103,500</td>
                                        </tr>
                                        <tr>
                                            <td>Jonas Alexander</td>
                                            <td>Developer</td>
                                            <td>San Francisco</td>
                                            <td>30</td>
                                            <td>2010/07/14</td>
                                            <td>$86,500</td>
                                        </tr>
                                        <tr>
                                            <td>Shad Decker</td>
                                            <td>Regional Director</td>
                                            <td>Edinburgh</td>
                                            <td>51</td>
                                            <td>2008/11/13</td>
                                            <td>$183,000</td>
                                        </tr>
                                        <tr>
                                            <td>Michael Bruce</td>
                                            <td>Javascript Developer</td>
                                            <td>Singapore</td>
                                            <td>29</td>
                                            <td>2011/06/27</td>
                                            <td>$183,000</td>
                                        </tr>
                                        <tr>
                                            <td>Donna Snider</td>
                                            <td>Customer Support</td>
                                            <td>New York</td>
                                            <td>27</td>
                                            <td>2011/01/25</td>
                                            <td>$112,000</td>
                                        </tr>
                                    </tbody>
                                </table>
                </div>                 
           </div>
       </div>

@endsection






@section('fotter')
	
    
    
	{!! Html::script('dashboard/plugins/jquery-datatable/jquery.dataTables.js') !!}
	{!! Html::script('dashboard/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') !!}


	{!! Html::script('dashboard/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') !!}
	{!! Html::script('dashboard/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') !!}
	{!! Html::script('dashboard/plugins/jquery-datatable/extensions/export/jszip.min.js') !!}
	{!! Html::script('dashboard/plugins/jquery-datatable/extensions/export/pdfmake.min.js') !!}
	{!! Html::script('dashboard/plugins/jquery-datatable/extensions/export/vfs_fonts.js') !!}
	{!! Html::script('dashboard/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') !!}
	{!! Html::script('dashboard/plugins/jquery-datatable/extensions/export/buttons.print.min.js') !!}

	{!! Html::script('dashboard/js/pages/tables/jquery-datatable.js') !!}

	
	{!! Html::script('dashboard/js/admin.js') !!}
	{!! Html::script('dashboard/js/demo.js') !!}
	
	
	
@endsection
