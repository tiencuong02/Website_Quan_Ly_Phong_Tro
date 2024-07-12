<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\User;
use Illuminate\Routing\Controller as BaseController;

class LoginController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        if (Auth::check() == True)
        {
           return redirect()->route('home');
        }
        else
        {
        return view('login.login');
        }
    }
     public function register()
    {
        return view('login.register');
    }
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'username' => 'required',
                'password' => 'required'
            ],
        );
        if (Auth::attempt([
            'username' => $request-> input('username'),
            'password' => $request-> input('password'),
        ],))
        {
            return redirect()->route('home');
        }
        session::flash('error','Username hoặc Password không đúng');
    return redirect()->back();
    }

    public function create(Request $request) {
        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required',
            'repeatpassword' => 'required|same:password',
        ],
        [
            'username.unique' => 'Tên đăng nhập đã tồn tại',
            'username.unique' => 'Username đã được sử dụng',
            'repeatpassword.required' => 'Bạn chưa nhập lại mật khẩu',
            'repeatpassword.same' => 'Mật khẩu nhập lại chưa khớp',
        ]);
        $file = $request->avatar;
        $avatar = '';
        if($file){
            $avatar = $file->getClientOriginalName();
             if (file_exists( public_path() . '/upload/' . $avatar)) {
                $avatar = time().$avatar;
            }    
            $file->move('upload', $avatar );
        }
        
        $user = new User;
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->phone = $request->phone;
        $user->avatar = $avatar;
        $user->role = $request->role;
        $user->save();
        return redirect()->route('login')->with([
            'type' => 'success',
            'message' => 'Thêm mới thành công'
        ]);
    }
    public function logout(Request $request){
        Auth::logout();
        return redirect()->route('login');
    }
    

}
