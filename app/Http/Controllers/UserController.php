<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Post;

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

    public function edit(Request $request) {
        $user = Auth::user();
        return view('/user/edit', ['user' => $user]);
    }

    public function update($image_id, Request $request) {
        $user = Auth::user();
        $form = $request->all();

        $profileImage = $request->file('image');

        if ($profileImage != null) {
            $form['image'] = $this->saveProfileImage($profileImage, $image_id); // return file name
        }

        unset($form['_token']);
        unset($form['_method']);
        $user->fill($form)->save();
        return redirect('/');
    }

    private function saveProfileImage($image, $image_id) {
        // get instance
        $img = \Image::make($image);
        // resize
        $img->fit(100, 100, function($constraint){
            $constraint->upsize(); 
        });
        // save
        $file_name = 'profile_'.$image_id.'.'.$image->getClientOriginalExtension();
        $save_path = 'public/storage/'.$file_name;
        Storage::put($save_path, (string) $img->encode());
        // return file name
        return $file_name;
    }
}
