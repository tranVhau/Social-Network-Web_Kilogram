<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Psy\Command\WhereamiCommand;

class PeopleController extends Controller
{
    public function peopleProfile($username){
        $status = 'follow-btn';
        $currID = Session()->get('loginID');
        $infoUser = DB::table('users')->where('username',$username)->first();
        $userPosts = DB::table('posts')->where('userid',$infoUser->id)->get();
        $isFollow = DB::table('follow')->where([['follower','=',$currID],['following','=',$infoUser->id]]);
        if($isFollow->first()){
            $status='follow-btn-1';
            $text ="Following";
        }else{
            $status='follow-btn';
            $text ="Follow";
        }
        return view('pages.otherProfile', ['info'=>$infoUser,'posts'=>$userPosts, 'status'=>$status,'text'=>$text]);
    }
    
    public function onFollow(Request $request){
        $currID = Session()->get('loginID');
        $isExist = DB::table('follow')->where([['follower','=',$currID],['following','=',$request->followId]]);
        if($isExist->first())
        {
            $isExist->delete();   
        }else
        {            
            DB::table('follow')->insert(['follower'=>$currID, 'following' =>$request->followId]);
        }
        
    }
}