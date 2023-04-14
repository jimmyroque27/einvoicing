<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Seller;
use App\Models\TaxPayer;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Validator;
// use Illuminate\Validation\Rule;
use App\DataTables\ContactsDataTable;
use Auth;

class ContactController extends Controller
{    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ContactsDataTable $dataTable)
    {
        // return $dataTable->with('id', 2)->render('contacts.list');

        return $dataTable->render('contacts.list');
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
        $contact = Contact::whereId($id)->first();

        return view('contacts.show')->with([
            'contact' => $contact
        ]);
    }
    /**
     * Display Add Form.
    */    
    public function create()
    {
        return view('contacts.add');
    }

    /**
     * Save records from Add Form to Seller Table.
    */  
    public function store(Request $request)
    {
        $request->validate([
            'registered_name' => 'required',
            'trade_name' => 'required',
            'private_or_government'=> 'required',
            // 'Tin' => 'required|unique:contacts,Tin,NULL,id,TIN_BranchCode,'. $request->TIN_BranchCode,
            // 'TIN_BranchCode' => 'required',
            'address_line1'=> 'required',
            'Barangay'=> 'required',
            // 'District'=> 'required',
            'City'=> 'required',
            'Province'=> 'required',
            'ZipCode'=> 'required',
            'business_email_address' => 'required|email',
            'contact_number'=> 'required',
        ]);  
        if (session('user_tp_id') == '0000000000'){
            return back()->with('error', 'No Tax Payer Assigned... Unable to save data...');
        }
        try {
            DB::beginTransaction();
            $create_contact = Contact::create([
                'registered_name' => $request->registered_name,
                'trade_name' => $request->trade_name,
                'tp_id' => session('user_tp_id'),
                'private_or_government'=> $request->private_or_government,
                'Tin' => $request->Tin,
                'TIN_BranchCode' => $request->TIN_BranchCode,
                'address_line1'=> $request->address_line1,
                'address_line2' => $request->address_line2,
                'Barangay'=> $request->Barangay,
                'District'=> $request->District,
                'City'=> $request->City,
                'Province'=> $request->Province,
                'ZipCode'=> $request->ZipCode,
                'user_id'=> Auth::user()->id,
                'company_id'=> strtoupper($this->getUniqueCode($request->registered_name)),
            ]);
            if(!$create_contact){
                DB::rollBack();
                return back()->with('error', 'Something went wrong while saving Contact data');
            }
            DB::commit();
            return redirect()->route('contacts.index'  )->with('success', 'Contact Stored Successfully.');

        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
    public function getUniqueCode($reg_nm)
    {
        do {
            $code = substr($reg_nm,0,3) .date("y") .date("m") . random_int(100000, 999999);
        } while (Seller::where("seller_cd", "=", $code)->first());
  
        return $code;
    }
    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $delete_contact = Contact::whereId($id)->delete();

            if(!$delete_contact){
                DB::rollBack();
                return back()->with('error', 'There is an error while deleting Contact information.');
            }

            DB::commit();
            return redirect()->route('contacts.index')->with('success', 'Contact Deleted successfully.');



        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
    public function getTaxPayer($Tin,$TIN_BranchCode){
        $TaxPayer = TaxPayer::select("*")
        ->where('Tin',$Tin)
        ->where('TIN_BranchCode', $TIN_BranchCode)
        // ->where('tp_id',$request->tp_id)
        ->get();
        return $TaxPayer;
    }
    public function getBuyer($id){
        $tp_id = "xxxxx000000xxxxx000xxx000xxx";
        if(Auth::user()->user_TP !=null){
            $tp_id = session('user_tp_id');
        }
        $Contact = Contact::select("*")
        ->where('company_id',$id)
        ->where('tp_id',$tp_id)
        ->get();
        return $Contact;
    }
    public function buyersList(Request $request)
    {
        $data = [];
  
        if($request->filled('id')){
            $data = Contact::select('*')
                        ->where('registered_name', 'LIKE', '%'. $request->get('id'). '%')
                        ->where('tp_id','=', session('user_tp_id'))
                        ->get();
        }else{
            $data = Contact::select('*')
                        ->where('tp_id', session('user_tp_id'))
                        ->get();
        }
    
        return response()->json($data);
    }
}
