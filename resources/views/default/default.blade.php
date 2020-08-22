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
</div>
<script src="/js/prism.js"></script>
</body>
</html>
