<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\DataTables\InvoicesDataTable;
use App\DataTables\InvoiceItemDataTable;
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
                'Currency' => $request->Currency,
                'ForCur' => $request->ForCur,
                'ConvRate' => $request->ConvRate ,
               
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
                'VATableSales'     => str_replace(',', '', $request->VATableSales ), 
                'TotNetSalesAftDisct' => str_replace(',', '', $request->TotNetSalesAftDisct) ,
                'NetAmtPay' => str_replace(',', '', $request->NetAmtPay) ,
                'ConvRate' => str_replace(',', '', $request->ConvRate) ,
                'ForexAmt' => str_replace(',', '', $request->ForexAmt) ,
                
                 
                 
     
                
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
                    'Tax_Withheld' => str_replace(',', '',$item->Tax_Withheld ),           
                ]);
            }

            DB::commit();
            return redirect()->route('invoices.index'  )->with('success', 'Invoice Stored Successfully.');


        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, InvoiceItemDataTable $dataTable)
    {
        $invoice = Invoice::find($id);
        

        if(!$invoice){
            return back()->with('error', 'Invoice Not Found');
        }

        // return view('invoices.edit',compact('invoice'));

        return $dataTable->with(['id'=> $id])->render('invoices.edit',compact('invoice'));
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            
            'buyer_id' => 'required',
            'buyer_name' => 'required',
            'InvoiceDate' => 'required',
            
            
        ]);
        if (session('user_tp_id') == '0000000000'){
            return back()->with('error', 'No Tax Payer Assigned... Unable to save data...');
        }
        try {
            DB::beginTransaction();
            // Logic For Save User Data
            // dd($request->items);
           
            $update_invoice = Invoice::where('id',$id)->where('seller_id',session('user_tp_id'))
                ->update([
                 
                'buyer_id' => $request->buyer_id,
                'RegNm' => $request->buyer_name,
                'InvoiceDate' => $request->InvoiceDate,
                 
                'OrderNumber' => $request->OrderNumber,
                'OrderDate' => $request->OrderDate,
                'Currency' => $request->Currency,
                'ForCur' => $request->ForCur,
                'ConvRate' => $request->ConvRate ,
               
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
                'VATableSales'     => str_replace(',', '', $request->VATableSales ), 
                'TotNetSalesAftDisct' => str_replace(',', '', $request->TotNetSalesAftDisct) ,
                'NetAmtPay' => str_replace(',', '', $request->NetAmtPay) ,
                'ConvRate' => str_replace(',', '', $request->ConvRate) ,
                'ForexAmt' => str_replace(',', '', $request->ForexAmt) ,
                
            ]);


            if(!$update_invoice){
                DB::rollBack();

                return back()->with('error', 'Something went wrong while updating Invoice data');
            }
            
             

            DB::commit();
            return redirect()->route('invoices.index'  )->with('success', 'Invoice Updated Successfully.');


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
    public function store_item(Request $request,$id)
    {
        $request->validate([
            'ItemCode' => 'required',
            'item_name' => 'required',
            'Qty' => 'required',     
        ]);
        if ($request->Qty <= 0){
            return back()->with('error', 'Invalid Item Qty! Unable to save data...');
        }
        if (session('user_tp_id') == '0000000000'){
            return back()->with('error', 'No Tax Payer Assigned... Unable to save data...');
        }
        try {
            DB::beginTransaction();
            $create_invoice_item = InvoiceItem::create([
                'invoice_id'=> $id ,
                'ItemCode' => $request->ItemCode,
                'item_name'  => $request->item_name,
                'Qty' => $request->Qty,
                'UnitofMeasure' => $request->UnitofMeasure,
                'UnitSalesPrice' => str_replace(',', '',$request->UnitSalesPrice),
                'RegDscntAmt' => str_replace(',', '',$request->RegDscntAmt),
                'SpeDscntAmt' => str_replace(',', '',$request->SpeDscntAmt),
                'NetUnitPrice' => str_replace(',', '',$request->NetUnitPrice ),
                'NetAmount' => str_replace(',', '',$request->NetAmount ),
                'VAT_Type' => $request->VAT_Type ,                   
                'ATC' => $request->ATC,
                'EWT_Rate' => $request->EWT_Rate ,     
                'Tax_Withheld' => str_replace(',', '',$request->Tax_Withheld ),           
            ]);


            if(!$create_invoice_item){
                DB::rollBack();

                return back()->with('error', 'Something went wrong while saving Invoice Item data');
            }
             
            DB::commit();
            $this->computeInvoice($id);
            return redirect()->route('invoices.edit',$id)->with('success', 'Invoice Item Added successfully.');


        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
         
    }
    public function update_item($id, $inv_id)
    {

    }
    public function destroy_item($id, $inv_id)
    {
        try {
            DB::beginTransaction();

            $delete_invoice_item = InvoiceItem::whereId($id)->where('invoice_id',$inv_id)->delete();

            if(!$delete_invoice_item){
                DB::rollBack();
                return back()->with('error', 'There is an error while deleting invoice item information.');
            }
            DB::table('invoice_items')->where('invoice_id',$id)->delete();
            DB::commit();
            $this->computeInvoice($inv_id);
            return redirect()->route('invoices.edit', $inv_id)->with('success', 'Invoice Product Deleted successfully.');



        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
    public function computeInvoice($inv_id)
    {
        $invoice= Invoice::select('*')->where('id',$inv_id)
            ->where('seller_id',session('user_tp_id'))->first();
        $result = DB::table('invoice_items')
                ->select(DB::raw('sum(NetAmount) as sum_NetAmount, sum(Tax_Withheld) as sum_Tax_Withheld, invoice_id'))
                ->where('invoice_id',$inv_id)
                ->groupBy('invoice_id')
                ->first();
        $result2 = DB::table('invoice_items')
            ->select(DB::raw('sum(NetAmount) as sum_NetAmount, sum(Tax_Withheld) as sum_Tax_Withheld, invoice_id'))
            ->where('invoice_id',$inv_id)
            ->where('VAT_Type','A1')
            ->groupBy('invoice_id')
            ->first();
        $netitemsales = 0;
        $taxwithheld = 0;
        if ($result){
            $netitemsales =$result->sum_NetAmount;
            $taxwithheld = $result->sum_Tax_Withheld;
        }
        $vatsales = 0;
        if ($result2){
            $vatsales =  $result2->sum_NetAmount;
        }
        $TotalDiscount = $invoice->SpeAmt + $invoice->RegAmt + $invoice->PwdAmt + $invoice->ScAmt;
        $TotNetSalesAftDisct = $netitemsales - $TotalDiscount;
        $TotalTax =   $taxwithheld - $invoice->WithholdBusVAT - $invoice->WithholdBusPT;
        $NetAmtPay = $TotNetSalesAftDisct - $TotalTax + $invoice->OtherNonTaxCharge + $invoice->OtherTaxRev;
        $ForexAmt = $NetAmtPay / $invoice->ConvRate;
        $VATAmt = $vatsales - ($vatsales / 1.12);
        $VATableSales =  ($vatsales / 1.12);
        // dd($TotalDiscount .' - '. $TotNetSalesAftDisct . ' - '.$VATAmt. ' - '.$NetAmtPay. ' - '.$invoice->ConvRate. ' = '.$VATableSales. ' - '.$ForexAmt);
        try {
            DB::beginTransaction();
            $update_invoice = Invoice::where('id',$inv_id)->where('seller_id',session('user_tp_id'))
                ->update([
                    'TotNetItemSales'=> $netitemsales,
                    'WithholdIncome'=> $taxwithheld,
                    'TotNetSalesAftDisct'=> $TotNetSalesAftDisct,
                    'VATAmt' => $VATAmt,
                    'VATableSales' => $VATableSales,
                    'NetAmtPay' => $NetAmtPay,
                    'ForexAmt' => $ForexAmt,
                ]);

            if(!$update_invoice){
                DB::rollBack();   
            }
            DB::commit();

        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
                
    }
}
