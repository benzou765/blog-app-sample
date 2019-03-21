<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Requests\FrontBlogRequest;

class FrontBlogController extends Controller
{
    // 1ページあたりの表示件数
    const NUM_PER_PAGE = 10;

    /**
     * トップページ
     * @param FrontBlogRequest $request リクエスト
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(FrontBlogRequest $request)
    {
        $year = $request->input('year', 0);
        $month = $request->input('month', 0);

        // 記事の取得
        $list = Article::getArticleList(self::NUM_PER_PAGE, $year, $month);
        $list->appends(['year' => $year, 'month' => $month]);

        $month_list = Article::getMonthList();
        return view('front_blog.index', compact('list', 'month_list'));
    }
}
