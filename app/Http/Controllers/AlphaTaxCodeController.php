<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\AlphaTaxCode;
use Auth;
use App\DataTables\AlphaTaxCodeDataTable;

class AlphaTaxCodeController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:atc-list|atc-create|atc-edit|atc-delete', ['only' => ['index','store']]);
         $this->middleware('permission:atc-create', ['only' => ['create','store']]);
         $this->middleware('permission:atc-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:atc-delete', ['only' => ['destroy']]);
         $this->middleware('permission:atc-show', ['only' => ['show']]);
         $this->middleware('permission:product-create', ['only' => ['atcList']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AlphaTaxCodeDataTable $dataTable)
    {
         

        return $dataTable->render('atc.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         
        return view('atc.add');
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
            'atc_code' => 'required',
            'description' => 'required',
            'coverage' => 'required',
            'type' => 'required',
            'ewt_rate' => 'required',
             
        ]);
        
        try {
            DB::beginTransaction();
            // Logic For Save AlphaTaxCode Data
            
            $create_atc = AlphaTaxCode::create([
               
                // 'tp_id' => session('user_tp_id'),
                'atc_code' =>  $request->atc_code,
                'description' =>  $request->description,
                'coverage' =>  $request->coverage,
                'type' =>  $request->type,
                'ewt_rate' =>  $request->ewt_rate,  
            ]);
        
            

            if(!$create_atc ){
                DB::rollBack();

                return back()->with('error', 'Something went wrong while saving atc data');
            }
             
            if((session('user_tp_id') == '0000000000')){
                DB::rollBack();

                return back()->with('error', 'No assigned Tax Payer... Unable to save data...');
            }
           
            
            DB::commit();
            return redirect()->route('atc.index')->with('success', 'ATC Stored Successfully.');


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
        $atc = AlphaTaxCode::find($id);
        

        if(!$atc){
            return back()->with('error', 'ATC Not Found');
        }

        return view('atc.edit',compact('atc'));
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
            'name' => 'required',
        ]);
     
          
        
        try {
            DB::beginTransaction();
            $update_atc = AlphaTaxCode::where('id', $id)->update([         
                'name' => $request->name,
            ]);

            if(!$update_atc){
                DB::rollBack();

                return back()->with('error', 'Something went wrong while update atc data');
            }
            
            DB::commit();
            return redirect()->route('atc.index')->with('success', 'ATC Updated Successfully.');


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

            $delete_atc = AlphaTaxCode::whereId($id)->delete();

            if(!$delete_atc){
                DB::rollBack();
                return back()->with('error', 'There is an error while deleting atc.');
            }
            
            DB::commit();
            return redirect()->route('atc.index')->with('success', 'ATC Deleted successfully.');



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
       
        $atc =  AlphaTaxCode::whereId($id)->first();
         
        if(!$atc){
            
           return back()->with('error', 'ATC Not Found');
        }
        
        return view('atc.show')->with([
            'atc' => $atc
        ]);
    }





    public function atcList(Request $request)
    {
        $data = [];
  
        if($request->filled('id')){
            $data = AlphaTaxCode::select('*')
                        ->where('atc_code', 'LIKE', '%'. $request->get('id'). '%')
                        ->orwhere('description', 'LIKE', '%'. $request->get('id'). '%')
                        ->get();
        }else{
            $data =  AlphaTaxCode::select('*')
                        ->get();
        }
    
        return response()->json($data);
    }
}
