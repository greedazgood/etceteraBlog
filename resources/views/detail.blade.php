@extends('default.default')

@section('content')
        <div class="article_title" style="text-align: center">{{$article['title']}}</div>
        <div class="article_sub"> {{$article['updated_at']}} <span>dev</span> <span>search</span></div>
        <div class="article_content">
            {!! $article['content'] !!}
        </div>
        <div class="row" style="margin-top: 30px;">
            <div class="col-md-4">上一篇</div>
            <div class="offset-4 col-md-4" style="text-align: right">下一篇</div>
        </div>
@stop
