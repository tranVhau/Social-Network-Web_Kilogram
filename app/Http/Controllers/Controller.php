<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {

            
            $currID =$request->Session()->get('loginID');
            $data = DB::table('Users')->where('id','=', $currID)->first();
            
            $userdata = $request->Session()->get('loginID');

            $loadAVT=DB::table('users')->where('id',$userdata)->value('avatar');

    
            view()->share(['data'=> $data,'avatar'=>$loadAVT]);
    
            return $next($request);
        });
    }
}
