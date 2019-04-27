<?php

namespace App\DataTables;
use DB;
use App\Detection;
use Yajra\DataTables\Services\DataTable;
use Auth;
class notpullDatatable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {

        
        return datatables($query)
            ->addColumn('action', 'dashboard.secratry.patient.buttons.notpull')
            ->rawColumns(['action']);
            
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
       //detections_created_at
        return Detection::join('patients', 'patients.id',   '=', 'detections.patient_id')->where('detections.pull','0')->where('detections.doctor_id',get_doctorid_forsecratry(Auth::user()->id))
        ->select('detections.id',
            'detections.price','detections.created_at','patients.mobile','patients.name'
        )
        ->get();
    }

    public static function lang(){
        $langJson = [
            "sProcessing" => trans('admin.processing'),
            "sLengthMenu" => trans('admin.select_menu_statment_detection'),
            "sZeroRecords" => trans('admin.no_result_detection'),
            "sEmptyTable" => trans('admin.no_data_detection'),
            "sInfo" => trans('admin.end_state_detection'),
            "sInfoEmpty" => trans('admin.end_state_empty_detection'),
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
        return $this->builder()
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->addAction(['width' => '80px'])
                    //->parameters($this->getBuilderParameters())
                    ->parameters([
                        'dom' => 'Blfrtip',
                        'LengthMenu'=>[[10,25,50,100,-1],[10,25,50,100,'All Admins']],
                        'buttons' => [//'csv', 'excel', 'pdf', 'print', 'reset', 'reload'
                            ['extend' => 'print', 'className'=>'btn btn-info datatables_btn','text'=>'<i class="fa fa-print" style="margin-right:4px"></i> '.trans('admin.print')],
                            ['className'=>'btn btn-danger datatables_btn','text'=>'<i class="fa fa-trash" style="margin-right:4px"></i> '.trans('admin.delete_all_notpull_button'),"action" => "function(){
                                    window.location.href = '".\URL::current()."/delete/all';
                            }"
                            ],
                             ['extend' => 'reload', 'className'=>'btn btn-danger datatables_btn','text'=>'<i class="fa fa-refresh" style="margin-right:4px"></i>'],
                        ],

                        'initComplete' => " function(){
                            this.api().columns([0,1]).every(function(){
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

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            
           
            [
                'name'=>'name',
                'data'=>'name',
                'title'=> trans('admin.patient_name_title')  
            ],

            [
                'name'=>'mobile',
                'data'=>'mobile',
                'title'=> trans('common.mobile') 
            ],
            [
                'name'=>'price',
                'data'=>'price',
                'title'=> trans('common.price') 
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
            ],
        ];
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


