<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
}
