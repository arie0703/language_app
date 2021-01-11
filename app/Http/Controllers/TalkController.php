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
       return view('talks');
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
       return redirect()->route('talk');
   }

   //ユーザーの投稿を表示
   public function index(talk $talk)
   {
        $user = Auth::user()->id;
        $talks = talk::orderBy('created_at', 'desc')->get();

        $json = ["talks" => $talks];
        //return response()->json($json);

        return view('talks/index', [
            'talks' => $talks,
            'user' => $user,
        ]);        
   }

   public function show(Request $request)
   {
       $talk = Talk::find($request->id);
       $user = User::where('id', $talk->user_id)->first();

       return view('talks/show', [
           'talk' => $talk,
           'user' => $user,
       ]);
   }

   public function getData() 
   {
        $talks = talk::orderBy('created_at', 'desc')->get();

        $json = ["talks" => $talks];
        return response()->json($json);
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
        return redirect('talk');
    }

    public function delete(Request $request)
    {
        Talk::find($request->id)->delete();
        return redirect('talk');
    }

    public function remove (Request $request)
    {
        $talk = talk::find($request->id);
        $talk->delete();
        return redirect('talk');
    }

}
