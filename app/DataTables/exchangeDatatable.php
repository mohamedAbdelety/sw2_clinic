<?php

namespace App\DataTables;
use DB;
use App\Exchange;
use Yajra\DataTables\Services\DataTable;
use Auth;
class ExchangeDatatable extends DataTable
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
            ->addColumn('action', 'dashboard.fr.exchange.buttons.btn')
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
         return Exchange::get();
        
       
    }

    public static function lang(){
        $langJson = [
            "sProcessing" => trans('admin.processing'),
            "sLengthMenu" => trans('admin.select_menu_statment_exchange'),
            "sZeroRecords" => trans('admin.no_result_exchange'),
            "sEmptyTable" => trans('admin.no_data_exchange'),
            "sInfo" => trans('admin.end_state_exchange'),
            "sInfoEmpty" => trans('admin.end_state_empty_exchange'),
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
                    ->parameters([
                        'dom' => 'Blfrtip',
                        'LengthMenu'=>[[10,25,50,100,-1],[10,25,50,100,'All Admins']],
                        'buttons' => [//'csv', 'excel', 'pdf', 'print', 'reset', 'reload'
                            ['extend' => 'print', 'className'=>'btn btn-info datatables_btn','text'=>'<i class="fa fa-print" style="margin-right:4px"></i> '.trans('admin.print')],
                            ['className'=>'btn btn-success datatables_btn','text'=>'<i class="fa fa-plus" style="margin-right:4px"></i> '.trans('admin.create_exchange_button'),"action" => "function(){
                                    window.location.href = '".\URL::current()."/create';
                            }"
                            ],
                             ['extend' => 'reload', 'className'=>'btn btn-danger datatables_btn','text'=>'<i class="fa fa-refresh" style="margin-right:4px"></i>'],
                        ],

                        'initComplete' => " function(){
                            this.api().columns([0,1,2]).every(function(){
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
                'title'=> trans('common.exchange_name'), 
            ],
            [
                'name'=>'type',
                'data'=>'type',
                'title'=> trans('common.type'), 
            ],
            [
                'name'=>'peroid_type',
                'data'=>'peroid_type',
                'title'=> trans('common.peroid_type'), 
            ],
            
            [
                'name'=>'category',
                'data'=>'category',
                'title'=> trans('common.category'), 
            ],
            [
                'name'=>'value',
                'data'=>'value',
                'title'=> trans('common.exchange_value'), 
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


