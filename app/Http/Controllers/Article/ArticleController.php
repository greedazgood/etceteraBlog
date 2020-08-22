<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Markdown\Markdown;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ArticleController extends Controller
{
    protected $markdown;

    protected $time_list;

    protected $cat_list;

    public function __construct(Markdown $markdown)
    {
        $this->markdown = $markdown;

        $this->time_list = Article::getTimeList();

        $this->cat_list = Category::query()->orderBy('priority')->pluck('name');
    }

    public function index()
    {
        $data['time_list'] = $this->time_list;
        $data['cat_list'] = $this->cat_list;
        $data['article_list'] = Article::query()->Published()->limit(20)->get();
        $data['cat_name'] = '最近';

        return view('index',['data'=>$data]);
    }

    public function articleDetail(Article $article)
    {
        $content = $this->markdown->markdown($article->content);
        $article->content = $content;
        return view('detail',['article'=>$article]);
    }

    public function catList($catname)
    {
        $cat = Category::query()->where('name',$catname)->value('id');
        if (!$cat){
            abort(404);
        }

        $data['time_list'] = $this->time_list;
        $data['cat_list'] = $this->cat_list;
        $data['article_list'] = Article::query()->Published()->where('category_id',$cat)->limit(20)->get();
        $data['cat_name'] = $catname;
        return view('index',['data'=>$data]);
    }

    public function archiveList($time)
    {
        $unix_time = strtotime($time);
        if (!$unix_time || !in_array($time,$this->time_list)){
            abort(404);
        }
        $month_start = Carbon::parse($time)->startOfMonth();
        $month_end = Carbon::parse($time)->endOfMonth()->toDateString();

        $data['time_list'] = $this->time_list;
        $data['cat_list'] = $this->cat_list;
        $data['article_list'] = Article::query()->Published()->whereBetween('updated_at',[$month_start,$month_end])->get();
        $data['cat_name'] = $time;

        return view('index',['data'=>$data]);
    }
}
