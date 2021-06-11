@extends('default.default')
<link rel="stylesheet" href="/css/prism.css">
<script src="/js/prism.js"></script>
@section('content')
        <div class="article_title" style="text-align: center">{{$article['title']}}</div>
        <div class="article_sub"> {{$data['article_time']}} &emsp;&emsp;分类：<a href="/category/{{$data['category']}}">{{$data['category']}}</a></div>
        <div class="article_content">
            {!! $article['content'] !!}
        </div>
        <div class="row pagination" >
            <div class="col-md-4">上一篇<br/><a href="/article/{{$data['prev']?$data['prev']['id']:''}}">{{$data['prev']?$data['prev']['title']:''}}</a></div>
            <div class="offset-4 col-md-4" style="text-align: right">下一篇<br/><a href="/article/{{$data['next']?$data['next']['id']:''}}">{{$data['next']?$data['next']['title']:""}}</a></div>
        </div>

        <div id="category"></div>
        <script src="https://libs.cdnjs.net/jquery/1.10.0/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $("h2,h3,h4,h5,h6").each(function(i,item){
                    var tag = $(item).get(0).localName;
                    $(item).attr("id","wow"+i);
                    $("#category").append('<a class="new'+tag+'" href="#wow'+i+'">'+$(this).text()+'</a></br>');
                    $(".newh2").css("margin-left",0);
                    $(".newh3").css("margin-left",20);
                    $(".newh4").css("margin-left",40);
                    $(".newh5").css("margin-left",60);
                    $(".newh6").css("margin-left",80);
                });
            });
        </script>
@stop

