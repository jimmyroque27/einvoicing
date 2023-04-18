<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\User;
// use App\Models\UserTaxPayer;
use App\Models\Item;
use Illuminate\Support\Facades\DB;

use App\DataTables\ItemsDataTable;
use Auth;

class ItemController extends Controller
{    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // function __construct()
    // {
    //      $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
    //      $this->middleware('permission:product-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    // }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ItemsDataTable $dataTable)
    {
        

        return $dataTable->render('products.list');
    }


    public static function getItem()
    {
        
        $item =Item::find(Auth::user()->item_id);
        if(!empty($item)){
            return $item->Regitem_name;
        }
        return;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::whereId($id)->first();

        return view('products.show')->with([
            'item' => $item
        ]);
    }
    /**
     * Display Add Form.
    */    
    public function create()
    {
        return view('products.add');
    }

    /**
     * Save records from Add Form to Item Table.
    */  
    public function store(Request $request)
    {
         
        $request->validate([
            // 'seller_id' => 'required',
            'item_name' => 'required',
            'Description' => 'required',
            'UnitofMeasure' => 'required',
            'UnitSalesPrice' => 'required',
            'VAT_Type' => 'required' ,
            'category_id' => 'required' ,
            'category_name' => 'required' 
        ]);
         
        if (session('user_tp_id') == '0000000000'){
            return back()->with('error', 'No Tax Payer Assigned... Unable to save data...');
        }

        try {
            DB::beginTransaction();
            // Logic For Save User Data

            $create_item = Item::create([
                'user_id' => Auth::user()->id,
                'tp_id' => session('user_tp_id'),
                'category_id' => $request->category_id,
                'category_name' => $request->category_name,
                // UserTP_id
                'item_name' => $request->item_name,
                'Description' => $request->Description,
                'UnitofMeasure' => $request->UnitofMeasure,
                'UnitSalesPrice' => $request->UnitSalesPrice,
                'VAT_Type' => $request->VAT_Type,
                'EWT_Rate' => $request->EWT_Rate,
                'ATC' => $request->atc,
                'ItemCode' => $this->getUniqueCode($request->item_name)
            ]);

            if(!$create_item){
                DB::rollBack();

                return back()->with('error', 'Something went wrong while saving Item data');
            }

            DB::commit();
            return redirect()->route('products.index'  )->with('success', 'Item Stored Successfully.');


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
    public function edit($id)
    {
        $product = Item::find($id);
        

        if(!$product){
            return back()->with('error', 'Product Not Found');
        }

        return view('products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
           
            'item_name' => 'required',
            'Description' => 'required',
            'UnitofMeasure' => 'required',
            'UnitSalesPrice' => 'required',
            'VAT_Type' => 'required' ,
            'category_id' => 'required' ,
            'category_name' => 'required' 
        ]);
     
          
        
        try {
            DB::beginTransaction();
            $update_product = Item::where('id', $id)
                ->update([         
                 
                'category_id' => $request->category_id,
                'category_name' => $request->category_name,
                'item_name' => $request->item_name,
                'Description' => $request->Description,
                'UnitofMeasure' => $request->UnitofMeasure,
                'UnitSalesPrice' => $request->UnitSalesPrice,
                'VAT_Type' => $request->VAT_Type,
                'EWT_Rate' => $request->EWT_Rate,
                'ATC' => $request->ATC,
             ]);

            if(!$update_product){
                DB::rollBack();

                return back()->with('error', 'Something went wrong while update product data');
            }
            
            DB::commit();
            return redirect()->route('products.index')->with('success', 'Product Updated Successfully.');


        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $delete_product = Item::whereId($id)->delete();

            if(!$delete_product){
                DB::rollBack();
                return back()->with('error', 'There is an error while deleting Product information.');
            }

            DB::commit();
            return redirect()->route('products.index')->with('success', 'Product Deleted successfully.');



        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
    public function getUniqueCode($reg_item_name)
    {
        do {
            $code = strtoupper(substr($reg_item_name,0,3)) .date("y") .date("m") . random_int(100000, 999999);
        } while (Item::where("ItemCode", "=", $code)->first());
  
        return $code;
    }
    public function itemslist(Request $request)
    {
        $data = [];
         
        if($request->filled('id')){
            $data = Item::select('*')
                ->where('item_name', 'LIKE', '%'. $request->get('id'). '%')
                // ->orwhere('ItemCode', 'LIKE', '%'. $request->get('id'). '%')
                ->where('tp_id', session('user_tp_id'))
                ->get();
        // }else{
        //     $data = Item::select('*')
        //         ->where('tp_id', session('user_tp_id'))
        //         ->get();
        }
    
        return response()->json($data);
    }
    public function getItemRow($id){
        $tp_id = "xxxxx000000xxxxx000xxx000xxx";
        if(session('user_tp_id')){
            $tp_id = session('user_tp_id');
        }
        // dd($id . " ".$tp_id);
        $item = Item::select("*")
        ->where('ItemCode',$id)
        ->where('tp_id',$tp_id)
        ->get();
        return $item;
    }
}
