<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Database\QueryException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class usersController extends Controller{
    public $objectName;
    public $folderView;

    public function __construct(User $model){
        $this->middleware('auth');
        $this->objectName = $model;
        $this->folderView = 'admin.users.';
    }

    public function index(){
        $users = $this->objectName::where('type','user')->orderBy('name','desc')->paginate(10);
        return view($this->folderView.'users',compact('users'));
    }

    public function create(){
        return view($this->folderView.'create_user');
    }

    public function store(Request $request){
        $data = $this->validate(\request(),
        [
            'name' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6', 
        ]);
        if($request['password'] != null  && $request['password_confirmation'] != null ){
            $data['password'] = bcrypt(request('password'));
            $user = User::create($data);
            $user->save();
            session()->flash('success', trans('admin.addedsuccess'));
            return redirect(url('users/create'));
        }
    }

    public function destroy($id){
        $user = $this->objectName::where('id', $id)->first();
        $user->delete();
        session()->flash('success',trans('admin.deleteSuccess'));
        return back();
    }
}
