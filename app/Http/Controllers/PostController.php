<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use App\Models\File;
use App\Models\Post;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    public function postimg(Request $request){

        $userID = Session()->get('loginID');
        $fileName = $userID.'.'.time().'.'.$request->file->extension();
        $caption = $request->caption;
        if($caption == NULL){
            $caption ='';
        }
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
            $new_post = new Post();
            $new_post->userid = $userID;
            $new_post->caption = $caption;
            $new_post->likecount = 0;
            $new_post->imgdir =  $fileName;  
            
            $res= $new_post->save();
            // $result = $request->file->storeOnCloudinary('posts');

            if($res){
                $request->file->move(public_path('image/post'), $fileName);
            }
    }
}
