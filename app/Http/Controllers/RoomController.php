<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Entry;
use App\Models\Room;
use App\Models\Message;

class RoomController extends Controller
{

    public function create(Request $request)
    {
        $user = User::find($request->id);
        $userId = $request->user_id;

        $room = new Room();
        $room->save();

        $entry1 = new Entry();
        $entry1->user_id = Auth::user()->id;
        $entry1->room_id = $room->id;
        $entry1->save();

        $entry2 = new Entry();
        $entry2->user_id = $userId;
        $entry2->room_id = $room->id;
        $entry2->save();

        logger($room->id);
        logger($userId);

        return redirect()->route('room.show', ['id' => $room->id]);
    }

    public function show(Request $request)
    {
        $room = Room::find($request->id);


        //現在ログイン中のユーザーが所属しているエントリー一覧を取得する
        $user_entries = Entry::where('user_id', Auth::user()->id)->get();
            
        //ログイン中ユーザーと同じroomにいるユーザーの情報を取得する
        $user_info = [];
        foreach($user_entries as $e) {

            $roomid = $e->room_id;
            $entries2 = Entry::where('room_id', $roomid)->get();

            //entries2には2つのエントリー情報があり、片方はログイン中ユーザー・もう片方は別のユーザー
            foreach($entries2 as $e2) {
                //条件分岐によって同じルームにいる別ユーザーの情報を取り出す。
                if($e2->user_id != Auth::user()->id) {
                    $another_user = User::where('id', $e2->user_id)->first();
                    //配列にユーザー情報を入れる
                    array_push($user_info, $another_user);
                }
            } 
        }


        // 条件分岐によって、rooms/indexとrooms/showのどちらかを表示させる
        if ($request->id == null) {

            //rooms/index
            
            // entriesがログイン中ユーザーが所属するentryの配列、user_infoがログイン中ユーザーと同じルームにいる情報の配列となる。
            return view('rooms/index', [
                'user_entries' => $user_entries,
                'user_info' => $user_info,
            ]);




        } else {

            //rooms/show

            if(!empty(Entry::where(['user_id', Auth::user()->id], ['room_id', $room->id ]))) {
                $messages = Message::where('room_id', $room->id)->orderBy('created_at', 'asc')->get();
                $message = new Message();
                $entries = Entry::where('room_id', $room->id)->orderBy('created_at', 'desc')->get();
    
                $current_user = null;
                $error_msg = "";
    
                foreach($entries as $entry) {
    
                    //各ルームに2つあるEntryのうち、user_idがログイン中ユーザーと同一のものがあれば、current_userに自分のユーザー名が代入される。
                    if($entry->user_id == Auth::user()->id ) {
                        $current_user = Auth::user()->name;
                    } else {
                        $user = User::where('id', $entry->user_id)->first();
                        $another_user = $user->name;
                    }
    
                }
    
                //第三者がルームにアクセスした場合、current_userはnullになるのでエラ〜メッセージを定義し、ビューに表示させる。
                $error_msg = "Sorry, you cannot access this page!";
    
                return view('/rooms/show', 
                [
                    'id' => $room->id,
                    'error_msg' => $error_msg,
                    'room' => $room, 
                    'messages' => $messages, 
                    'entries' => $entries,
                    'user_info' => $user_info,
                    'another_user' => $another_user,
                    'current_user' => $current_user,
                    'user_entries' => $user_entries,
                    'user_info' => $user_info,
                ]);
    
            } else {
                return redirect('/rooms/show', [
                    'id' => $room->id,
                    'room' => $room
                ]);
            }




        }

        
        
        
    }
    
}
