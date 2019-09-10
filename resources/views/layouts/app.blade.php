<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>テニスファンサイト</title>
    <!-- 一文字アニメーション -->
    <SCRIPT language="JavaScript">
    <!--
    x=0;var text="テニスファンサイトにようこそ!!\nスレッドタイトルを検索したり\n掲示板に書き込んでください\nお勧め本や試合動画も集めてみました\nテニスファンのかた是非情報交換しましょう\n相互リンク大歓迎です！！\n試合現地リポートなどしてくれると嬉しいです！楽しんでいってくださいね＾＾";
    function y() {x=x+1;document.a.b.value = text.substring(0,x)+"_";
    if( x >= text.length ){document.a.b.value = text;}
    if( x < text.length ){setTimeout("y()", 100);}}
    //-->
    </SCRIPT>
    <!-- ローディングアニメーション -->
    <script src="{{ asset('/js/loading.js') }}"></script>
    <link href="{{ asset('/css/loading.css') }}" rel="stylesheet" />
    <!-- 効果音 -->
    <audio id="TennisSound" preload="auto">
        <source src="{{ asset('/tennissound.mp3') }}" type="audio/mp3">
        <p>※お使いのブラウザでは音は鳴りません。</p>
    </audio>
    <audio id="CatSound" preload="auto">
        <source src="{{ asset('/catvoice.mp3') }}" type="audio/mp3">
        <p>※お使いのブラウザでは音は鳴りません。</p>
    </audio>
    
    <script type="text/javascript">
        function smash() {
        document.getElementById("TennisSound").play();
        }
    </script>
    <script type="text/javascript">
        function sound() {
        document.getElementById("CatSound").play();
        }
    </script>
    <!-- facebookシェア用コード -->
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v4.0"></script>
    <!-- ボタンスクロール  -->
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
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

    <!-- Custom styles for this template and icon -->
    <link href="{{ asset('css/landing-page.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animocons.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" />
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link href="{{ asset('/css/bootstrap-social.css') }}" rel="stylesheet">
</head>
<body onLoad="y()">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm px-0">
            <div class="container pr-0">
                <a class="navbar-brand mr-4" href="{{ url('/post') }}">
                    <img src="{{asset('/img/title.logo.png')}}"  width="200" height="50" alt="テニスファンサイト">
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
                            <!-- <li class="nav-item"> -->
                                <!-- <a class="nav-link" href="{{ route('login') }}">{{ __('ログイン') }}</a> -->
                            </li>
                            @if (Route::has('register'))
                                <!-- <li class="nav-item"> -->
                                    <!-- <a class="nav-link" href="{{ route('register') }}">{{ __('新規登録') }}</a> -->
                                </li>
                            @endif
                            <li class="nav-item">    
                                <a class="btn btn-facebook mb-1 mx-1" href="/auth/login/facebook"><span class="fab fa-facebook"></span>facebookでログイン</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-twitter mb-1 mx-1 pr-2" href="/auth/login/twitter"><span class="fab fa-twitter"></span>twitterでログイン</a>
                            </li>
                        @else
                            <li class="nav-item">
                                    <p class="text-right">{{ Auth::user()->name }}</p>  
                                    <p class="text-right">
                                        <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('ログアウト') }}
                                        </a>
                                    </p>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <!-- loading -->
        

        <!-- Footer -->
        <nav class="navbar fixed-bottom navbar-expand-sm navbar-dark bg-info mt-3">
            <div class="container">
                    <a id="itop" href="#top" class="navbar-brand">topへ</a>
                    <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <p class="navbar-nav">© Mytennis-fansite 2019. All Rights Reserved.</p>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <!-- <a class="nav-link" href="#">Privacy Policy</a> -->
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="https://twitter.com/hirosiweb1">Cotact</a>
                            </li>
                            <li class="nav-item">
                            <div class="fb-share-button" data-href="https://tennis-fan.herokuapp.com/post" data-layout="button" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Ftennis-fan.herokuapp.com%2Fpost&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">シェア</a></div>
                            </li>  
                            <li class="nav-item">
                            <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-size="large" data-url="https://tennis-fan.herokuapp.com/post" data-via="tennis-fan" data-hashtags="tennis好きにお勧め！" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                            </li>
                            
                            
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
