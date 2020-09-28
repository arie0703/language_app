<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
       //コンテンツ
       $post->content = $request->content;
       //登録ユーザーからidを取得
       $post->user_id = Auth::user()->id;
       // インスタンスの状態をデータベースに書き込む
       $post->save();
       //「投稿する」をクリックしたら投稿情報表示ページへリダイレクト        
       return redirect()->route('posts.detail', [
           'id' => $post->id,
       ]);
   }
}
