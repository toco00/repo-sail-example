<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// 既存トップページコメントアウト
//Route::get('/', function () {
//    /return view('welcome');
//});
Route::get('/',[PostsController::class,'index']);

/* aboutページ */
Route::get('/about', function () {
    return 'このブログについて';
});
/* 記事リストページ */
Route::get('/posts', function () {
    return '<h1>記事リスト</h1>';
});

/* 記事詳細ページ */    
Route::get('/posts/{id}', function ($id) {
    // 配列でパラメータの宣言
    // View側でブレイドテンプレートが使える
    // フォルダを切る場合/ではなく.で区切る
    return view('posts.post', ['id' => $id]);
});

Route::get('posts/{id}', [PostsController::class, 'show']);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
