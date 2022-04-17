<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\CustomAuthController;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home(){
        $data = array();
        if(Session()->has('loginID')){
            $data = DB::table('Users')->where('id','=', Session()->get('loginID'))->first();
        }
        return view('pages.home', compact('data'));
    }
}
