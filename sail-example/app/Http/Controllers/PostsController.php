<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/* DBを取得するためのクラス */
// モデルを使う場合はいらない
//use Illuminate\Support\Facades\DB;

/* モデルのPostを使用する */
use App\Models\Post;

class PostsController extends Controller
{
    public function index()
    {
        // DBから全権をとてくる
        $posts = Post::all();
        // オブジェクトが空かどうかを確認
        if( $posts->isEmpty() ){
            abort(404);
            return view('errors.404');
        }

        // ビューに渡す
        return view('posts.index', ['posts' => $posts]);
        
    }

    //
    public function show($id)
    {
        $today = date('Y-m-d');
        // DBからデータを取得
        //$posts = DB::select('SELECT * FROM users where id=1');
        //$post = $posts[0];

        // モデルを使う場合
        $post = Post::find($id);


        return view('posts.post', ['post' => $post, 'today' => $today]);
    }

    /* ☆メソッドが一つの場合の書き方 */
    /* invokeは呼び出すという英単語 */
    //public function __invoke($id)
    //{
    //    $today = date('Y-m-d H:i:s');
    //    return view('posts.post', ['id' => $id, 'today' => $today]);
    //}
}

