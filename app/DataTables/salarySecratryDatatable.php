<?php

namespace App\DataTables;
use DB;
use App\Secretary;
use Yajra\DataTables\Services\DataTable;
use Auth;
class salarySecratryDatatable extends DataTable
{
    
    public function dataTable($query)
    {

            return datatables($query)
            ->addColumn('action', 'dashboard.fr.salary.buttons.secratry.btn')
            ->addColumn('payablemonthes', 'dashboard.fr.salary.buttons.secratry.payablemonthes')
            ->addColumn('payablesalary', 'dashboard.fr.salary.buttons.secratry.payablesalary')
            ->rawColumns(['action','payablemonthes','payablesalary']);        
    }

    
    public function query()
    {
        return Secretary::join('staff', 'staff.id',   '=', 'secretaries.staff_id')->select('secretaries.id as secratryID','secretaries.salary','secretaries.last_month','secretaries.last_year','secretaries.month_number','staff.id','staff.name','staff.mobile','staff.created_at')->get();
    }

    public static function lang(){
        $langJson = [
           "sProcessing" => trans('admin.processing'),
            "sLengthMenu" => trans('admin.select_menu_statment_secretary'),
            "sZeroRecords" => trans('admin.no_result_secretary'),
            "sEmptyTable" => trans('admin.no_data_secretary'),
            "sInfo" => trans('admin.end_state_secretary'),
            "sInfoEmpty" => trans('admin.end_state_empty_secretary'),
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
                'title'=> "Name"  
            ],
            [
                'name'=>'mobile',
                'data'=>'mobile',
                'title'=> 'Mobile' 
            ],
            [
                'name'=>'salary',
                'data'=>'salary',
                'title'=> trans('admin.employee_salarypermonth_title') 
            ],
            [
                'name'=>'payablemonthes',
                'data'=>'payablemonthes',
                'title'=> trans('admin.employee_payablemonthes_title') 
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
        return 'Salary_Secratry_' . date('YmdHis');
    }
}


