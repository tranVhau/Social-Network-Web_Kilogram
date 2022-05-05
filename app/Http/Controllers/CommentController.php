<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    //

    public function postModal($postID){
        // $dataPost = DB::table('posts')->where('postid',$postID)->get();
        // $currID = Session()->get('LoginID');
        // $currUser = DB::table('user')
        $dataPost = DB::table('users')->join('posts','id','userid')->where('postid',$postID)->first();

    //     $dataPost = DB::select("SELECT * FROM (SELECT u.id, u.username, u.fullname, u.avatar, p.postid, p.imgdir, p.caption, p.likecount, p.created_at
    //     FROM users u 
    //     JOIN posts p 
    //     WHERE u.id = p.userid) k 
    // WHERE k.postid = $postID");
    

    // dd($dataPost);
    return response()->json($dataPost);
    // return(['data'=>$dataPost]);
    }
}
