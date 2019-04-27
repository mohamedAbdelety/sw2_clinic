<?php

namespace App\DataTables;
use DB;
use App\Detection;
use Yajra\DataTables\Services\DataTable;
use Auth;
class detection_doctor_todayDatatable extends DataTable
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
            ->addColumn('state', 'dashboard.doctor.patient.buttons.today_state')
            ->addColumn('type', 'dashboard.doctor.patient.buttons.today_type')
            ->rawColumns(['state','type']);
            
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
     
         return Detection::join('patients', 'patients.id','=', 'detections.patient_id')->where('detections.pull','1')->where('detections.doctor_id',get_doctorid(Auth::user()->id))->whereBetween('detections.created_at',[date('Y-m-d 00:00:00',time()),date('Y-m-d 23:59:59',time())])
        ->select('detections.id','detections.price','patients.job','patients.address','detections.send','detections.finish','detections.created_at','patients.mobile','patients.name','detections.detection_id')->get();
    }

    public static function lang(){
        $langJson = [
            "sProcessing" => trans('admin.processing'),
            "sLengthMenu" => trans('admin.select_menu_statment_detection_today'),
            "sZeroRecords" => trans('admin.no_result_detection_today'),
            "sEmptyTable" => trans('admin.no_data_detection_today'),
            "sInfo" => trans('admin.end_state_detection_today'),
            "sInfoEmpty" => trans('admin.end_state_empty_detection_today'),
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
                'name'=>'job',
                'data'=>'job',
                'title'=> trans('common.patient_job') 
            ],
            [
                'name'=>'address',
                'data'=>'address',
                'title'=> trans('common.address') 
            ],
             [
                'name'=>'created_at',
                'data'=>'created_at',
                'title'=> trans('admin.createdin_title')
            ],
            [
                'name'=>'type',
                'data'=>'type',
                'title'=> trans('common.type')
            ],
            [
                'name'=>'state',
                'data'=>'state',
                'title'=>trans('common.state'),
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



