<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function articleList(Request $request)
    {
        return view('list');
    }

    public function articleDetail()
    {
        return view('detail');
    }
}
