<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $data['cat_list'] = Category::query()->orderBy('priority')->pluck('name');
        $data['article_list'] = Article::query()->Published()->limit(20)->get();
        return view('index',['data'=>$data]);
    }

    public function articleDetail(Article $article)
    {
        return view('detail',['article'=>$article]);
    }
}
