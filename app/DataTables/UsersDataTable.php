<?php

namespace App\DataTables;

use App\Models\User;
use App\Models\UserTaxPayer;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Auth;

class UsersDataTable extends DataTable
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
            ->editColumn('role',function ($query) {
                $value="";
                if(!empty($query->getRoleNames())){
                    
                    foreach($query->getRoleNames() as $v)
                    {
                        $value =$value.'<label class="badge badge-danger p-1 m-0">'. $v.'</label>';
                    }
                 
                }
                return  $value;
             
                
            })
            ->escapeColumns([])
            ->setRowId('id');
    }

 
    /**
     * Get the query source of dataTable.
     */
    public function query(User $model): QueryBuilder
     {
        if ((session('user_tp_id')=='0000000000') && (session('role_name')=="Admin" || session('role_name')=="admin")) {
            $model = User::select('*');
        }else{
            $model = User::select('users.*')
            ->join('user_tax_payers', 'user_tax_payers.user_id', '=', 'users.id')
            ->where('user_tax_payers.tp_id','=',session('user_tp_id'));
        }
        // $model = User::select('id',  'name','email', 'role' ,'created_at', 'updated_at');
 
        return $model;
        // return $model->newQuery();
     
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('users-table')
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
        if(Auth::user()->can('user-show')){
            $showUrl ="<a class='waves-effect btn btn-success' title='show' data-value='$data->id' href='".route('users.show', $data->id)."'><i class='fas fa-fw fa-eye'></i></a> ";
        }
        $editUrl ="";
        if(Auth::user()->can('user-edit')){
            $editUrl = "<a class='waves-effect btn btn-primary'  title='edit' data-value='$data->id' href='".route('users.edit', $data->id)."'><i class='fas fa-fw fa-pen'></i></a>";
        }
        $deleteUrl ="";
        if(Auth::user()->can('user-delete')){
            $deleteUrl ="<a class='waves-effect btn deepPink-bgcolor delete'  title='delete' data-value='$data->id' href='".route('users.destroy', $data->id)."'><i class='fas fa-fw fa-trash'></i></a>";
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
             
            Column::make('name')->title("User Name"),
            Column::make('email')->title("Email Address"),
            Column::make('role')->title("Role"),
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
        return 'User' . date('YmdHis');
    }
}
