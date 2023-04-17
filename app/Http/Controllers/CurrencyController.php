<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Currency;
use App\DataTables\CurrencyDataTable;

class CurrencyController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:currency-list|currency-create|currency-edit|currency-delete', ['only' => ['index','store']]);
         $this->middleware('permission:currency-create', ['only' => ['create','store']]);
         $this->middleware('permission:currency-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:currency-delete', ['only' => ['destroy']]);
         $this->middleware('permission:currency-show', ['only' => ['show']]);
         $this->middleware('permission:product-create', ['only' => ['currencyList']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CurrencyDataTable $dataTable)
    {
         

        return $dataTable->render('currency.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         
        return view('currency.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'name' => 'required',
            'rate' => 'required',
             
        ]);
        
        try {
            DB::beginTransaction();
            // Logic For Save Currency Data
            
            $create_currency = Currency::create([
                'code' => $request->name,
                'name' => $request->name,
                'rate' => $request->rate,
                'tp_id' => session('user_tp_id'),
                    
            ]);
        
            

            if(!$create_currency ){
                DB::rollBack();

                return back()->with('error', 'Something went wrong while saving currency data');
            }
             
            if((session('user_tp_id') == '0000000000')){
                DB::rollBack();

                return back()->with('error', 'No assigned Tax Payer... Unable to save data...');
            }
           
            
            DB::commit();
            return redirect()->route('currency.index')->with('success', 'Currency Stored Successfully.');


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
        $currency = Currency::find($id);
        

        if(!$currency){
            return back()->with('error', 'Currency Not Found');
        }

        return view('currency.edit',compact('currency'));
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
            'code' => 'required',
            'name' => 'required',
            'rate' => 'required',
        ]);
     
          
        
        try {
            DB::beginTransaction();
            $update_currency = Currency::where('id', $id)
                ->where('tp_id',session('user_tp_id'))->update([         
                'code' => $request->name,
                'name' => $request->name,
                'rate' => $request->rate,
            ]);

            if(!$update_currency){
                DB::rollBack();

                return back()->with('error', 'Something went wrong while update currency data');
            }
            
            DB::commit();
            return redirect()->route('currency.index')->with('success', 'Currency Updated Successfully.');


        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $delete_currency = Currency::whereId($id)
            ->where('tp_id',session('user_tp_id'))->delete();

            if(!$delete_currency){
                DB::rollBack();
                return back()->with('error', 'There is an error while deleting currency.');
            }
            
            DB::commit();
            return redirect()->route('currency.index')->with('success', 'Currency Deleted successfully.');



        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
/**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
       
        $currency =  Currency::whereId($id)
            ->where('tp_id',session('user_tp_id'))->first();
         
        if(!$currency){
            
           return back()->with('error', 'Currency Not Found');
        }
        
        return view('currency.show')->with([
            'currency' => $currency
        ]);
    }
    // Currency List use for Select Picker in add/edit Products (JSON Format)
    public function currencylist(Request $request)
    {
        $data = [];
        //    dd($request->filled('id'));
        if($request->filled('id')){
            $data = Currency::select('*')
                ->where('name', 'LIKE', '%'. $request->get('id'). '%')
                // ->orwhere('ItemCode', 'LIKE', '%'. $request->get('id'). '%')
                ->where('tp_id', session('user_tp_id'))
                ->get();
        }else{
            // $data = Currency::select('*')
            //     // ->where('name', 'LIKE', '%'. $request->get('id'). '%')
            //     // ->orwhere('ItemCode', 'LIKE', '%'. $request->get('id'). '%')
            //     ->where('tp_id', session('user_tp_id'))
            //     ->get();
        }
    
        return response()->json($data);
    }
}

