<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Talk;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;

class TalkController extends Controller
{

    // 投稿フォームの表示
    public function showCreateForm()
   {
       return view('talks/create');
   }


   //投稿機能
   public function create(Request $request)
   {
       // talkモデルのインスタンスを作成する
       $talk = new Talk();
       // タイトル
       $talk->title = $request->title;
       //本文
       $talk->body = $request->body;
       //ツール
       $talk->tool = $request->tool;

       $talk->language = $request->language;

       if($request->link != null){
       $talk->link = $request->link;
       }


       //登録ユーザーからidを取得
       $talk->user_id = Auth::user()->id;
       // インスタンスの状態をデータベースに書き込む
       $talk->save();
       //「投稿する」をクリックしたら投稿表示ページへリダイレクト        
       return redirect()->route('talk', [
           'id' => $talk->id,
       ]);
   }

   //ユーザーの投稿を表示
   public function index(talk $talk)
   {
       $talks = talk::where('user_id', Auth::user()->id)
       ->orderBy('created_at', 'desc')->get();
       return view('talks/index', [
           'talks' => $talks,
       ]);        
   }

    public function edit(Request $request)
    {
        $talk = talk::find($request->id);
        return view('talks/edit', ['talk' => $talk]); 
    }

    public function update(Request $request)
    {
        $talk = talk::find($request->id);

        $form = $request->all();
        unset($form['_token']);
        unset($form['_method']);
        $talk->fill($form)->save();
        return redirect('/');
    }

    public function delete(Request $request)
    {
        $talk = talk::find($request->id);
        return view('talks/delete', ['talk' => $talk]); 
    }

    public function remove (Request $request)
    {
        $talk = talk::find($request->id);
        $talk->delete();
        return redirect('/');
    }

}
