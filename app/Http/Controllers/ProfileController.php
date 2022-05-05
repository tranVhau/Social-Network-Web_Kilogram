<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class ProfileController extends Controller
{
    public function profile(){
        $currID = Session()->get('loginID');
        $loadIMG=DB::table('posts')->where('userid',$currID)->get();
        $loadAVT=DB::table('users')->where('id',$currID)->value('avatar');
        return view('pages.profile', ['avatar'=>$loadAVT, 'loadIMG'=>$loadIMG]);
    }

    public function mdfProfile(Request $request){
        $currID = Session()->get('loginID');
        $query = DB::table('users')->where('id',$currID);
        // $query = $qr->fetch_row();

        
        if(isset($request->username_mdf)){
            $mdf_username = $request->username_mdf;
            $count_user = DB::table('users')->where('username', $mdf_username)->count();
            if($count_user>0){
                return response()->json(['error' => 'Username already'], 500);
            }
            
        }
        else{
            $mdf_username = $query->value('username');
        }
        if(isset($request->fullname_mdf)){
            $mdf_fullname = $request->fullname_mdf;
        }
        else{
            $mdf_fullname = $query->value('fullname');
        }
        if(isset($request->desciption)){
            $mdf_des = $request->desciption;
        }
        else{
            $mdf_des = $query->value('describe');
        }
        if(isset($request->avt_img)){
            $fileName = 'AVT'.'.'.$currID.'.'.time().'.'.$request->avt_img->extension();
            $request->avt_img->move(public_path('image/avt'), $fileName);
            DB::table('users')->where('id', $currID)->update(['username'=>$mdf_username,'avatar'=>$fileName, 'fullname'=>$mdf_fullname, 'describe'=>$mdf_des]);
        }
        else{
            DB::table('users')->where('id', $currID)->update(['username'=>$mdf_username, 'fullname'=>$mdf_fullname, 'describe'=>$mdf_des]);
        }

       
        return response()->json(['success' => 'Successfully'],200);
    }

}
