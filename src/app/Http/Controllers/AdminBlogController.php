<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class AdminBlogController extends Controller
{
    /**
     * 入力フォーム
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function form()
    {
        return view('admin_blog.form');
    }

    public function post()
    {
        $input = $request->input();

        $article = Article::create($input);

        return redirect('/admin/form')->with('message', '記事を保存しました');
    }
}
