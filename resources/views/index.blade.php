@extends('default.default')

@section('content')
    <div class="row">
        <div class="col-md-8 col-sm-8 col-xs-8">
            <div class="left-panel">
                <div class="col-md-4 panel-title">{{$data['cat_name']}}：</div>
                    <ul class="article_list">
                        @foreach($data['article_list'] as $article)
                        <li>{{$article['updated_at']?$article['updated_at']->format('Y-m-d'):''}}&emsp;<a href="/article/{{$article['id']}}">{{$article['title']}}</a></li>
                        @endforeach
                    </ul>
                <div>{{ $data['article_list']->links() }}</div>
            </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-8">
            <div class="right-panel">
                <div class="col-md-12">
                    <form action="/search">
                        <input class="search-input" type="text" name="keyword" placeholder="Search for...">
                        <button class="search-button">Search</button>
                    </form>
                </div>
                <div class="col-md-12 right-panel-box">
                    <div class="panel-title">分类：</div>
                    <ul class="cat_list">
                        @foreach($data['cat_list'] as $cat)
                            <li><a href="/cat/{{$cat}}">{{$cat}}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-12 col-sm-12 right-panel-box">
                    <div class="panel-title">归档：</div>
                    <ul class="cat_list">
                        @foreach($data['time_list'] as $time)
                        <li><a href="/archive/{{$time}}">{{$time}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@stop
