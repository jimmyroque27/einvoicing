<?php

namespace App\DataTables;

use App\Models\AlphaTaxCode;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Auth;

class AlphaTaxCodeDataTable extends DataTable
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
            ->editColumn('ewt_rate',function ($query) {
                 
                    return $query->ewt_rate."%";
                
            })
            ->escapeColumns([])
            ->setRowId('id');
    }

 
    /**
     * Get the query source of dataTable.
     */
    public function query(AlphaTaxCode $model): QueryBuilder
     {
        // $model = AlphaTaxCode::select(['*'])
        //     // ->where('tp_id',session('user_tp_id'));
        // return $model;
        
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('atc-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    // ->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle();
                 
    }
    protected function getActionColumn($data): string
    {
        $showUrl="";
        if(Auth::user()->can('atc-show')){
            $showUrl ="<a class='waves-effect btn btn-success' title='show' data-value='$data->id' href='".route('atc.show', $data->id)."'><i class='fas fa-fw fa-eye'></i></a> ";
        }
        $editUrl ="";
        if(Auth::user()->can('atc-edit')){
            $editUrl = "<a class='waves-effect btn btn-primary'  title='edit' data-value='$data->id' href='".route('atc.edit', $data->id)."'><i class='fas fa-fw fa-pen'></i></a>";
        }
        $deleteUrl ="";
        if(Auth::user()->can('atc-delete')){
            $deleteUrl ="<a class='waves-effect btn deepPink-bgcolor delete'  title='delete' data-value='$data->id' href='".route('atc.destroy', $data->id)."'><i class='fas fa-fw fa-trash'></i></a>";
        }
        return $showUrl.$editUrl.$deleteUrl;
                // <button class='waves-effect btn deepPink-bgcolor' title='delete' data-value='$data->id' ><i class='fas fa-fw fa-trash'></i></button>";
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
          
            // Column::make('id'),
             
            Column::make('atc_code')->title("ATC"),
            Column::make('description')->title("Description"),
            Column::make('type')->title("Type"),
            // Column::make('coverage')->title("coverage"),
            Column::make('ewt_rate')->title("EWT Rate %")->className('dt-body-right floatNum'),
            Column::computed('action')
            ->exportable(false)
            ->printable(true)
            ->width(60)
            ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'AlphaTaxCode' . date('YmdHis');
    }
}
