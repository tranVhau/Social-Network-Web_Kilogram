<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Pusher\Pusher;

class CommentController extends Controller
{
    //

    public function postModal($postID){


        $comment_lst = DB::table('users')->join('comment_tb', 'id', 'user_c_id')->where('post_id', $postID)->get();

        $dataPost = DB::table('users')->join('posts','id','userid')->where('postid',$postID)->first();


    
        $response = ['postData'=>$dataPost,'cmtLst'=>$comment_lst];
        return response()->json($response);

    }

    
    public function postComment(Request $request){

        DB::table('comment_tb')->insert([
            'user_c_id'=>Session()->get('loginID'),
            'post_id'=>$request->postID,
            'comment'=>$request->comment
        ]);
        
        $options = array(
            'cluster' => 'ap1',
            'useYLS' => true
        );

        $pusher = new Pusher(
            env(key: 'PUSHER_APP_KEY'),
            env(key: 'PUSHER_APP_SECRET'),
            env(key: 'PUSHER_APP_ID'),
            $options
        );

        $data = ['comment' => $request->comment];
        $pusher ->trigger('my-channel', 'my-event-comment', $data);

    }
}
