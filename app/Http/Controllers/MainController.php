<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\DB;
use App\Models\Motel;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    public function __construct(Request $request) {
        parent::__construct();
        $this->middleware(function ($request, $next) {
            $this->tableName = 'motels';
            $this->title = 'Đăng bài';
            $this->approves = config('app.approve');
            \View::share('approves', $this->approves);
            \View::share('tableName', $this->tableName);
            \View::share('title', $this->title);
            if($this->checkRole([1,2,3])) {
                return $next($request);
            }
            return redirect()->back()->withErrors('Bạn không có quyền');
        });
    }
    public function index()
    {
    	$motels = Motel::where('approve','=','1')->with(['user'])-> paginate(3);
    	$news = Motel::where('created_at', ">=", date("Y-m-d H:i:s", strtotime('-24 days', time())))
			    	->where('approve','=','1')
			    	->with(['user'])
			    	->get();
        $views = Motel::where('approve','=','1')->max('count_view');
        $view = Motel::where('count_view','=', $views)->with(['user'])->get();
    	return view('home',compact('motels','news','view'),[ 'title' => 'Trang chủ']);

    }
    public function search(Request $request)
    {
    // Get the search value from the request
	    $motels = Motel::where('approve','=','1')->with(['user']);
        if( $request->address){
            $motels = $motels->where('address', 'LIKE', "%" . $request->address . "%");
        }
        if( $request->utilities){
            $motels = $motels->where('utilities', 'LIKE', "%" . $request->utilities . "%");
        }
        if( $request->area == 1){
            $motels = $motels->where('area','>', '19')
                            ->where('area','<', '31');
        }
        if( $request->area == 2){
            $motels = $motels->where('area','>=', '30')
                            ->where('area','<=', '40');
        }
        if( $request->area == 3){
            $motels = $motels->where('area','>=', '40')
                            ->where('area','<=', '50');
        }
        if( $request->area == 4){
            $motels = $motels->where('area','>=', '50');
        }
        if( $request->price == 1){
            $motels = $motels->where('price','>=', '500000') 
                            ->where('price', '<=', '1000000');
        }
        if( $request->price == 2){
            $motels = $motels->where('price','>=', '1000000') 
                            ->where('price', '<=', '2000000');
        }
        if( $request->price == 3){
            $motels = $motels->where('price','>=', '2000000') 
                            ->where('price', '<=', '3000000');
        }
        if( $request->price == 4){
            $motels = $motels->where('price','>=', '3000000');
        }
        $motels = $motels->paginate(2);
        $news = Motel::where('created_at', ">=", date("Y-m-d H:i:s", strtotime('-24 days', time())))
        			->where('approve','=','1')
        			->with(['user'])
        			->get();
        $views = Motel::where('approve','=','1')->max('count_view');
        $view = Motel::where('count_view','=', $views)->with(['user'])->get();
        return view('home', compact('motels','news','view'));

	}
    public function create() {
        return view('user.motels.create');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
        ],
        [
            'title.required' => 'Tên là bắt buộc',
        ]);
        extract($request->all(), EXTR_OVERWRITE);
        $file = $request->images;
        $images = '';
        if($file){
            $avatar = $file->getClientOriginalName();
             if (file_exists( public_path() . '/upload/' . $images)) {
                $images = time().$images;
            }    
            $file->move('upload', $images );
        }
        $today = Carbon::today();
        $dataInsert = [
            'title' => $title,
            'description' => $description,
            'utilities' => $utilities,
            'area' =>$area,
            'price' => $price,
            'address' => $address,
            'images' => $images,
            'phone' => $phone,
            'user_id' => $adminLogin,
            'approve' => 2,
            'created_at' => $today,
        ];
        $id = Motel::insertGetId($dataInsert);
        return redirect(route($this->tableName.'.index', $id))->with([
            'type' => 'success',
            'message' => 'Thêm mới thành công'
        ]);
    }
	public function detail($id)
    {
        $motel = Motel::findOrFail($id);
        $motel->update([
	    'count_view' => $motel->count_view + 1
	   	]);
        return view('detail', compact('motel'));
    }
    public function baocao(Request $request, $id)
    {
        $dataUpdate = Motel::find($id);
        $dataUpdate->approve = 4;
        $dataUpdate->save();
        return redirect(route('home'))->with([
            'type' => 'success',
            'message' => 'Báo cáo thành công'
        ]);
    }
}

