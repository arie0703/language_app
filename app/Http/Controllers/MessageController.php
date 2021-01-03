<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Entry;
use App\Models\Room;
use App\Models\Message;

class MessageController extends Controller
{
    public function create (Request $request)
    {
        $room = Room::find($request->id);
        $room_id = $request->room_id;

        if(!empty(Entry::where('user_id', Auth::user()->id)->where('room_id', $room_id ))) {
            $message = new Message();
            $message->content = $request->content;
            $message->user_id = Auth::user()->id;
            $message->room_id = $room_id;
            $message -> save();
        }

        return redirect()->route('room.show', ['id' => $room_id]);
    }

    public function getMessages($roomId) 
    {
        
        $messages = Message::where('room_id', 'like', '%' . $roomId . '%')->orderBy('created_at', 'asc')->get();
        $json = ["messages" => $messages];
        return response()->json($json);

    }
}
