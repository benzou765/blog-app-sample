<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminBlogController extends Controller
{
    /**
     * 入力フォーム
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function form()
    {
        \Log::debug('fuga');
        return view('admin_blog.form');
    }
}
