<?php
namespace App\Http\Controllers\Admin;


use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\RoleHasPermission;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\DataTables\PermissionDataTable;

class PermissionController extends Controller
{   

    // public function index()
    // {
    //     $permissions = Permission::latest()->paginate(5);
    //     return view('admin.permission.list',compact('permissions'))
    //         ->with('i', (request()->input('page', 1) - 1) * 5);
    // }

    public function index(PermissionDataTable $dataTable)
    {
        return $dataTable->render('admin.permission.list');
    }
    public function destroy($id)
    {
        
        try {
            DB::beginTransaction();

            $delete_contact = Permission::whereId($id)->delete();

            if(!$delete_contact){
                DB::rollBack();
                return back()->with('error', 'There is an error while deleting Permission information.');
            }

            DB::commit();
            return redirect()->route('admin.permission.index')->with('success', 'Permission Deleted successfully.');



        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
    public function create()
    {
        return view('admin.permission.add');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:'.config('permission.table_names.permissions', 'permissions').',name',
        ]);
        Permission::create($request->all());
        return redirect()->route('admin.permission.index')
                        ->with('message','Permission created successfully.');
    }
    public function edit($id)
    {
        $permission =  Permission::whereId($id)->first();

        if(!$permission){
            return back()->with('error', 'Permission Not Found');
        }

        return view('admin.permission.edit')->with([
            'permission' => $permission
        ]);
        
    }
    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
            
        ]);
        
        try {
            DB::beginTransaction();
            // Logic For Save User Data

            $update_permission = Permission::where('id', $id)->update([
                'name' => $request->name,
                 
            ]);

            if(!$update_permission){
                DB::rollBack();

                return back()->with('error', 'Something went wrong while update permission data');
            }

            DB::commit();
            return redirect()->route('admin.permission.index')->with('success', 'Permission Updated Successfully.');


        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

    }

    public function show(Permission $permission)
    {
        return view('admin.permission.show',compact('permission'));
    }
}