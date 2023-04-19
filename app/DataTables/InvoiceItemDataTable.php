<?php

namespace App\DataTables;

use App\Models\InvoiceItem;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Auth;

class InvoiceItemDataTable extends DataTable
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
            ->editColumn('UnitSalesPrice',function ($query) {
                return number_format($query->UnitSalesPrice,2);
            })
            ->editColumn('RegDscntAmt',function ($query) {
                return number_format($query->RegDscntAmt,2);
            })
            ->editColumn('SpcDscntAmt',function ($query) {
                return number_format($query->SpcDscntAmt,2);
            })
            ->editColumn('NetUnitPrice',function ($query) {
                return number_format($query->NetUnitPrice,2);
            })
            ->editColumn('NetAmount',function ($query) {
                return number_format($query->NetAmount,2);
            })
            ->escapeColumns([])
            ->setRowId('id');
    }

 
    /**
     * Get the query source of dataTable.
     */
    public function query(InvoiceItem $model): QueryBuilder
     {
        $model = InvoiceItem::select(['*'])
            ->where('invoice_id',$this->id );
        return $model;
        // return $model->newQuery();
     
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('invoice-items-table')
                    ->dom('')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->ordering(false)
                    // ->orderBy(1)
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
        // if(Auth::user()->can('invoice-show')){
        //     $showUrl ="<a class='waves-effect btn btn-success' title='show' data-value='$data->id' href='".route('invoices.show', $data->id)."'><i class='fas fa-fw fa-eye'></i></a> ";
        // }
        $editUrl ="";
        if(Auth::user()->can('invoice-edit')){
            $editUrl = "<a class='waves-effect btn btn-primary'  title='edit' data-value='$data->id' href='".route('invoices.edit', $data->id)."'><i class='fas fa-fw fa-pen'></i></a>";
        }
        $deleteUrl ="";
        if(Auth::user()->can('invoice-delete')){
            $deleteUrl ="<a class='waves-effect btn deepPink-bgcolor delete'  title='delete' data-value='$data->id' href='".route('invoices.destroy_item', ['id'=>$data->id, 'invid'=>$data->invoice_id])."'><i class='fas fa-fw fa-trash'></i></a>";
        }
        return $showUrl.$editUrl.$deleteUrl;
    }
    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
          
            Column::make('ItemCode')->title('Item No.'),
            Column::make('item_name')->title('Description')->className('w-25'),
            Column::make('Qty')->title('Quantity')->className('dt-body-right floatNum'),
            Column::make('UnitofMeasure')->title('Unit'),
            Column::make('VAT_Type')->title('VAT Type'),
            Column::make('UnitSalesPrice')->title('Unit Price')->className('dt-body-right floatNum'),
            Column::make('RegDscntAmt')->title('Regular Discount')->className('dt-body-right floatNum'),
            Column::make('SpcDscntAmt')->title('Special Discount')->className('dt-body-right floatNum') ,
            Column::make('NetUnitPrice')->title('Net Price')->className('dt-body-right floatNum') ,
            Column::make('NetAmount')->title('Net Amount')->className('dt-body-right floatNum') ,
            Column::computed('action')
            ->exportable(false)
            ->printable(false)
            
            ->width(100)
            ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'InvoiceItems_' . date('YmdHis');
    }
}
