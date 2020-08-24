<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Parsedown;

class ArticleController extends Controller
{
    protected $time_list;

    protected $cat_list;

    public function __construct()
    {
        $this->time_list = Article::getTimeList();

        $this->cat_list = Category::query()->orderBy('priority')->orderByDesc('priority')->pluck('name');
    }

    public function index()
    {
        $data['time_list'] = $this->time_list;
        $data['cat_list'] = $this->cat_list;
        $data['article_list'] = Article::query()->Published()->orderByDesc('updated_at')->limit(20)->get();
        $data['cat_name'] = '最近';

        return view('index',['data'=>$data]);
    }

    public function articleDetail(Article $article)
    {
        $parse = new Parsedown();
        $content = $parse->setMarkupEscaped(true)->text($article->content);
        $article->content = $content;

        $data['prev'] = Article::query()->where('id','<',$article->id)->select('id','title')->first();
        $data['next'] = Article::query()->where('id','>',$article->id)->select('id','title')->first();
        $data['category'] = $article->category->name;
        $data['article_time'] = Carbon::parse($article->updated_at)->format('Y-m-d');

        return view('detail',['article'=>$article,'data'=>$data]);
    }

    public function catList($catname)
    {
        $cat = Category::query()->where('name',$catname)->value('id');
        if (!$cat){
            abort(404);
        }
        $data['time_list'] = $this->time_list;
        $data['cat_list'] = $this->cat_list;
        $data['article_list'] = Article::query()->Published()->orderByDesc('updated_at')->where('category_id',$cat)->limit(20)->get();
        $data['cat_name'] = $catname;
        return view('index',['data'=>$data]);
    }

    public function archiveList($time)
    {
        $unix_time = strtotime($time);
        if (!$unix_time || !in_array($time,$this->time_list->toArray())){
            abort(404);
        }
        $month_start = Carbon::parse($time)->startOfMonth();
        $month_end = Carbon::parse($time)->endOfMonth()->toDateString();

        $data['time_list'] = $this->time_list;
        $data['cat_list'] = $this->cat_list;
        $data['article_list'] = Article::query()->Published()->orderByDesc('updated_at')->whereBetween('updated_at',[$month_start,$month_end])->get();
        $data['cat_name'] = $time;

        return view('index',['data'=>$data]);
    }

    public function search(Request $request)
    {
        $request->validate([
            'keyword' => 'required'
        ]);
        $data['time_list'] = $this->time_list;
        $data['cat_list'] = $this->cat_list;
        $data['article_list'] = Article::query()->Published()->where('title','like',"%{$request->keyword}%")->limit(20)->get();
        $data['cat_name'] = "\"".$request->keyword."\""." 搜索结果";
        return view('index',['data'=>$data]);
    }
}
