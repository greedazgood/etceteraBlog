@extends('default.default')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="left-panel">
                <div class="col-md-4 panel-title">最近：</div>
                    <ul class="article_list">
                        <li>2020-12-12&emsp;<a href="#">文章标题内容1</a></li>
                        <li>2020-12-12&emsp;<a href="#">文章标题内容2</a></li>
                        <li>2020-12-12&emsp;<a href="#">文章标题内容3</a></li>
                        <li>2020-12-12&emsp;<a href="#">文章标题内容4</a></li>
                        <li>2020-12-12&emsp;<a href="#">文章标题内容1</a></li>
                        <li>2020-12-12&emsp;<a href="#">文章标题内容2</a></li>
                        <li>2020-12-12&emsp;<a href="#">文章标题内容3</a></li>
                        <li>2020-12-12&emsp;<a href="#">文章标题内容4</a></li>
                        <li>2020-12-12&emsp;<a href="#">文章标题内容1</a></li>
                        <li>2020-12-12&emsp;<a href="#">文章标题内容2</a></li>
                        <li>2020-12-12&emsp;<a href="#">文章标题内容3</a></li>
                        <li>2020-12-12&emsp;<a href="#">文章标题内容4</a></li>
                    </ul>
            </div>
        </div>
        <div class="col-md-4">
            <div class="right-panel">
                <div class="col-md-12">
                    <input type="text" style="width: 80%" placeholder="Search for...">
                    <button style="width: 18%">Search</button>
                </div>
                <div class="col-md-12" style="margin-top: 20px;">
                    <div class="panel-title">分类：</div>
                    <ul class="cat_list">
                        <li><a href="#">Linux</a></li>
                        <li><a href="#">Docker</a></li>
                        <li><a href="#">PHP</a></li>
                        <li><a href="#">Golang</a></li>
                        <li><a href="#">Linux</a></li>
                        <li><a href="#">Docker</a></li>
                        <li><a href="#">PHP</a></li>
                        <li><a href="#">Golang</a></li>
                        <li><a href="#">Linux</a></li>
                        <li><a href="#">Docker</a></li>
                        <li><a href="#">PHP</a></li>
                        <li><a href="#">Golang</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@stop
