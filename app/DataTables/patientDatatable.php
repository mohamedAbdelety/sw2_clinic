<?php

namespace App\DataTables;
use DB;
use App\Patient;
use Yajra\DataTables\Services\DataTable;
use Auth;
class patientDatatable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {

        if(Auth::user()->role == 2){
            return datatables($query);    
        }else{
            return datatables($query)
            ->addColumn('action', 'dashboard.secratry.patient.buttons.btn')
            ->rawColumns(['action']);
        }
        
            
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
       
        return Patient::OrderBy('id','desc')->get();
       
       
    }

    public static function lang(){
        $langJson = [
            "sProcessing" => trans('admin.processing'),
            "sLengthMenu" => trans('admin.select_menu_statment_patient'),
            "sZeroRecords" => trans('admin.no_result_patient'),
            "sEmptyTable" => trans('admin.no_data_patient'),
            "sInfo" => trans('admin.end_state_patient'),
            "sInfoEmpty" => trans('admin.end_state_empty_patient'),
            "sInfoFiltered" => "",
            "sInfoPostFix" => "",
            "sSearch" => trans('admin.search_data'),
            "sUrl" => "",
            "sInfoThousands" => ",",
            "sLoadingRecords" => trans('admin.processing'),
            "oPaginate" => [
                "sFirst" => trans('admin.first'),
                "sLast" => trans('admin.last'),
                "sNext" => trans('admin.next'),
                "sPrevious" => trans('admin.previous')
            ],
            "oAria" => [
                "sSortAscending" => trans('admin.sort_asc'),
                "sSortDescending" => trans('admin.sort_desc')
            ]
        ];
        return $langJson;
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        if(Auth::user()->role == 2){
        return $this->builder()
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->parameters([
                        'dom' => 'Blfrtip',
                        'LengthMenu'=>[[10,25,50,100,-1],[10,25,50,100,'All Admins']],
                        
                        'buttons' => [//'csv', 'excel', 'pdf', 'print', 'reset', 'reload'
                            ['extend' => 'print', 'className'=>'btn btn-info datatables_btn','text'=>'<i class="fa fa-print" style="margin-right:4px"></i> '.trans('admin.print')],
                             ['extend' => 'reload', 'className'=>'btn btn-danger datatables_btn','text'=>'<i class="fa fa-refresh" style="margin-right:4px"></i>'],
                        ],
                        'initComplete' => " function(){
                            this.api().columns([1,2]).every(function(){
                                var column = this;
                                var input = document.createElement('input');
                                $(input).appendTo($(column.footer()).empty()).on('keyup',function(){
                                    column.search($(this).val(),false,false,true).draw();
                                });
                            });
                        }",

                        'language' => self::lang(),
                    ]);
                }else{
                    return $this->builder()
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->parameters([
                        'dom' => 'Blfrtip',
                        'LengthMenu'=>[[10,25,50,100,-1],[10,25,50,100,'All Admins']],
                       
                        
                           'buttons' => [//'csv', 'excel', 'pdf', 'print', 'reset', 'reload'
                            ['extend' => 'print', 'className'=>'btn btn-info datatables_btn','text'=>'<i class="fa fa-print" style="margin-right:4px"></i> '.trans('admin.print')],
                            ['className'=>'btn btn-success datatables_btn','text'=>'<i class="fa fa-plus" style="margin-right:4px"></i> '.trans('admin.create_patient_button'),"action" => "function(){
                                    window.location.href = '".\URL::current()."/create';
                            }"
                            ],
                             ['extend' => 'reload', 'className'=>'btn btn-danger datatables_btn','text'=>'<i class="fa fa-refresh" style="margin-right:4px"></i>'],
                        ], 
                        
                        'initComplete' => " function(){
                            this.api().columns([1,2]).every(function(){
                                var column = this;
                                var input = document.createElement('input');
                                $(input).appendTo($(column.footer()).empty()).on('keyup',function(){
                                    column.search($(this).val(),false,false,true).draw();
                                });
                            });
                        }",

                        'language' => self::lang(),
                    ]);




                }
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        if(Auth::user()->role == 2){
             return [
            
            [
                'name'=>'id',
                'data'=>'id',
                'title'=>"#",
            ],
          
            [
                'name'=>'name',
                'data'=>'name',
                'title'=> trans('admin.patient_name_title')  
            ],

            [
                'name'=>'age',
                'data'=>'age',
                'title'=> trans('admin.patient_age_title')  
            ],
            
           [
                'name'=>'address',
                'data'=>'address',
                'title'=> trans('common.address') 
            ], 
           
            [
                'name'=>'mobile',
                'data'=>'mobile',
                'title'=> trans('common.mobile') 
            ],
             [
                'name'=>'created_at',
                'data'=>'created_at',
                'title'=> trans('admin.createdin_title')
            ]
            ];
        }else{
            return [
            
            [
                'name'=>'id',
                'data'=>'id',
                'title'=>"#",
            ],
          
            [
                'name'=>'name',
                'data'=>'name',
                'title'=> trans('admin.patient_name_title')  
            ],

            [
                'name'=>'age',
                'data'=>'age',
                'title'=> trans('admin.patient_age_title')  
            ],
            
           [
                'name'=>'address',
                'data'=>'address',
                'title'=> trans('common.address') 
            ], 
           
            [
                'name'=>'mobile',
                'data'=>'mobile',
                'title'=> trans('common.mobile') 
            ],
             [
                'name'=>'created_at',
                'data'=>'created_at',
                'title'=> trans('admin.createdin_title')
            ],
            [
                    'name'=>'action',
                    'data'=>'action',
                    'title'=>'controll',
                    'exportable'=>false,
                    'printable'=>false,
                    'orderable'=>false,
                    'searchable'=>false 
            ]
            ];
        }
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Patient_' . date('YmdHis');
    }
}


