@extends('default.default')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="left-panel">
                <div class="col-md-4 panel-title">最近：</div>
                    <ul class="article_list">
                        @foreach($data['article_list'] as $article)
                        <li>{{$article['updated_at']}}&emsp;<a href="/article/{{$article['id']}}">{{$article['title']}}</a></li>
                        @endforeach
                    </ul>
            </div>
        </div>
        <div class="col-md-4">
            <div class="right-panel">
                <div class="col-md-12">
                    <input class="search-input" type="text" placeholder="Search for...">
                    <button class="search-button">Search</button>
                </div>
                <div class="col-md-12 right-panel-box">
                    <div class="panel-title">分类：</div>
                    <ul class="cat_list">
                        @foreach($data['cat_list'] as $cat)
                            <li><a href="#">{{$cat}}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-12 right-panel-box">
                    <div class="panel-title">归档：</div>
                    <ul class="cat_list">
                        <li><a href="#">2020-08</a></li>
                        <li><a href="#">2020-08</a></li>
                        <li><a href="#">2020-08</a></li>
                        <li><a href="#">2020-08</a></li>
                        <li><a href="#">2020-08</a></li>
                        <li><a href="#">2020-08</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@stop
