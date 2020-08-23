@extends('default.default')

@section('content')
        <div class="article_title" style="text-align: center">{{$article['title']}}</div>
        <div class="article_sub"> {{$article['updated_at']}} <span>dev</span> <span>search</span></div>
        <div class="article_content">
            {!! $article['content'] !!}
        </div>
        <div class="row pagination" >
            <div class="col-md-4">上一篇<br/><a href="/article/{{$data['prev']['id']}}">{{$data['prev']['title']??''}}</a></div>
            <div class="offset-4 col-md-4" style="text-align: right">下一篇<br/><a href="/article/{{$data['next']['id']}}">{{$data['next']['title']??""}}</a></div>
        </div>
@stop
