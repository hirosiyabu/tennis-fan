<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>
    <!-- 一文字アニメーション -->
    <SCRIPT language="JavaScript">
    <!--
    x=0;var text="テニスファンサイトにようこそ!!\nスレッドタイトルを検索したり\n掲示板に書き込んでください\nお勧め本や試合動画も集めてみました\nテニスファンのかた是非情報交換しましょう\n相互リンク大歓迎です！！\n試合現地リポートなどしてくれると嬉しいです！楽しんでいってくださいね＾＾";
    function y() {x=x+1;document.a.b.value = text.substring(0,x)+"_";
    if( x >= text.length ){document.a.b.value = text;}
    if( x < text.length ){setTimeout("y()", 100);}}
    //-->
    </SCRIPT>
    <!-- facebookシェア用コード -->
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v4.0"></script>
    <!-- ボタンスクロール  -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
    <script>
    $(function(){
    $('#itop').on('click', function(){
        var targetTop = $('#top').offset().top;
        $('html,body').animate({
            scrollTop: targetTop
        }, 500);
        return false;
    });
    });
    </script>
    <script>
    $(function(){
    $('#i掲示板').on('click', function(){
        var targetTop = $('#掲示板').offset().top;
        $('html,body').animate({
            scrollTop: targetTop
        }, 500);
        return false;
    });
    });
    </script>
    <script>
    $(function(){
    $('#ibook').on('click', function(){
        var targetTop = $('#book').offset().top;
        $('html,body').animate({
            scrollTop: targetTop
        }, 500);
        return false;
    });
    });
    </script>
    <script>
    $(function(){
    $('#iお勧めテニス動画').on('click', function(){
        var targetTop = $('#お勧めテニス動画').offset().top;
        $('html,body').animate({
            scrollTop: targetTop
        }, 500);
        return false;
    });
    });
    </script>
    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('js/animocons.min.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/simple-line-icons.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/landing-page.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animocons.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" />
</head>
<body onLoad="y()">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/post') }}">
                    {{ config('app.name') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Sign Up') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
