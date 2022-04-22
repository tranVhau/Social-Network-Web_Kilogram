<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
Use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Session\Session;


class LoginController extends Controller
{
    public function login(){
        return view('pages._login');
    }

    public function registration(){
        return view('pages._register');
    }

    public function registerUser(Request $request){
        $request->validate([
            'fullname'=>'required',
            'username'=>'required|unique:users|',
            'password'=>'required|min:5|max:12',
            'gender'=>'required'
        ]);
        
        $user = new User();
        $user->fullname = $request->fullname;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->gender = $request->gender;
        $user->describe = '';
        
        $res= $user->save();
        if($res){
            return back()->with('success','Register Successfully');
        }else{
            return back()->with('fail','Register Failed!!!');
        };
    }

    public function loginUser(Request $request){
        $request->validate([
            'username'=>'required',
            'password'=>'required'       
        ]);
        $condition1 = User::where('username', '=', $request->username)->first();
        
        if(!$condition1){
            $condition2 = Hash::check($request->password, '');
        }else{
            $condition2 = Hash::check($request->password, $condition1->password);
        }
        
        if($condition1 && $condition2){
            $request->Session()->put('loginID', $condition1->id);
            return redirect('home');
        }else{
            return back()->with('fail','Wrong username or password');
        }
    }
    
    public function logout(){
        if(Session()->has('loginID')){
            Session()->pull('loginID');
        }
        return redirect('login');
    }
}
