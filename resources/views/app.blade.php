<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Laravel Forum</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="//cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <nav class="navbar navbar-default navbar-static-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="/">Laravel Forum</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="/">Home</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if(Auth::check())

                        <li>
                            <a id="dLabel" href="#" class="dropdown-toggle" type="button" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                            <ul class="dropdown-menu" aria-labelledby="dLabel">
                                <li><a href="/user/avatar"> <i class="fa fa-user"></i> 更换头像</a></li>
                                <li><a href="#"> <i class="fa fa-cog"></i> 更换密码</a></li>
                                <li><a href="#"> <i class="fa fa-heart"></i> 特别感谢</a></li>
                                <li role="separator" class="divider"></li>
                                <li> <a href="/logout">  <i class="fa fa-sign-out"></i> 退出登录</a></li>
                            </ul>
                        </li>
                        <li><img src="{{ Auth::user()->avatar }}" alt="avatar" width="50" class="img-circle"></li>
                    @else
                        <li><a href="/user/register">Register</a></li>
                        <li class="active"><a href="/user/login">Login</a></li>
                    @endif
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
    @yield('content')
</body>
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
</html>