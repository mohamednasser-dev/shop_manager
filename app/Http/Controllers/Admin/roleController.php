<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\RoleTranslation;
use Auth;

class RoleController extends Controller
{ 
    public function __construct()
    {
        $this->middleware(['permission:permissions']);
    }

    public function index()
    {
        $roles = Role::paginate(10);
        return view('admin.users.roles.index', compact('roles'));
    }
    public function create()
    {
        $permissions = Permission::where('visable','1')->get();
        return view('admin.users.roles.create',compact('permissions'));
    }
    public function store(Request $request)
    {
        $role = Role::create(['name' => $request->name]);
        $role->syncPermissions($request->permissions);
        session()->flash('success', trans('admin.addedsuccess'));
        return redirect()->route('roles.index');
    }
    public function store_permission(Request $request)
    {
        $arrayData= ['buy part', 'buy gomla', 'buy back', 'categories',
             'products', 'bases', 'add base bill', 'customers', 'suppliers', 'employees', 'add new employee', 'permissions', 'Account statement','bills', 'income', 'outgoings', 'Lock a fiscal year'];
        for ($i=0; $i < 17 ; $i++) { 
            # code...
            if($i == 44){
                return 0;
            }
            $permission = Permission::create(['name' => $arrayData[$i]]);
        }
    }
    public function show($id)
    {
        //
    }
    public function edit(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::where('visable','1')->get();
        $r_permissions[] = null ;
        $role_permissions = DB::table('role_has_permissions')
                        ->where('role_id', $id)
                        ->get();
        foreach ($role_permissions as $key => $permission) {
            $r_permissions[] = $permission->permission_id;
        }         
        return view('admin.users.roles.edit', compact('role','permissions','r_permissions'));
    }
    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $role->name = $request->name;
        $role->save();
        if($request->has('permissions')){

            DB::delete("delete from role_has_permissions where role_id = ?", array($id));
            $role->syncPermissions($request->permissions);
            session()->flash('success', trans('admin.updatSuccess'));
            return redirect()->route('roles.index');
        }
        session()->flash('danger', trans('admin.error'));
        return back();
    }
    public function destroy($id)
    {
        Role::destroy($id);
        session()->flash('success', trans('admin.deleteSuccess'));
        return redirect()->route('roles.index');
    }
}
