@extends('default.default')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="left-panel">
                <div class="col-md-4">最新文章:</div>
                <div class="offset-1">
                    <li>文章列表1</li>
                    <li>文章列表1</li>
                    <li>文章列表1</li>
                    <li>文章列表1</li>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="right-panel">
                <div class="col-md-12">
                    <input type="text" style="width: 80%" placeholder="Search for...">
                    <button style="width: 18%">Search</button>
                </div>
                <div class="col-md-12" style="margin-top: 20px;">
                    <span>文章分类</span>
                    <li>分类1</li>
                    <li>分类1</li>
                    <li>分类1</li>
                    <li>分类1</li>
                </div>
            </div>
        </div>
    </div>
@stop
