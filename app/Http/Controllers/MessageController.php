<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use GuzzleHttp\Psr7\Query;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Pusher\Pusher;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    
    public function message(){
        $myID = Session()->get('loginID');

        DB::statement("CREATE OR REPLACE VIEW v_following 
            as
            SELECT u.id, username, fullname, avatar,follower, following
            FROM users u
            
            JOIN follow on u.id = follow.follower
            WHERE u.id = $myID
            ");

        $users =  DB::select("SELECT u.id, u.username,u.fullname, u.avatar 
        from users u  
        LEFT JOIN v_following on 
        v_following.following = u.id 
        WHERE u.id != $myID AND following is NOT NULL
        UNION
        SELECT  z.id, z.username, z.fullname, z.avatar
        FROM messages m
        JOIN users z on m.from = z.id
        WHERE m.to = $myID
        ");

        return view('pages.message',['users'=>$users, 'myID'=>$myID]);
    }
    

    public function getmessage($user_id){
        $my_id = Session()->get('loginID');
        $messages = DB::table('messages')->where(function ($query) use ($user_id, $my_id) {
            $query->where('from', $user_id)->where('to', $my_id);
        })->oRwhere(function ($query) use ($user_id, $my_id) {
            $query->where('from', $my_id)->where('to', $user_id);
        })->get();

        return view('pages.inboxfield', ['messages' =>$messages,'my_id'=>$my_id]);
    }

    public function sendmessage(Request $request){

        $from = Session()->get('loginID');

        // dd($from);
        $to = $request->receiver_id;
        $message = $request->message;

        $data = new Message();
        $data->from = $from;
        $data->to = $to;
        $data->message = $message;
        $data->is_read = 0;
        $data->save();

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

        $data = ['from' => $from, 'to'=>$to];
        $pusher ->trigger('my-channel', 'my-event', $data);
    }
}
