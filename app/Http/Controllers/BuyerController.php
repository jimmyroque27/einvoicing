<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Buyer;
use Illuminate\Support\Facades\DB;
use App\DataTables\BuyersDataTable;
use Auth;

class BuyerController extends Controller
{    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BuyersDataTable $dataTable)
    {
        

        return $dataTable->render('buyers.list');
    }


    public static function getBuyer($id)
    {
        $buyer =Buyer::find($id);
        if(!empty($buyer)){
            return $buyer->RegNm;
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
        $buyer = Buyer::whereId($id)->first();

        return view('buyers.show')->with([
            'buyer' => $buyer
        ]);
    }
    /**
     * Display Add Form.
    */    
    public function create()
    {
        return view('buyers.add');
    }

    /**
     * Save records from Add Form to Buyer Table.
    */  
    public function store(Request $request)
    {
        $request->validate([
            'seller_id' => 'required',
            'Tin' => 'required',
            'BranchCd' => 'required',
            'RegNm' => 'required',
            'BusinessNm' => 'required',
            'Email' => 'required|email',
            'RegAddr' => 'required' 
        ]);
        
        try {
            DB::beginTransaction();
            // Logic For Save User Data

            $create_buyer = Buyer::create([
                'seller_id' => Auth::user()->seller_id,
                'buyer_cd' => strtoupper($this->getUniqueCode($request->RegNm)),
                'Tin' => $request->Tin,
                'BranchCd' => $request->BranchCd,
                'Type' => $request->Type,
                'RegNm' => $request->RegNm,
                'BusinessNm' => $request->BusinessNm,
                'Email' => $request->Email,
                'RegAddr' => $request->RegAddr 
            ]);

            if(!$create_buyer){
                DB::rollBack();

                return back()->with('error', 'Something went wrong while saving buyer data');
            }

            DB::commit();
            return redirect()->route('buyers.index'  )->with('success', 'Buyer Stored Successfully.');


        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
    public function getUniqueCode($reg_nm)
    {
        do {
            $code = substr($reg_nm,0,2).date("y").date("m") . random_int(100000, 999999);
        } while (Buyer::where("buyer_cd", "=", $code)->first());
  
        return $code;
    }
    public function buyerslist(Request $request)
    {
        $data = [];
  
        if($request->filled('q')){
            $data = Buyer::select("RegNm", "id")
                        ->where('RegNm', 'LIKE', '%'. $request->get('q'). '%')
                        ->where('seller_id','=', Auth::user()->seller_id)
                        ->get();
        }else{
            $data = Buyer::select("RegNm", "id")
                        ->where('seller_id', Auth::user()->seller_id)
                        ->get();
        }
    
        return response()->json($data);
    }
}
