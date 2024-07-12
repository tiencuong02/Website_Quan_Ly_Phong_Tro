<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct(Request $request) {
        parent::__construct();
        $this->middleware(function ($request, $next) {
            $this->tableName = 'admin_users';
            $this->listdataTitle = 'Quản lý thành viên';
            $this->roles = config('app.role');
            \View::share('tableName', $this->tableName);
            \View::share('listdataTitle', $this->listdataTitle);
            \View::share('title', $this->listdataTitle);
            \View::share('roles', $this->roles);
            if($this->checkRole([1])) {
                return $next($request);
            }
            return redirect()->back()->withErrors('Bạn không có quyền');
        });
    }
    public function index() {
        $users = User::paginate(10);
        // ['users' => $users]
        return view('admin.admin_users.index', compact('users'));
    }
    /**
     * 
     */
    public function create() {
        return view('admin.admin_users.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            're-password' => 'required|same:password',
        ],
        [
            'name.required' => 'Tên là bắt buộc',
            'username.required' => 'Tên đăng nhập là bắt buộc',
            'email.required' => 'Email là bắt buộc',
            'password.required' => 'Password là bắt buộc',
            'email.unique' => 'Email đã tồn tại',
            're-password.required' => 'Bạn chưa nhập lại mật khẩu',
            're-password.same' => 'Mật khẩu nhập lại chưa khớp',
        ]);
        extract($request->all(), EXTR_OVERWRITE);
        $dataInsert = [
            'name' => $name,
            'username' => $username,
            'email' => $email,
            'phone' => $phone,
            'password' => bcrypt($password),
            'role' => $role,
        ];
        $id = User::insertGetId($dataInsert);
        return redirect(route($this->tableName.'.index', $id))->with([
            'type' => 'success',
            'message' => 'Thêm mới thành công'
        ]);
    }
    public function edit($id) 
    {
        $dataEdit = User::find($id);
        return view('admin.admin_users.edit')->with('GetId',$dataEdit);
    }

    public function update(Request $request, $id)
    {
        $dataUpdate = User::find($id);
        $dataUpdate->name= $request->name;
        $dataUpdate->username= $request->username;
        $dataUpdate->phone = $request->phone;
        $dataUpdate->email = $request->email;
        $dataUpdate->role = $request->role;
        $dataUpdate->save();
        return redirect(route($this->tableName.'.index', $id))->with([
            'type' => 'success',
            'message' => 'Sửa thành công'
        ]);
    }
    public function reset($id) 
    {
        $data = User::find($id);
        return view('admin.admin_users.reset')->with('GetId',$data);
    }

    public function updatepass(Request $request, $id)
    {
        $request->validate([
            'password' => 'required',
            're-password' => 'required|same:password',
        ],
        [
            'password.required' => 'Password là bắt buộc',
            're-password.required' => 'Bạn chưa nhập lại mật khẩu',
            're-password.same' => 'Mật khẩu nhập lại chưa khớp',
        ]);
        extract($request->all(), EXTR_OVERWRITE);
        $dataUpdate = User::find($id);
        $dataUpdate->password = bcrypt($request->password);
        $dataUpdate->save();
        return redirect(route($this->tableName.'.index', $id))->with([
            'type' => 'success',
            'message' => 'Sửa thành công'
        ]);
    }
    public function destroy($id)
    {
        $dateDestroy = User::find($id);
        $dateDestroy->delete();
        return redirect(route($this->tableName.'.index'))->with([
            'type' => 'success',
            'message' => 'Xóa thành công'
        ]);
    }
}
