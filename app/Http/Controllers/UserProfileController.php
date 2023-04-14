<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Auth;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::select('id', 'email', 'name', 'status')->paginate(5);

        return view('users.list')->with([
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile.add');
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
            
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'address1' => 'required',
            'address2' => 'required',
            'city' => 'required',
            'province' => 'required',
            'country' => 'required',
            'birthdate' => 'required',
            'contactno' => 'required'
        ]);
        
        try {
            DB::beginTransaction();
            // Logic For Save User Data

            $create_user = UserProfile::create([
                'user_id' => $request->user_id,
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name,
                'last_name' => $request->last_name,
                'address1' => $request->address1,
                'address2' => $request->address2,
                'city' => $request->city,
                'province' => $request->province,
                'country' => $request->country,
                'zipcode' => $request->zipcode,
                'contactno' => $request->contactno,
                'birthdate' => $request->birthdate 
            ]);

            if(!$create_user){
                DB::rollBack();

                return back()->with('error', 'Something went wrong while saving user data');
            }

            DB::commit();
            return redirect()->route('profile.show', $request->user_id  )->with('success', 'User Stored Successfully.');


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
        if(Auth::user()->id != $id)
        {
            return back()->with('error', 'User Profile Not Found');
        }
        // $user_id = Auth::user()->id;
        $profile =  UserProfile::where('user_id','=',$id)->first();
        
         
        if(!$profile){
            return view('profile.add');
            
        }
        
        return view('profile.show')->with([
            'profile' => $profile
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user =  User::whereId($id)->first();

        if(!$user){
            return back()->with('error', 'User Not Found');
        }

        return view('users.edit')->with([
            'user' => $user
        ]);
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
        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);
        
        try {
            DB::beginTransaction();
            // Logic For Save User Data

            $update_user = User::where('id', $id)->update([
                'name' => $request->name,
                'email' => $request->email
            ]);

            if(!$update_user){
                DB::rollBack();

                return back()->with('error', 'Something went wrong while update user data');
            }

            DB::commit();
            return redirect()->route('users.index')->with('success', 'User Updated Successfully.');


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

            $delete_user = User::whereId($id)->delete();

            if(!$delete_user){
                DB::rollBack();
                return back()->with('error', 'There is an error while deleting user.');
            }

            DB::commit();
            return redirect()->route('users.index')->with('success', 'User Deleted successfully.');



        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }


    /**
     * To Update Status of User
     * @param Integer $user_id
     * @param Integer $Status_code
     * @return Success Response.
     */
    public function updateStatus($user_id, $status_code)
    {
        try {
            $update_user = User::whereId($user_id)->update([
                'status' => $status_code
            ]);

            if($update_user){
                return redirect()->route('users.index')->with('success', 'User Status Updated Successfully.');
            }
            
            return redirect()->route('users.index')->with('error', 'Fail to update user status.');

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
