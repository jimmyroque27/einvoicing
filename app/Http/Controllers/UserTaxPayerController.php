<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserTaxPayer;
use App\Models\User;
use App\Models\TaxPayer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\DataTables\UserTaxPayersDataTable;
use Auth;

class UserTaxPayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserTaxPayersDataTable $dataTable)
    {
        // $users = User::select('id', 'email', 'name', 'status')->paginate(5);

        // return view('users.list')->with([
        //     'users' => $users
        // ]);

        return $dataTable->render('users/taxpayers.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users/taxpayers.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     

    /**
    *New User must have an assigned Tax Payer
    */
    public function assign(Request $request)
    {
        $request->validate([
            'Tin' => 'required',
            'TIN_BranchCode' => 'required',
            'tp_id' => 'required'
        ]);
        
        try {
            DB::beginTransaction();

            $UserTaxPayers = TaxPayer::select("*")
                ->where('Tin',$request->Tin)
                ->where('TIN_BranchCode',$request->TIN_BranchCode)
                ->where('tp_id',$request->tp_id)
                ->find();
            // Logic For Save User Data
            if($UserTaxPayers){
                $create_user_tp = UserTaxPayer::create([
                    'user_id' => Auth::user()->id,
                    'Tin' => $request->Tin,
                    'TIN_BranchCode' => $request->TIN_BranchCode,
                    'tp_id' => $request->tp_id,
                    'status' => 'on',
                ]);

                if(!$create_user_tp){
                    DB::rollBack();

                    return back()->with('error', 'Something went wrong while saving User assigned Tax Payer data');
                }

                DB::commit();
                return redirect()->route('usertaxpayers.index')->with('success', 'User assigned Tax Payer Stored Successfully.');
            }else{
                DB::rollBack();

                    return back()->with('error', 'Tax Payer Not yet registered!!!');

            }


        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
    public function statusOn($id){
        try {
            DB::beginTransaction();
            // Logic For Save User Data
            
            $user_tp_off = UserTaxPayer::where('user_id',Auth::user()->id)->update([
                'status' => 'off', 
            ]);
           
            $user_tp_on = UserTaxPayer::where('user_id',Auth::user()->id)
                ->where('tp_id',$id)
                ->update(['status' => 'on' ]);

            // if(!$user_tp_on){
            //     DB::rollBack();

            //     return back()->with('error', 'Something went wrong while updating Tax Payer Online Status');
            // }
             
            if (($id == session('user_tp_id')) && (session('role_name')=="Admin" || session('role_name')=="admin")){
                $user_tp_on = UserTaxPayer::where('user_id',Auth::user()->id)
                    ->where('tp_id',$id)
                    ->update([
                    'status' => 'off', 
                ]);
            }
            
            DB::commit();

            if (($id != session('user_tp_id')) && (session('role_name')=="Admin" || session('role_name')=="admin")){
                session(['user_tp_id' => $id]);
                $taxpayer = TaxPayer::select("*")
                ->where('tp_id',$id)
                ->first();
                session(['tp_name' => $taxpayer->registered_name]);
                 
            }else{
                $UserTP_online = UserTaxPayer::select("*")
                ->where('user_id',Auth::user()->id)
                ->where('status','on')
                ->first();
    
                session(['user_tp_id' => '0000000000']);
                session(['tp_name' => '']);
                if ($UserTP_online){
                    session(['user_tp_id' => $UserTP_online->tp_id]);
                    $taxpayer = TaxPayer::select("*")
                    ->where('tp_id',$id)
                    ->first();
                    session(['tp_name' => $taxpayer->registered_name]);
                }
            }
            
            return redirect()->route('taxpayers.index')->with('success', 'Tax Payer updating status Successfully.');


        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
 
}
