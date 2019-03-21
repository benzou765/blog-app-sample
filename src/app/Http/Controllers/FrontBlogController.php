<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class FrontBlogController extends Controller
{
    // 1ページあたりの表示件数
    const NUM_PER_PAGE = 10;

    /**
     * トップページ
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $list = Article::getArticleList(self::NUM_PER_PAGE);
        return view('front_blog.index', compact('list'));
    }
}
