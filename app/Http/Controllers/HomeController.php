<?php

namespace App\Http\Controllers;
use App\Models\UserTaxPayer;
use App\Models\TaxPayer;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $UserTaxPayers = UserTaxPayer::select("*")->where('user_id',Auth::user()->id)->get();
        $UserTP_online = UserTaxPayer::select("*")
            ->where('user_id',Auth::user()->id)
            ->where('status','on')
            ->first();
        session(['user_tp_id' => '0000000000']);
        session(['tp_name' => '']);
        if ($UserTP_online){
            session(['user_tp_id' => $UserTP_online->tp_id]);
            
            $taxpayer = TaxPayer::select("*")
            ->where('tp_id',$UserTP_online->tp_id)
            ->first();
            if ($taxpayer){
                session(['tp_name' => $taxpayer->registered_name]);
            }
            
        }
        foreach(Auth::user()->getRoleNames() as $v)
        {
            session(['role_name' => $v]);
        }

        return view('home')->with(['UserTaxPayers'=>$UserTaxPayers->count()]);
    }
}
