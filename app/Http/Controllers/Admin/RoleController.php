<?php
namespace App\Http\Controllers\Admin;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\RoleHasPermission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\DataTables\RoleDataTable;
use App\DataTables\RolePermissionDataTable;

class RoleController extends Controller
{   
    // function __construct()
    // {
    //      $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
    //      $this->middleware('permission:role-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    //      $this->middleware('permission:role-show', ['only' => ['show']]);
    // }
    
    
    public function index(RoleDataTable $dataTable)
    {
        return $dataTable->render('admin.role.list');
    }
    
    public function create()
    {
        $permissions = Permission::all();
        return view('admin.role.add',compact('permissions'));
    }
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $this->validate($request, [
                'name' => 'required|unique:roles,name',
                'permission' => 'required',
            ]);
            

            $role = Role::create(['name' => $request->input('name')]);
            $role->syncPermissions($request->input('permission'));
           

            if(!$role){
                DB::rollBack();
                return back()->with('error', 'There is an error while storing Role information.');
            }

            DB::commit();
            
            return redirect()->route('admin.role.index')
                            ->with('success','Role created successfully.');



        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
    public function edit($id)
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
    
        
    
        
        if(!$role){
            return back()->with('error', 'Role Not Found');
        }

        // return view('admin.role.edit')->with([
        //     'role' => $role
        // ]);
        return view('admin.role.edit',compact('role','permission','rolePermissions'));
   
        
    }
    public function update($id, Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);
    
    
        
        try {
            DB::beginTransaction();
            // Logic For Save Role Data
 
            $role = Role::find($id);
            $role->name = $request->input('name');
            $role->save();
        
            $role->syncPermissions($request->input('permission'));

            if(!$role){
                DB::rollBack();

                return back()->with('error', 'Something went wrong while update role data');
            }

            DB::commit();
            return redirect()->route('admin.role.index')->with('success', 'Role Updated Successfully.');


        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

    }
    public function destroy($id)
    {
        
        try {
            DB::beginTransaction();

            $delete_contact = Role::whereId($id)->delete();

            if(!$delete_contact){
                DB::rollBack();
                return back()->with('error', 'There is an error while deleting Role information.');
            }

            DB::commit();
            return redirect()->route('admin.role.index')->with('success', 'Role Deleted successfully.');



        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
    public function show( $id )
    {

        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();
    
        return view('admin.role.show',compact('role','rolePermissions'));
         
    }

}