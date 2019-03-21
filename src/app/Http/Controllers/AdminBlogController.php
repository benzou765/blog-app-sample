<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Requests\AdminBlogRequest;
use App\Models\Article;

class AdminBlogController extends Controller
{
    /**
     * 入力フォームのビューを表示
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function form(int $id = null)
    {
        $article = Article::find($id);

        $input = [];
        if ($article) {
            $input = $article->toArray();
            $input['post_date'] = $article->post_date_text;
        }  else {
            $id = null;
        }

        $input = array_merge($input, old());

        return view('admin_blog.form', compact('input', 'id'));
    }

    /**
     * 保存処理
     * @param AdminBlogRequest $request リクエスト
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function post(AdminBlogRequest $request)
    {
        $input = $request->input();

        $id = array_get($input, 'id');

        \DB::beginTransaction();
        try {
            $article = Article::updateOrCreate(['id' => $id], $input);
            \DB::commit();
        } catch(\Exception $e) {
            \DB::rollback();
            throw $e;
        }

        $redirectPath = '/admin/form'.($id?'/'.$id:'');

        return redirect($redirectPath)->with('message', '記事を保存しました');
    }
}
