<?php

namespace App\DataTables;
use DB;
use App\Admin;
use Yajra\DataTables\Services\DataTable;

class HRDatatable extends DataTable
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
            ->addColumn('action', 'dashboard.admin.hr.buttons.btn')
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
        //return DB::table('admins')->select('league_name')->join('staff', 'staff.id', '=', 'admins.staff_id')->where('admins.role', '2')->get();
        return Admin::join('staff', 'staff.id',   '=', 'admins.staff_id')->where('admins.role','2')
        ->get();
        //from me
        
       
    }

    public static function lang(){
        $langJson = [
            "sProcessing" => trans('admin.processing'),
            "sLengthMenu" => trans('admin.select_menu_statment'),
            "sZeroRecords" => trans('admin.no_result'),
            "sEmptyTable" => trans('admin.no_data'),
            "sInfo" => trans('admin.end_state'),
            "sInfoEmpty" => trans('admin.end_state_empty'),
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
                            ['extend' => 'print', 'className'=>'btn btn-primary datatables_btn','text'=>'<i class="fa fa-print" style="margin-right:4px"></i> '.trans('admin.print')],
                            ['extend' => 'csv', 'className'=>'btn btn-info datatables_btn','text'=>'<i class="fa fa-file" style="margin-right:4px"></i> '.trans('admin.csv')],
                            ['extend' => 'postExcel', 'className'=>'btn btn-success datatables_btn','text'=>'<i class="fa fa-file" style="margin-right:4px"></i> Excel'],
                            ['extend' => 'pdf', 'className'=>'btn btn-warning datatables_btn','text'=>'<i class="fa fa-file" style="margin-right:4px"></i>PDF'],
                            ['className'=>'btn btn-primary datatables_btn','text'=>'<i class="fa fa-plus" style="margin-right:4px"></i> '.trans('admin.create_admin_button'),"action" => "function(){
                                    window.location.href = '".\URL::current()."/create';
                            }"
                            ],
                            ['className'=>'btn btn-danger datatables_btn delBTN_all','text'=>'<i class="fa fa-trash" style="margin-right:4px"></i> '.trans('admin.delete_admins_button')],
                             ['extend' => 'reload', 'className'=>'btn btn-default datatables_btn','text'=>'<i class="fa fa-refresh" style="margin-right:4px"></i>'],
                        ],

                        'initComplete' => " function(){
                            this.api().columns([2,3,4]).every(function(){
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
                'title'=> "Email", 
            ],
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
                'name'=>'gender',
                'data'=>'gender',
                'title'=> 'Gender' 
            ],
             [
                'name'=>'created_at',
                'data'=>'created_at',
                'title'=> 'Created_at' 
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
        return 'Admin_HR_' . date('YmdHis');
    }
}


