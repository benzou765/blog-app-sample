<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminBlogRequest;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;

class AdminBlogController extends Controller
{
    const NUM_PER_PAGE = 10;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function post(AdminBlogRequest $request)
    {
        $input = $request->input();
        $input['user_id'] = $request->user()->id;


        \Log::debug("log:".json_encode($input));

        $id = array_get($input, 'id');

        \DB::beginTransaction();
        try {
            $article = Article::updateOrCreate(['id' => $id], $input);
            \DB::commit();
        } catch(\Exception $e) {
            \DB::rollback();
            throw $e;
        }

//        $redirectPath = '/admin/form'.($id?'/'.$id:'');
        $redirectPath = '/admin/list';

        return redirect($redirectPath)->with('message', '記事を保存しました');
    }

    /**
     * 削除処理
     * @param AdminBlogRequest $request リクエスト
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(AdminBlogRequest $request)
    {
        $id = $request->input('id');
        $result = 0;

        \DB::beginTransaction();
        try {
            $result = Article::destroy($id);
            \DB::commit();
        } catch(\Exception $e) {
            \DB::rollback();
            throw $e;
        }
        var_dump($result);
        $message = $result ? '記事を削除しました' : '記事の削除に失敗しました';

        return redirect('/admin/list')->with('message', $message);
    }

    /**
     * 記事一覧の表示
     * @param AdminBlogRequest $request リクエスト
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function list(AdminBlogRequest $request)
    {
        $name = $request->user()->name;
        $userId = $request->user()->id;
        $list = Article::getArticleListByUser($userId, self::NUM_PER_PAGE);
        return view('admin_blog.list', compact('list', 'name'));
    }
}
