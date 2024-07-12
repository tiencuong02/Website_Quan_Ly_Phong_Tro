<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct() {
    	$this->middleware(function ($request, $next) {
	    	$auth = \Auth::guard('web')->user();
	    	$adminLogin = \App\Models\User::find($auth->id);
	    	\View::share('adminLogin', $adminLogin);
            return $next($request);
        });
        
    }

    public function checkRole($roles = []) {
    	$auth = \Auth::guard('web')->user();
    	if(!in_array($auth->role, $roles)) {
    		return false;
    	}
    	return true;
    }
}
