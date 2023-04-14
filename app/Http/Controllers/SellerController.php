<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Seller;
use Illuminate\Support\Facades\DB;
use App\DataTables\SellersDataTable;
use Auth;

class SellerController extends Controller
{    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SellersDataTable $dataTable)
    {
        

        return $dataTable->render('sellers.list');
    }


    public static function getSeller()
    {
        
        $seller =Seller::find(Auth::user()->seller_id);
        if(!empty($seller)){
            return $seller->RegNm;
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
        $seller = Seller::whereId($id)->first();

        return view('sellers.show')->with([
            'seller' => $seller
        ]);
    }
    /**
     * Display Add Form.
    */    
    public function create()
    {
        return view('sellers.add');
    }

    /**
     * Save records from Add Form to Seller Table.
    */  
    public function store(Request $request)
    {
        $request->validate([
            
            'Tin' => 'required',
            'BranchCd' => 'required',
            'Type' => 'required',
            'RegNm' => 'required',
            'BusinessNm' => 'required',
            'Email' => 'required|email',
            'RegAddr' => 'required' 
        ]);
        
        try {
            DB::beginTransaction();
            // Logic For Save User Data

            $create_seller = Seller::create([
                 
                'Tin' => $request->Tin,
                'BranchCd' => $request->BranchCd,
                'Type' => $request->Type,
                'RegNm' => $request->RegNm,
                'BusinessNm' => $request->BusinessNm,
                'Email' => $request->Email,
                'RegAddr' => $request->RegAddr ,
                'seller_cd' => strtoupper($this->getUniqueCode($request->RegNm))
            ]);

            if(!$create_seller){
                DB::rollBack();

                return back()->with('error', 'Something went wrong while saving seller data');
            }

            DB::commit();
            return redirect()->route('sellers.index'  )->with('success', 'Seller Stored Successfully.');


        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
    public function getUniqueCode($reg_nm)
    {
        do {
            $code = substr($reg_nm,0,2) .date("y") .date("m") . random_int(100000, 999999);
        } while (Seller::where("seller_cd", "=", $code)->first());
  
        return $code;
    }
}
