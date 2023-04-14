<?php

namespace App\DataTables;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\RoleHasPermission;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;

class RolePermissionDataTable extends DataTable
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
    public function query($id, Role $model): QueryBuilder
     {
        // $model = Role::select('*');

        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();
 
        return $model;
        // return $model->newQuery();
     
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('role-table')
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
        // $showUrl = route('', $data->id);
        // $editUrl = route('', $data->id);
        // $deleteUrl = route('', $data->id);
        $showUrl = route('admin.role.show', $data->id);
        $editUrl = route('admin.role.edit', $data->id);
        $deleteUrl = route('admin.role.destroy', $data->id);
        return "<a class='waves-effect btn btn-success' title='show' data-value='$data->id' href='$showUrl'><i class='fas fa-fw fa-eye'></i></a> 
                <a class='waves-effect btn btn-primary'  title='edit' data-value='$data->id' href='$editUrl'><i class='fas fa-fw fa-pen'></i></a>
                <a class='waves-effect btn deepPink-bgcolor delete'  title='delete' data-value='$data->id' href='$deleteUrl'><i class='fas fa-fw fa-trash'></i></a>";
                // <button class='waves-effect btn deepPink-bgcolor' title='delete' data-value='$data->id' ><i class='fas fa-fw fa-trash'></i></button>";
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
          
            // Column::make('id'),
             
            Column::make('name')->title("Role"),
            
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
        return 'Role' . date('YmdHis');
    }
}
