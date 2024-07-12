<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct(Request $request) {
        parent::__construct();
        $this->middleware(function ($request, $next) {
            $this->tableName = 'profile';
            $this->listdataTitle = 'Danh sách sản phẩm';
            \View::share('tableName', $this->tableName);
            \View::share('listdataTitle', $this->listdataTitle);
            \View::share('title', $this->listdataTitle);
            if($this->checkRole([2,3])) {
                return $next($request);
            }
            return redirect()->back()->withErrors('Bạn không có quyền');
        });
    }
    public function index() {
        return view('user.profile.index');
    }

    public function edit($id) 
    {
        $user = User::find($id);
        return view('user.profile.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $file = $request->avatar;
        $avatar = '';
        if($file){
            $avatar = $file->getClientOriginalName();
             if (file_exists( public_path() . '/upload/' . $avatar)) {
                $avatar = time().$avatar;
            }    
            $file->move('upload', $avatar );
        }
        $dataUpdate = User::find($id);
        $dataUpdate->avatar = $avatar;
        $dataUpdate->name= $request->name;
        $dataUpdate->phone = $request->phone;
        $dataUpdate->email = $request->email;
        $dataUpdate->save();
         return redirect(route($this->tableName.'.index', $id))->with([
            'type' => 'success',
            'message' => 'Sửa thành công'
        ]);
    }
    public function password($id) 
    {
        $user = User::find($id);
        return view('user.profile.password', compact('user'));
    }

    public function reset(Request $request, $id)
    {
        $request->validate([
            'old-password' => 'required',
            'password' => 'required',
            're-password' => 'required|same:password',
        ],
        [
            'old-password.required' => 'Password cũ là bắt buộc',
            'password.required' => 'Password mới là bắt buộc',
            're-password.required' => 'Bạn chưa nhập lại mật khẩu',
            're-password.same' => 'Mật khẩu nhập lại chưa khớp',
        ]);

        extract($request->all(), EXTR_OVERWRITE);
        $dataUpdate = User::find($id);
        $dataUpdate->password = bcrypt($request->password);
        $dataUpdate->save();
        return view('user.profile.index');
    }
}
