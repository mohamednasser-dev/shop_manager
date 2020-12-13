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

    public function index()
    {
        $roles = Role::paginate(10);
        return view('admin.users.roles.index', compact('roles'));
    }
    public function create()
    {
        $permissions = Permission::all();
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
        $arrayData= ['Add New Product', 'Products', 'Categories', 'Subcategory',
             'Sub Subcategory', 'Brand', 'Suppliers', 'Attribute', 'All Orders', 'Pich-up Point Order', 'Customer List', 'Classified Products', 'Classified Packages',
             'All Seller', 'Payouts', 'Payout Requests', 'Sellers Verification Form',
             'In House Product Sale', 'Seller Products Sale', 'Products Stock', 'User Searches',
             'Flash Deals', 'Coupon',
             'Ticket', 'Header', 'Footer',
             'Pages', 'Appearance', 'General settings', 'Features Activation',
             'Languages', 'Pickup Point', 'SMTP Settings',
             'Payment Methods', 'File System Configuration', 'Social media Logins', 'Analytics Tools', 'Facebook Chat', 'Google ReCAPTICHA', 'Shipping Configuration', 'Shipping Countries', 'Shipping Cities', 'All Staffs', 'Staff Permissions'];
  
                for ($i=0; $i < 44 ; $i++) { 
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
        $permissions = Permission::all();
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
