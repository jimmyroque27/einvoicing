<?php

namespace App\DataTables;

use App\Models\TaxPayer;
use App\Models\UserTaxPayer;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Support\Facades\DB;
use Auth;

class UserTaxPayersDataTable extends DataTable
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
    public function query(UserTaxPayer $model): QueryBuilder
     {
        
        // $model = DB::table('user_tax_payers')
        //     ->join('tax_payers', 'user_tax_payers.tax_payer_id', '=', 'tax_payers.id')
        //     ->select('user_tax_payers.*', 'tax_payers.Tin','tax_payers.BranchCd','tax_payers.RegNm', 
        //         'tax_payers.Email', 'tax_payers.ContactNo', 
        //         'tax_payers.City','tax_payers.Province','tax_payers.TaxType')
        //     ->where('users_tax_payers.user_id','=',Auth:user()->id)
        //     ->get();
 
        // $model = DB::select('*')
        //     ->get();

        
        $model =UserTaxPayer::select('user_tax_payers.user_id','tax_payers.*')
            ->join('tax_payers', 'user_tax_payers.tp_id', '=', 'tax_payers.tp_id')
            ->where('user_tax_payers.user_id','=',Auth::user()->id);

            // $articles =DB::table('user_tax_payers')
            //     ->join('tax_payers', 'user_tax_payers.tax_payer_id', '=', 'tax_payers.id')
            //     ->join('user', 'user_tax_payers.user_id', '=', 'user.id')
            //     ->select('user_tax_payers.*','user_tax_payers.tax_payer_id'.
            //         'users.name', 'tax_payers.Tin','tax_payers.BranchCd','tax_payers.RegNm', 
            //         'tax_payers.Email', 'tax_payers.ContactNo', 
            //         'tax_payers.City','tax_payers.Province','tax_payers.TaxType')
            //     ->get();
            // $model = UserTaxPayer::select('*',
            // \DB::raw('(CASE WHEN tax_payers.TaxType = 2 THEN "Corp" 
            //     ELSE "Ind" 
            //     END) as TaxType'));
        return $model;
        // return $model->newQuery();
     
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('user-taxpayers-table')
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
        return $showUrl.$editUrl.$deleteUrl;
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
          
            // Column::make('id'),
            // Column::make('TaxType')->title("Tax Type"),
            Column::make('tp_id')->title("TP ID"),
            // Column::make('tp_classification')->title("Tax Type"),
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
            ->width(60)
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
