<?php

namespace App\DataTables;

use App\Models\Permission;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Auth;

class PermissionDataTable extends DataTable
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
    public function query(Permission $model): QueryBuilder
     {
        $model = Permission::select('*');
 
        return $model;
        // return $model->newQuery();
     
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('permission-table')
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
        $showUrl="";
        if(Auth::user()->can('permission-show')){
            $showUrl ="<a class='waves-effect btn btn-success' title='show' data-value='$data->id' href='".route('admin.permission.show', $data->id)."'><i class='fas fa-fw fa-eye'></i></a> ";
        }
        $editUrl ="";
        if(Auth::user()->can('permission-edit')){
            $editUrl = "<a class='waves-effect btn btn-primary'  title='edit' data-value='$data->id' href='".route('admin.permission.edit', $data->id)."'><i class='fas fa-fw fa-pen'></i></a>";
        }
        $deleteUrl ="";
        if(Auth::user()->can('permission-delete')){
            $deleteUrl ="<a class='waves-effect btn deepPink-bgcolor delete'  title='delete' data-value='$data->id' href='".route('admin.permission.destroy', $data->id)."'><i class='fas fa-fw fa-trash'></i></a>";
        }
        return $showUrl.$editUrl.$deleteUrl;
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
          
            // Column::make('id'),
             
            Column::make('name')->title("Permission"),
            
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
        return 'Permission' . date('YmdHis');
    }
}
