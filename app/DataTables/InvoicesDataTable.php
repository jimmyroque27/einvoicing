<?php

namespace App\DataTables;

use App\Models\Invoice;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Auth;

class InvoicesDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action',function ($data){
                return $this->getActionColumn($data);
            })
            ->editColumn('NetAmtPay',function ($query) {
                return number_format($query->NetAmtPay,2);
            })
            ->escapeColumns([])
            ->setRowId('id');
    }

 
    /**
     * Get the query source of dataTable.
     */
    public function query(Invoice $model): QueryBuilder
     {
        $model = Invoice::select(['*'])
            ->where('seller_id',session('user_tp_id'));
        return $model;
        // return $model->newQuery();
     
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('invoices-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
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
        $showUrl="";
        if(Auth::user()->can('invoice-show')){
            $showUrl ="<a class='waves-effect btn btn-success' title='show' data-value='$data->id' href='".route('invoices.show', $data->id)."'><i class='fas fa-fw fa-eye'></i></a> ";
        }
        $editUrl ="";
        if(Auth::user()->can('invoice-edit')){
            $editUrl = "<a class='waves-effect btn btn-primary'  title='edit' data-value='$data->id' href='".route('invoices.edit', $data->id)."'><i class='fas fa-fw fa-pen'></i></a>";
        }
        $deleteUrl ="";
        if(Auth::user()->can('invoice-delete')){
            $deleteUrl ="<a class='waves-effect btn deepPink-bgcolor delete'  title='delete' data-value='$data->id' href='".route('invoices.destroy', $data->id)."'><i class='fas fa-fw fa-trash'></i></a>";
        }
        return $showUrl.$editUrl.$deleteUrl;
    }
    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
          
            Column::make('InvoiceNumber')->title('Invoice No.'),
            Column::make('InvoiceDate')->title('Invoice Date'),
            Column::make('buyer_id')->title('Buyer ID'),
            Column::make('RegNm')->title('Buyer'),
            Column::make('OrderNumber')->title('Order No.'),
            Column::make('OrderDate')->title('Order Date'),
            Column::make('NetAmtPay')->className('dt-body-right floatNum') ,
            Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->width(60)
            ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Invoices_' . date('YmdHis');
    }
}
