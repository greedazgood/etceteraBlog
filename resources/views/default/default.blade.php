<html>
<head>
    <title>@yield('title', '首页') - etcetera blog</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="/">Etcetera Blog</a>
    </nav>
    @yield('content')
</div>
</body>
</html>
