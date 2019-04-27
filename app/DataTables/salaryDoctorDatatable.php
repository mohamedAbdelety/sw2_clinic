<?php

namespace App\DataTables;
use DB;
use App\Doctor;
use Yajra\DataTables\Services\DataTable;
use Auth;
class salaryDoctorDatatable extends DataTable
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
            ->addColumn('action', 'dashboard.fr.salary.buttons.doctor.btn')
            ->addColumn('payabledetections', 'dashboard.fr.salary.buttons.doctor.payabledetections')
            ->addColumn('payablesalary', 'dashboard.fr.salary.buttons.doctor.payablesalary')
            ->rawColumns(['action','payabledetections','payablesalary']);
            
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        //return DB::table('admins')->select('league_name')->join('staff', 'staff.id', '=', 'admins.staff_id')->where('admins.role', '2')->get();
        return Doctor::join('staff', 'staff.id',   '=', 'doctors.staff_id')->select('doctors.id as doctorID','doctors.Dectsalary','doctors.payedDetections','doctors.specail','staff.id','staff.name','staff.mobile')->get();
        
    }

    public static function lang(){
        $langJson = [
            "sProcessing" => trans('admin.processing'),
            "sLengthMenu" => trans('admin.select_menu_statment_doctor'),
            "sZeroRecords" => trans('admin.no_result_doctor'),
            "sEmptyTable" => trans('admin.no_data_doctor'),
            "sInfo" => trans('admin.end_state_doctor'),
            "sInfoEmpty" => trans('admin.end_state_empty_doctor'),
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
                'title'=> trans('admin.doctor_name_title')  
            ],
            [
                'name'=>'specail',
                'data'=>'specail',
                'title'=> trans('common.spacil')  
            ],
            [
                'name'=>'mobile',
                'data'=>'mobile',
                'title'=> trans('common.mobile') 
            ],
            [
                'name'=>'Dectsalary',
                'data'=>'Dectsalary',
                'title'=> trans('common.price_dect') 
            ],
            [
                'name'=>'payabledetections',
                'data'=>'payabledetections',
                'title'=> trans('admin.doctor_payabledetections_title') 
            ],
            [
                'name'=>'payablesalary',
                'data'=>'payablesalary',
                'title'=> trans('admin.employee_payablesalary_title') 
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
        return 'Doctor_Salary' . date('YmdHis');
    }
}


