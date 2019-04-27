<?php

namespace App\DataTables;
use DB;
use App\Doctor;
use Yajra\DataTables\Services\DataTable;
use Auth;
class DoctorDatatable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {

        if(Auth::user()->role == 1 && get_second_role(Auth::user()->id) == 2){
        return datatables($query)
            ->addColumn('action', 'dashboard.hr.doctor.buttons.btn')
            ->rawColumns(['action']);
            }elseif(Auth::user()->role == 1 && get_second_role(Auth::user()->id) == 1){
                return datatables($query)
            ->addColumn('action', 'dashboard.admin.doctor.buttons.btn')
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
        //return DB::table('admins')->select('league_name')->join('staff', 'staff.id', '=', 'admins.staff_id')->where('admins.role', '2')->get();
        return Doctor::join('staff', 'staff.id',   '=', 'doctors.staff_id')
        ->get();
        //from me
        
       
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
                            ['className'=>'btn btn-success datatables_btn','text'=>'<i class="fa fa-plus" style="margin-right:4px"></i> '.trans('admin.create_doctor_button'),"action" => "function(){
                                    window.location.href = '".\URL::current()."/create';
                            }"
                            ],
                             ['extend' => 'reload', 'className'=>'btn btn-danger datatables_btn','text'=>'<i class="fa fa-refresh" style="margin-right:4px"></i>'],
                        ],

                        'initComplete' => " function(){
                            this.api().columns([1,2,3]).every(function(){
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
                'name'=>'id',
                'data'=>'id',
                'title'=>"#",
            ],
           [
                'name'=>'email',
                'data'=>'email',
                'title'=> trans('admin.email'), 
            ],
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
                'name'=>'position',
                'data'=>'position',
                'title'=>  trans('common.position') 
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
        return 'Doctor_' . date('YmdHis');
    }
}


