<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\DataTables\InvoicesDataTable;
use Auth;
use App\Models\User;
use App\Models\Invoice;
use App\Models\InvoiceItem;
class InvoiceController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(InvoicesDataTable $dataTable)
    {
        

        return $dataTable->render('invoices.list');
    }

 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $invoice = Invoice::whereId($id)->first();

        return view('invoices.show')->with([
            'invoice' => $invoice
        ]);
    }
    /**
     * Display Add Form.
    */    
    public function create()
    {
        return view('invoices.add');
    }

    /**
     * Save records from Add Form to Invoice Table.
    */  
    public function store(Request $request)
    {
        $request->validate([
            
            'buyer_id' => 'required',
            'buyer_name' => 'required',
            'InvoiceDate' => 'required',
            'items' => 'required',
            // 'RegNm' => 'required',
            // 'BusinessNm' => 'required',
            // 'Email' => 'required|email',
            // 'RegAddr' => 'required' 
        ]);
        if (session('user_tp_id') == '0000000000'){
            return back()->with('error', 'No Tax Payer Assigned... Unable to save data...');
        }
        try {
            DB::beginTransaction();
            // Logic For Save User Data
            // dd($request->items);
           
            $create_invoice = Invoice::create([
                'seller_id' => session('user_tp_id'),
                'buyer_id' => $request->buyer_id,
                'RegNm' => $request->buyer_name,
                'InvoiceDate' => $request->InvoiceDate,
                'InvoiceNumber' => strtoupper($this->getUniqueCode($request->Type)),
                'OrderNumber' => $request->OrderNumber,
                'OrderDate' => $request->OrderDate,
                // 'Currency' => $request->currency_id,
                // 'ForCur' => $request->ForCur,
                // 'ConvRate' => $request->currency_rate ,
                // 'ForexAmt' => $request->ForexAmt ,
                'TotNetItemSales' => str_replace(',', '', $request->TotNetItemSales) ,
                'ScAmt' => str_replace(',', '', $request->ScAmt),
                'PwdAmt' => str_replace(',', '', $request->PwdAmt) ,
                'RegAmt' => str_replace(',', '', $request->RegAmt ),
                'SpeAmt' => str_replace(',', '', $request->SpeAmt ),
                'Rmk2' =>  $request->Rmk2 ,
                'VATAmt' => str_replace(',', '', $request->VATAmt) ,
                'WithholdIncome' => str_replace(',', '', $request->WithholdIncome) ,
                'WithholdBusVAT' => str_replace(',', '', $request->WithholdBusVAT) ,
                'WithholdBusPT' => str_replace(',', '', $request->WithholdBusPT) ,
                'OtherTaxRev' => str_replace(',', '', $request->OtherTaxRev) ,
                'OtherNonTaxCharge' => str_replace(',', '', $request->OtherNonTaxCharge) ,
                'NetAmtPay' => str_replace(',', '', $request->NetAmtPay) ,
                 
                 
     
                
            ]);


            if(!$create_invoice){
                DB::rollBack();

                return back()->with('error', 'Something went wrong while saving Invoice data');
            }
            
            $items = json_decode($request->items);
            // dd($items);
            foreach ($items as $item) {
                //  dd($item->Tax_Withheld);

                 $create_invoice_item = InvoiceItem::create([
                    'invoice_id'=> $create_invoice->id ,
                    'ItemCode' => $item->ItemCode,
                    'item_name'  => $item->description,
                    'Qty' => $item->Qty,
                    'UnitofMeasure' => $item->UnitofMeasure,
                    'UnitSalesPrice' => str_replace(',', '',$item->UnitSalesPrice),
                    'RegDscntAmt' => str_replace(',', '',$item->RegDscntAmt),
                    'SpeDscntAmt' => str_replace(',', '',$item->SpeDscntAmt),
                    'NetUnitPrice' => str_replace(',', '',$item->NetUnitPrice ),
                    'NetAmount' => str_replace(',', '',$item->NetAmount ),
                    'VAT_Type' => $item->VAT_Type ,      
                    'ATC' => $item->ATC,
                    'EWT_Rate' => $item->EWT_Rate ,     
                    'Tax_Withheld' => $item->Tax_Withheld ,           
                ]);
            }

            DB::commit();
            return redirect()->route('invoices.index'  )->with('success', 'Invoice Stored Successfully.');


        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
    public function getUniqueCode($reg_nm)
    {
        do {
            // $code = substr($reg_nm,0,2) .date("y") .date("m") . random_int(100000, 999999);
            $lastInvoice = Invoice::where("seller_id", session('user_tp_id'))
                ->orderBy('InvoiceNumber','desc')
                ->first();
            // $lastInvoice = DB::select( DB::raw("SELECT * FROM invoices WHERE substring(InvoiceNumber,0,2)= '".date("y")."' seller_id = '" .session('user_tp_id') ."' order bu InvoiceNumber desc") )->first();
            $InvoiceNumber =1;
            if ($lastInvoice){
                $InvoiceNumber += intval(substr($lastInvoice->InvoiceNumber,4,12)) ;
            } 
            $code =  date("y") .date("m") . str_pad($InvoiceNumber, 8, '0', STR_PAD_LEFT);
            // $code =  date("y") .date("m") . random_int(100000, 999999);
        } while (Invoice::where("InvoiceNumber", "=", $code)
            ->where("seller_id", "=", session('user_tp_id'))
            ->first());
  
        return $code;
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $delete_invoice = Invoice::whereId($id)->delete();

            if(!$delete_invoice){
                DB::rollBack();
                return back()->with('error', 'There is an error while deleting invoice information.');
            }
            DB::table('invoice_items')->where('invoice_id',$id)->delete();
            DB::commit();
            return redirect()->route('invoices.index')->with('success', 'Invoice Deleted successfully.');



        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
}
