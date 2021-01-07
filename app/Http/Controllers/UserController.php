<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Post;
use App\Models\Entry;
use App\Models\Room;
use App\Models\Message;
use JD\Cloudder\Facades\Cloudder;

class UserController extends Controller
{
    /*
    public function show(User $user)
   {
       $user = User::find($user->id);
       $posts = Post::where('user_id', $user->id)
       ->orderBy('created_at', 'desc')->get();
       return view('posts/index', [
           'user_name' => $user->name,
           'posts' => $posts,
       ]);        
   }
   */


    public function getUsers($userName) 
    {
        
        $users = User::where('name', 'like', '%' . $userName . '%')->orderBy('created_at', 'desc')->get();
        $json = ["user" => $users];
        return response()->json($json);

    }

    public function getUsers2() 
    {
        
        $user = User::orderBy('created_at', 'desc')->get();

        $json = ["user" => $user];
        return response()->json($json);

    }

    public function search()
    {
        return view('user/search');
    }

    public function getCurrentUser() 
    {
        $user = Auth::user();

        $json = ["user" => $user];
        return response()->json($json);
    }

    public function show(Request $request) 
    {
        $user = User::find($request->id);
        
        //userに紐づくpost
        $posts = Post::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

        //entry
        $currentUserEntry = Entry::where('user_id', Auth::user()->id)->get();
        $userEntry = Entry::where('user_id', $user->id)->get();

        //初期値
        $isRoom = false;
        $roomId = null;

        if (Auth::user()->id != $user->id) {
            foreach ($currentUserEntry as $cu ) {
                foreach($userEntry as $u ) {
                    if ( $cu->room_id == $u->room_id ) {
                        $isRoom = true;
                        $roomId = $cu->room_id;
                    }
                }
            }
        }

        return view('/user/show', 
        [
            'user' => $user, 
            'posts' => $posts,
            'isRoom' => $isRoom,
            'roomId' => $roomId,
            'currentUserEntry' => $currentUserEntry,
            'userEntry' => $userEntry,
            
        ]);
    }

    public function edit(Request $request) {
        $user = Auth::user();
        return view('/user/edit', ['user' => $user]);
    }

    public function update(Request $request) {
        $user = Auth::user();


        if ($image = $request->file('image')) {
            $image_name = $image->getRealPath();
            // Cloudinaryへアップロード
            Cloudder::upload($image_name, null);
            list($width, $height) = getimagesize($image_name);
            $publicId = Cloudder::getPublicId();
            $imageUrl = Cloudder::show($publicId, [
                'width'     => $width,
                'height'    => $height
            ]);
            $user->image = $imageUrl;
        }

        $user->name = $request->name;
        
        $user->save();
        return redirect('/');
    }
}
