<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserTaxPayer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\DataTables\UsersDataTable;
use App\DataTables\UserTaxPayersDataTable;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('users.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
         
        return view('users.add',compact('roles'));
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
            'last_name' => 'required',
            // 'name' => 'required',
            'email' => 'required|email',
            'roles' => 'required',
            'password' => ['required', 'string', 'confirmed', Password::min(8)
            ->mixedCase()
            ->letters()
            ->numbers()
            ->symbols()
            ->uncompromised()],
        ]);
        
        try {
            DB::beginTransaction();
            // Logic For Save User Data

            $create_user = User::create([
                'last_name' => $request->last_name,
                'first_name' => $request->first_name,
                'name' => $request->first_name." ". $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            if(!$create_user){
                DB::rollBack();

                return back()->with('error', 'Something went wrong while saving user data');
            }
            // dd($request->roles);
            $create_user->assignRole($request->roles);
            $create_userTP = UserTaxPayer::create([
                'tp_id' => session('user_tp_id'),
                'user_id' => $create_user->id,
                'status' => 'on',
            ]);
            DB::commit();
            return redirect()->route('users.index')->with('success', 'User Stored Successfully.');


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
    public function show($id, UserTaxPayersDataTable $dataTable)
    {
        //
        $user =  User::whereId($id)->first();
         
        if(!$user){
            
           return back()->with('error', 'User Not Found');
        }
        
        return $dataTable->with(['id'=> $id])->render('users.show',compact('user'));

        // return view('users.show')->with([
        //     'user' => $user
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
     

        if(!$user){
            return back()->with('error', 'User Not Found');
        }

        return view('users.edit',compact('user','roles','userRole'));
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
            // 'name' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'roles' => 'required',
        ]);
     
          
        
        try {
            DB::beginTransaction();
            // Logic For Save User Data
            $user = User::find($id);
            $update_user = User::where('id', $id)->update([
                'last_name' => $request->last_name,
                'first_name' => $request->first_name,
                'name' => $request->first_name." ". $request->last_name,
                'email' => $request->email
            ]);

            if(!$update_user){
                DB::rollBack();

                return back()->with('error', 'Something went wrong while update user data');
            }
            DB::table('model_has_roles')->where('model_id',$id)->delete();
            // dd($request->input('roles'));
            $user->assignRole($request->roles);

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
            DB::table('model_has_roles')->where('model_id',$id)->delete();
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
