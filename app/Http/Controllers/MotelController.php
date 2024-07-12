<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\Motel;
use Carbon\Carbon;

class MotelController extends Controller
{
    public function __construct(Request $request) {
        parent::__construct();
        $this->middleware(function ($request, $next) {
            $this->tableName = 'motels';
            $this->title = 'Quản lý bài đăng';
            $this->approves = config('app.approve');
            \View::share('approves', $this->approves);
            \View::share('tableName', $this->tableName);
            \View::share('title', $this->title);
            if($this->checkRole([1,2])) {
                return $next($request);
            }
            return redirect()->back()->withErrors('Bạn không có quyền');
        });
    }
    public function index() 
    {
        if($this->checkRole([1])) {
            $motels = Motel::get();
            return view('admin.motels.index', compact('motels'));
        }
        if($this->checkRole([2])) {
            $auth = \Auth::guard('web')->user();
            $id = $auth->id;
            $motels = Motel::where('motels.user_id','=',$id)->get();
            return view('user.motels.index', compact('motels'));
        }

    }
    /**
     * 
     */
    public function create() {
        if($this->checkRole([1])) {
        return view('admin.motels.create');
        }
        if($this->checkRole([2])) {
        return view('user.motels.create');
        }
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
        ],
        [
            'title.required' => 'Tên là bắt buộc',
        ]);
        foreach($request->file('file') as $image)
        {
            $imageName=$image->getClientOriginalName();
            $image->move(public_path().'/upload/', $imageName);  
            $fileNames[] = $imageName;
        }
        $images = json_encode($fileNames);
        $insert =['images' => $images,]; 
        $today = Carbon::today();
        $dataInsert = [
            'title' => $request->title,
            'description' => $request->description,
            'utilities' => $request->utilities,
            'area' =>$request->area,
            'price' => $request->price,
            'address' => $request->address,
            'images' => $images,
            'phone' => $request->phone,
            'user_id' => $request->user_id,
            'approve' => 3,
            'created_at' => $today,
        ];
        $id = Motel::insertGetId($dataInsert);
        if($this->checkRole([1])) {
        return redirect(route($this->tableName.'.index', $id))->with([
            'type' => 'success',
            'message' => 'Thêm mới thành công'
        ]);
        }
        if($this->checkRole([2])) {
        return redirect(route('home'))->with([
            'type' => 'success',
            'message' => 'Thêm mới thành công'
        ]);
        }

    }

    public function edit($id) 
    {
        $dataEdit = Motel::find($id);
        if($this->checkRole([1])) {
            return view('admin.motels.edit')->with('GetId',$dataEdit);
        }
        if($this->checkRole([2])) {
            return view('user.motels.edit')->with('GetId',$dataEdit);
        }
    }

    public function update(Request $request, $id)
    {
        $dataUpdate = Motel::find($id);
        $dataUpdate->title= $request->title;
        $dataUpdate->description = $request->description;
        $dataUpdate->price = $request->price;
        $dataUpdate->area = $request->area;
        $dataUpdate->address = $request->address;
        $dataUpdate->phone = $request->phone;
        $dataUpdate->save();
        return redirect(route($this->tableName.'.index', $id))->with([
            'type' => 'success',
            'message' => 'Sửa thành công'
        ]);
    }
    public function destroy($id)
    {
        $dateDestroy = Motel::find($id);

        $dateDestroy->delete();
        return redirect(route($this->tableName.'.index'))->with([
            'type' => 'success',
            'message' => 'Xóa thành công'
        ]);
    }
    public function duyet(Request $request, $id){
        $dataUpdate = Motel::find($id);
        $dataUpdate->approve = 1;
        $dataUpdate->save();
        return redirect()->back();
    }
    public function approve(Request $request, $id)
    {
        $dataUpdate = Motel::find($id);
        $dataUpdate->approve = 2;
        $dataUpdate->save();
        return redirect()->back();
    }
}
