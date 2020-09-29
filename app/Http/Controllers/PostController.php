<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;

class PostController extends Controller
{

    // 投稿フォームの表示
    public function showCreateForm()
   {
       return view('posts/create');
   }


   //投稿機能
   public function create(Request $request)
   {
       // Postモデルのインスタンスを作成する
       $post = new Post();
       // タイトル
       $post->title = $request->title;
       //本文
       $post->body = $request->body;
       //言語
       $post->language = $request->language;
       //登録ユーザーからidを取得
       $post->user_id = Auth::user()->id;
       // インスタンスの状態をデータベースに書き込む
       $post->save();
       //「投稿する」をクリックしたら投稿表示ページへリダイレクト        
       return redirect()->route('/', [
           'id' => $post->id,
       ]);
   }

   //ユーザーの投稿を表示
   public function index(Post $post)
   {
       $posts = Post::where('user_id', Auth::user()->id)
       ->orderBy('created_at', 'desc')->get();
       return view('posts/index', [
           'posts' => $posts,
       ]);        
   }

   public function English(Post $post)
   {
        $posts = Post::where('language', 'English')
        ->orderBy('created_at', 'desc')->get();
        return view('posts/English', [
            'posts' => $posts,
        ]);    

   }
   
}
