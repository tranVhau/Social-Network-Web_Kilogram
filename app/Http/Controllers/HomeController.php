<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\CustomAuthController;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home(){
        $myID = Session()->get('loginID');
        $otherusr = DB::table('users')->where('id','!=',$myID)->get();

        DB::statement("CREATE OR REPLACE VIEW v_following 
                        as
                        SELECT u.id, username, fullname, avatar,follower, following
                        FROM users u
                        
                        JOIN follow on u.id = follow.follower
                        WHERE u.id = $myID
                        ");

        $sugguest = DB::select("SELECT u.id, fullname, username, u.avatar
                                FROM users u
                                LEFT JOIN 
                                (SELECT * FROM follow WHERE follow.follower = $myID) f 
                                on u.id = f.following
                                WHERE u.id != $myID AND following IS NULL;");

        DB::statement("CREATE OR REPLACE VIEW v_feed
                        AS
                        SELECT * FROM users  
                        JOIN 
                            (SELECT vf.follower, vf.following, postid, imgdir, caption, created_at, likecount 
                                FROM v_following vf 
                                JOIN posts on vf.following = posts.userid 
                                WHERE vf.follower =$myID) v
                        on users.id = v.following");
        
        $feed =DB::select("SELECT * FROM v_feed v
                            LEFT JOIN like_tb 
                            ON like_tb.userid = v.follower 
                            AND v.postid = like_tb.post_id");
        
        $friend = DB::select("SELECT u.id, fullname, username, u.avatar
                            FROM users u
                            JOIN 
                            (SELECT * FROM follow WHERE follow.follower = $myID) f 
                            on u.id = f.following");
        

        // DB::statement("DROP VIEW v_following");
        // $sugguest = DB::table('users')->leftjoin('follow','users.id','=','follow.follower' )->
        // leftJoin('follow', 'users.id','=','follow.following' );
        // dd($sugguest);
        return view('pages.home', ['other'=>$otherusr, 'sugguest'=>$sugguest, 'feed'=>$feed,'friend'=>$friend,]);
    }

    public function onFollow(Request $request){
        $currID = Session()->get('loginID');
        $following = $request->followID;
        $isExist = DB::table('follow')->where([['follower','=',$currID],['following','=',$following]]);
        if($isExist->first())
        {
            $isExist->delete();
        }else
        {            
            DB::table('follow')->insert(['follower'=>$currID,'following'=>$following]); 
        }

    }

    public function onLike(Request $request){
        $currID = Session()->get('loginID');
        $isLiked = DB::table('like_tb')->where([['userid','=',$currID],['post_id','=',$request->postID]]);
        if($isLiked->first())
        {
            $isLiked->delete();  
            DB::table('posts')->where('postid',$request->postID)->update(['likecount'=>DB::raw('likecount - 1')]); 
        }else
        {            
            DB::table('like_tb')->insert(['userid'=>$currID, 'post_id' =>$request->postID]); 
            DB::table('posts')->where('postid',$request->postID)->update(['likecount'=>DB::raw('likecount + 1')]);
        }
        $likecount = DB::table('posts')->where('postid',$request->postID)->value('likecount');
        return response()->json(['likecount' => $likecount],200);
    }
}
