<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Motel;
use App\Models\User;



class MainAdminController extends Controller
{
    public function index()
    {
        $motels = Motel::count();
        $users = User::count();
        $summotels1 = Motel::where('approve','=','1')->get()->count();
        $summotels2 = Motel::where('approve','=','2')->get()->count();
        $summotels3 = Motel::where('approve','=','3')->get()->count();
        $summotels4 = Motel::where('created_at', ">=", date("Y-m-d H:i:s", strtotime('-1 months', time())))->get()->count();

        $motel = Motel::where('created_at', ">=", date("Y-m-d H:i:s", strtotime('-30 days', time())))
			    	->get();
          
    	return view('admin.dashboard',compact('motels','motel','users','summotels1','summotels2','summotels3', 'summotels4'),[ 'title' => 'Quản trị admin']);
    }
}
