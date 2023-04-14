<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Seller;
use App\Models\TaxPayer;
use App\Models\UserTaxPayer;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Validator;
// use Illuminate\Validation\Rule;
use App\DataTables\TaxPayersDataTable;
use Auth;

class TaxPayerController extends Controller
{    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TaxPayersDataTable $dataTable)
    {
        // return $dataTable->with('id', 2)->render('taxpayers.list');

        return $dataTable->render('taxpayers.list');
    }


    public static function getSeller()
    {
        
        $seller =Seller::find(Auth::user()->seller_id);
        if(!empty($seller)){
            return $seller->registered_name;
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
        $taxpayer = TaxPayer::whereId($id)->first();

        return view('taxpayers.show')->with([
            'taxpayer' => $taxpayer
        ]);
    }
    /**
     * Display Add Form.
    */    
    public function create()
    {
        return view('taxpayers.add');
    }

    /**
     * Save records from Add Form to Seller Table.
    */  
    public function store(Request $request)
    {
         
        if ($request->tp_classification == 1){
            $request->validate([
                'first_name' => 'required',
                'middle_name' => 'required',
                'last_name' => 'required',
                // 'registered_name' => 'required',
                'trade_name' => 'required',
                
                // 'private_or_government'=> 'required',
                'BirthDate'=> 'required',
                'Tin' => 'required|unique:tax_payers,Tin,NULL,id,TIN_BranchCode,'. $request->TIN_BranchCode,
                'TIN_BranchCode' => 'required',
                'cor_issued_date'=> 'required',
                'cor_ocn'=> 'required',
                'SEC_Registration_date'=> 'required',
                'SEC_Registration_No'=> 'required',
                'industry'=> 'required',
                'registered_activities'=> 'required',
                'address_line1'=> 'required',
                'Barangay'=> 'required',
                // 'District'=> 'required',
                'City'=> 'required',
                'Province'=> 'required',
                'ZIPCode'=> 'required',
                'RDO'=> 'required',
                'CalFiscal'=> 'required',
                'FiscalEnd'=> 'required',
                'business_email_address' => 'required|email',
                'contact_number'=> 'required',
                // 'registration_type'=> 'required',
                'vat_registered'=> 'required',
                'PtuNum'=>'required',
           
            
            
            ]);
        }else{
            $request->validate([
                // 'first_name' => 'required',
                // 'middle_name' => 'required',
                // 'last_name' => 'required',
                'registered_name' => 'required',
                'trade_name2' => 'required',
                
                'private_or_government'=> 'required',
                // 'BirthDate'=> 'required',
                'Tin2' => 'required|unique:tax_payers,Tin,NULL,id,TIN_BranchCode,'. $request->TIN_BranchCode2,
    
                'TIN_BranchCode2' => 'required',
                'CorDate2'=> 'required',
                'CorOcn2'=> 'required',
                'SEC_Registration_date2'=> 'required',
                'SEC_Registration_No2'=> 'required',
                'Industry2'=> 'required',
                'RegActivities2'=> 'required',
                'address_line11'=> 'required',
                'Barangay2'=> 'required',
                // 'District2'=> 'required',
                'City2'=> 'required',
                'Province2'=> 'required',
                'ZipCode2'=> 'required',
                'RDO2'=> 'required',
                'CalFiscal2'=> 'required',
                'FiscalEnd2'=> 'required',
                'Email2' => 'required|email',
                'contact_number2'=> 'required',
                // 'registration_type2'=> 'required',
                'VatType2'=> 'required',
                'PtuNum2'=>'required',
       
     
            
            
            ]);
        }
        
        
        try {
            DB::beginTransaction();
          
            
            if ($request->tp_classification == 1){
                
                $create_taxpayer = TaxPayer::create([
                     
                    'tp_classification' => $request->tp_classification,
                    'first_name' => $request->first_name,
                    'middle_name' => $request->middle_name,
                    'last_name' => $request->last_name,
                    'registered_name' => $request->first_name." ".$request->last_name,
                    'trade_name' => $request->trade_name,
                    
                    // 'private_or_government'=> $request->private_or_government,
                    'BirthDate'=> $request->BirthDate,
                    'Tin' => $request->Tin,
        
                    'TIN_BranchCode' => $request->TIN_BranchCode,
                    'cor_issued_date'=>  $request->cor_issued_date,
                    'cor_ocn'=>  $request->cor_ocn,
                    'SEC_Registration_date'=>  $request->SEC_Registration_date,
                    'SEC_Registration_No'=> $request->SEC_Registration_No,
                    'industry'=> $request->industry,
                    'registered_activities'=>  $request->registered_activities,
                    'address_line1'=> $request->address_line1,
                    'address_line2' => $request->address_line2,
                    'Barangay'=> $request->Barangay,
                    'District'=> $request->District,
                    'City'=> $request->City,
                    'Province'=> $request->Province,
                    'ZIPCode'=> $request->ZIPCode,
                    'RDO'=> $request->RDO,
                    'CalFiscal'=> $request->CalFiscal,
                    'FiscalEnd'=> $request->FiscalEnd,
                    'business_email_address' => $request->business_email_address,
                    'contact_number'=> $request->contact_number,
                    'registration_type'=> $request->registration_type,
                    'vat_registered'=> $request->vat_registered,
                    'PtuNum'=>$request->PtuNum,
                    'tp_id' => strtoupper($this->getUniqueCode($request->Tin)),

                ]);
            }else{
                 
                $create_taxpayer = TaxPayer::create([
                    
                     
                    'tp_classification' => $request->tp_classification,
                    'registered_name'=> $request->registered_name,
                    'trade_name' => $request->trade_name2,
                    
                    'private_or_government'=> $request->private_or_government,
                    
                    'Tin' => $request->Tin2,
        
                    'TIN_BranchCode' => $request->TIN_BranchCode2,
                    'cor_issued_date'=>  $request->CorDate2,
                    'cor_ocn'=>  $request->CorOcn2,
                    'SEC_Registration_date'=>  $request->SEC_Registration_date2,
                    'SEC_Registration_No'=> $request->SEC_Registration_No2,
                    'industry'=> $request->Industry2,
                    'registered_activities'=>  $request->RegActivities2,
                    'address_line1'=> $request->address_line11,
                    'address_line2' => $request->address_line22,
                    'Barangay'=> $request->Barangay2,
                    'District'=> $request->District2,
                    'City'=> $request->City2,
                    'Province'=> $request->Province2,
                    'ZIPCode'=> $request->ZipCode2,
                    'RDO'=> $request->RDO2,
                    'CalFiscal'=> $request->CalFiscal2,
                    'FiscalEnd'=> $request->FiscalEnd2,
                    'business_email_address' => $request->Email2,
                    'contact_number'=> $request->contact_number2,
                    'registration_type'=> $request->registration_type2,
                    'vat_registered'=> $request->VatType2,
                    'tp_id' => $this->getUniqueCode($request->Tin2),
                    'PtuNum'=>$request->PtuNum2,


                ]);

            }
            if(!$create_taxpayer){
                DB::rollBack();

                return back()->with('error', 'Something went wrong while saving tax payer data');
            }

            DB::commit();
            if ((session('role_name')!="Admin" && session('role_name')!="admin")){
                $create_user_tp = UserTaxPayer::create([
                    'user_id' => Auth::user()->id,
                    'Tin' => $create_taxpayer->Tin,
                    'TIN_BranchCode' => $create_taxpayer->TIN_BranchCode,
                    'tp_id' => $create_taxpayer->tp_id,
                    'status' => 'off',
                ]);
            }
            return redirect()->route('taxpayers.index'  )->with('success', 'Tax Payer Stored Successfully.');


        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
    public function getUniqueCode($reg_nm)
    {
        do {
            $code = substr($reg_nm,0,3) .date("y") .date("m") . random_int(100000, 999999);
        } while (TaxPayer::where("tp_id", "=", $code)->first());
  
        return $code;
    }
    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $delete_tax_payer = TaxPayer::whereId($id)->delete();

            if(!$delete_tax_payer){
                DB::rollBack();
                return back()->with('error', 'There is an error while deleting tax payer information.');
            }

            DB::commit();
            return redirect()->route('taxpayers.index')->with('success', 'Tax Payer Deleted successfully.');



        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

}
