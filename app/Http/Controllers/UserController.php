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

    public function edit(Request $request) {
        $user = Auth::user();
        return view('/user/edit', ['user' => $user]);
    }

    public function update($id, Request $request) {
        $user = Auth::user();
        $form = $request->all();

        $profileImage = $request->file('image');

        $form = $request->all();
        if ($profileImage != null) {
            $form['image'] = $this->saveProfileImage($profileImage, $id); // return file name
        }

        unset($form['_token']);
        unset($form['_method']);
        $user->fill($form)->save();
        return redirect('/');
    }

    private function saveProfileImage($image, $id) {
        // get instance
        $img = \Image::make($image);
        // resize
        $img->fit(100, 100, function($constraint){
            $constraint->upsize(); 
        });
        // save
        $file_name = 'profile_'.$id.'.'.$image->getClientOriginalExtension();
        $save_path = 'public/storage/'.$file_name;
        Storage::put($save_path, (string) $img->encode());
        // return file name
        return $file_name;
    }
}
