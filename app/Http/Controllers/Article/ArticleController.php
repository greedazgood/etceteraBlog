<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Markdown\Markdown;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    protected $markdown;

    public function __construct(Markdown $markdown)
    {
        $this->markdown = $markdown;
    }

    public function index(Request $request)
    {
        $data['cat_list'] = Category::query()->orderBy('priority')->pluck('name');
        $data['article_list'] = Article::query()->Published()->limit(20)->get();
        return view('index',['data'=>$data]);
    }

    public function articleDetail(Article $article)
    {
        $content = $this->markdown->markdown($article->content);
        $article->content = $content;
        return view('detail',['article'=>$article]);
    }
}
