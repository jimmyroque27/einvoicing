<?php

namespace App\DataTables;

use App\Models\TaxPayer;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Auth;

class TaxPayersDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            // ->addColumn('action', 'sellers.action')
            ->addColumn('action',function ($data){
                return $this->getActionColumn($data);
            })
            ->setRowId('id');
    }

 
    /**
     * Get the query source of dataTable.
     */
    public function query(TaxPayer $model): QueryBuilder
     {
        if (  (session('role_name')=="Admin" || session('role_name')=="admin")){
            $model = TaxPayer::select('*',
                \DB::raw('(CASE WHEN tax_payers.tp_classification = 2 THEN "Corp" 
                    ELSE "Ind" 
                    END) as tp_classification'));
        }else{
            $model = TaxPayer::select('tax_payers.*','user_tax_payers.status',
            \DB::raw('(CASE WHEN tax_payers.tp_classification = 2 THEN "Corp." 
                     ELSE "Ind." 
                     END) as tp_classification'))
            ->join('user_tax_payers', 'user_tax_payers.tp_id', '=', 'tax_payers.tp_id')
            ->where('user_tax_payers.user_id','=',Auth::user()->id);
        }
        

        return $model;
        // return $model->newQuery();
     
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('taxpayers-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    // ->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle();
                    

                    // ->buttons([
                    //     Button::make('excel'),
                    //     Button::make('csv'),
                    //     Button::make('pdf'),
                    //     Button::make('print'),
                    //     Button::make('reset'),
                    //     Button::make('reload')
                    // ]);
    }
    protected function getActionColumn($data): string
    {
        $statusUrl ="<a class='waves-effect  text-danger' title='off' data-value='$data->id' href='".route('usertaxpayers.statusOn', $data->tp_id)."'><i class='fas fa-fw fa-toggle-off'></i></a> ";
        if ((session('role_name')=="Admin" || session('role_name')=="admin")){
            if(( session('user_tp_id')==$data->tp_id)){             
                $statusUrl ="<a class='waves-effect   text-success' title='on' data-value='$data->id' href='".route('usertaxpayers.statusOn', $data->tp_id)."'><i class='fas fa-fw fa-toggle-on'></i></a> ";
            }
        }else{
            if($data->status=='on'){
                $statusUrl ="<a class='waves-effect   text-success' title='on' data-value='$data->id' href='".route('usertaxpayers.statusOn', $data->tp_id)."'><i class='fas fa-fw fa-toggle-on'></i></a> ";
            }
        }
        if(Auth::user()->can('taxpayer-show')){
            $showUrl ="<a class='waves-effect btn btn-success' title='show' data-value='$data->id' href='".route('taxpayers.show', $data->id)."'><i class='fas fa-fw fa-eye'></i></a> ";
        }
        $editUrl ="";
        if(Auth::user()->can('taxpayer-edit')){
            $editUrl = "<a class='waves-effect btn btn-primary'  title='edit' data-value='$data->id' href='".route('taxpayers.edit', $data->id)."'><i class='fas fa-fw fa-pen'></i></a>";
        }
        $deleteUrl ="";
        if(Auth::user()->can('taxpayer-delete')){
            $deleteUrl ="<a class='waves-effect btn deepPink-bgcolor delete'  title='delete' data-value='$data->id' href='".route('taxpayers.destroy', $data->id)."'><i class='fas fa-fw fa-trash'></i></a>";
        }
        return $statusUrl.$showUrl.$editUrl.$deleteUrl;
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
          
            // Column::make('id'),
            Column::make('tp_id')->title("TP ID"),
            Column::make('tp_classification')->title("Tax Type"),
            Column::make('registered_name')->title("Tax Payer's Name"),
            Column::make('Tin')->title("Tin"),
            Column::make('TIN_BranchCode')->title("Branch"),
            Column::make('business_email_address')->title("business_email_address Address"),
            Column::make('contact_number')->title("Contact No."),
            Column::make('City')->title("City"),
            Column::make('Province')->title("Province"),
            Column::computed('action')
            ->exportable(false)
            ->printable(true)
            // ->width(100)
            ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'TaxPayer_' . date('YmdHis');
    }
}
