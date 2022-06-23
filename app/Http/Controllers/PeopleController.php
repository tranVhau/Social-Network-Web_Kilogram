<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PeopleController extends Controller
{
    public function peopleProfile($username){
        $status = 'follow-btn';
        $currID = Session()->get('loginID');
        $infoUser = DB::table('users')->where('username',$username)->first();
        $userPosts = DB::table('posts')->where('userid',$infoUser->id)->get();
        $isFollow = DB::table('follow')->where([['follower','=',$currID],['following','=',$infoUser->id]]);

        $follower = DB::table('follow')->where('following',$infoUser->id )->count();
        $following = DB::table('follow')->where('follower',$infoUser->id )->count();
        $postCount = DB::table('posts')->where('userid', $infoUser->id)->count();
        $infoUser->follower = $follower;
        $infoUser->following = $following;
        $infoUser->postCount = $postCount;

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

    public function searchFunc(Request $request){
        $res = DB::table('users')->where('username','LIKE','%'.$request->keyword.'%')->get();
        return (['user'=>$res]);
    }
}