<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use App\Models\File;
use App\Models\Post;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function postimg(Request $request){

        $userID = Session()->get('loginID');
       
        $data = $request->image;
        $caption = $request->caption;

        $request->validate([
            'image' => 'required',
        ]);

        
        $image_name= $userID.'.'.time().'.png';
        $path = public_path() . "/image/post/".$image_name;
        
        
        if($caption == NULL){
            $caption ='';
        }
        
        $new_post = new Post();
        $new_post->userid = $userID;
        $new_post->caption = $caption;
        $new_post->likecount = 0;
        $new_post->imgdir =  $image_name;  
        
        $res= $new_post->save();

            if($res){
                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);

                $data = base64_decode($data);
                file_put_contents($path, $data);
            }
            

            
            
            // $result = $request->file->storeOnCloudinary('posts');

    }

    public function postDel(Request $request){
        // DB::table('posts')->where('postid', $request->pro_PostID)->delete();
        $currPost = DB::table('posts')->where('postid', $request->pro_PostID)->first();

        $image_path = 'image/post/'.$currPost->imgdir;
        
        if(file_exists($image_path)) {
            @unlink($image_path);
            DB::table('posts')->where('postid', $request->pro_PostID)->delete();
        }
        
    }

    public function postEdit(Request $request){
        DB::table('posts')->where('postid', $request->postID)->update(['caption'=>$request->newCaption]);
    }
}
