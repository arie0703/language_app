<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;
use JD\Cloudder\Facades\Cloudder;

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
       //画像

       if ($request->image != null) {
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

                $post->image = $imageUrl;
            }
       }

       

       $post->state = $request->state;

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

    public function edit(Request $request)
    {
        $post = Post::find($request->id);
        //投稿者じゃないユーザーが編集ページにアクセスしないように設定！
        if ($post->user_id != Auth::user()->id ) {
            return redirect('/mypost');
        } else {
            return view('posts/edit', ['post' => $post]); 
        }
    }

    public function update(Request $request)
    {
        $post = Post::find($request->id);

        //nullを許容するために条件分岐を使用
        if($request->image != null){
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

                $post->image = $imageUrl;
            }
        };

        $post->language = $request->language;
        $post->state = $request->state;

        $form = $request->all();
        unset($form['_token']);
        unset($form['_method']);
        $post->fill($form)->save();
        return redirect('/mypost');
    }

    public function delete(Request $request)
    {
        $post = Post::find($request->id);

        //投稿者じゃないユーザーが削除ページにアクセスしないように設定！
        if ($post->user_id != Auth::user()->id ) {
            return redirect('/mypost');
        } else {
            return view('posts/delete', ['post' => $post]); 
        }
        
    }

    public function remove (Request $request)
    {
        $post = Post::find($request->id)->delete();
        return redirect('/mypost');
    }


   //Language Timeline
   public function English(Post $post)
   {
        $posts = Post::where('language', 'English')->where('state',0)
        ->orderBy('created_at', 'desc')->get();
        return view('posts/language/english', [
            'posts' => $posts,
        ]);    
   }

   public function French(Post $post)
   {
        $posts = Post::where('language', 'French')->where('state',0)
        ->orderBy('created_at', 'desc')->get();
        return view('posts/language/french', [
            'posts' => $posts,
        ]);
   }

   public function German(Post $post)
   {
        $posts = Post::where('language', 'German')->where('state',0)
        ->orderBy('created_at', 'desc')->get();
        return view('posts/language/german', [
            'posts' => $posts,
        ]);
   }

   public function Spanish(Post $post)
   {
        $posts = Post::where('language', 'Spanish')->where('state',0)
        ->orderBy('created_at', 'desc')->get();
        return view('posts/language/spanish', [
            'posts' => $posts,
        ]);
   }

   public function Portuguese(Post $post)
   {
        $posts = Post::where('language', 'Portuguese')->where('state',0)
        ->orderBy('created_at', 'desc')->get();
        return view('posts/language/portuguese', [
            'posts' => $posts,
        ]);
   }

   public function Russian(Post $post)
   {
        $posts = Post::where('language', 'Russian')->where('state',0)
        ->orderBy('created_at', 'desc')->get();
        return view('posts/language/russian', [
            'posts' => $posts,
        ]);
   }

   public function Japanese(Post $post)
   {
        $posts = Post::where('language', 'Japanese')->where('state',0)
        ->orderBy('created_at', 'desc')->get();
        return view('posts/language/japanese', [
            'posts' => $posts,
        ]);
   }

   public function Chinese(Post $post)
   {
        $posts = Post::where('language', 'Chinese')->where('state',0)
        ->orderBy('created_at', 'desc')->get();
        return view('posts/language/chinese', [
            'posts' => $posts,
        ]);
   }

   public function Korean(Post $post)
   {
        $posts = Post::where('language', 'Korean')->where('state',0)
        ->orderBy('created_at', 'desc')->get();
        return view('posts/language/korean', [
            'posts' => $posts,
        ]);
   }
   
}
