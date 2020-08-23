<html>
<head>
    <title>@yield('title', '首页') - etcetera blog</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/prism.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
</head>
<body>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="/">Etcetera Blog</a>
    </nav>
    @yield('content')
    <div id="category" style="position: absolute;right: 10px;top:20%;width: 200px;z-index: 999"></div>
</div>
<script src="/js/prism.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
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
</body>
</html>
