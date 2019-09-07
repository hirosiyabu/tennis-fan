@extends('layouts.app')

@section('content')
<div id="top" class="card bg-dark text-dark text-center">
  <img class="card-img btn" src="{{asset('img/tennis3.jpg')}}" onclick="smash();" width="744" height="450" alt="テニスファンサイト">
    <div class="card-img-overlay">
      <div class="container">
        <div class="row">
          <div class="col-xl-9 mx-auto mb-20">
            <h1 class="mb-5 display-4 text-light font-weight-bold">Welcome to the Tennis Fan Site!</h1>
          </div>
        </div>
      </div>
    </div>
</div>
  

  <!-- Icons Grid -->
  
<section class="mb-5 bg-light text-center">
  <div class="container">
    <div class="row">
      <div class="my-5 col-lg-4">
        <div class="mt-5 mx-auto mb-5 mb-lg-0 mb-lg-3">
          <div class="circle-button">
            <button class="icobutton icobutton-4-2196f3-blue">
              <span class="fa fa-comments fa-5x"></span>
            </button>
          </div>
        </div>
          <div class="card-bottom text-center">
            <a  id="i掲示板" href="#掲示板">
              <h2 class="card-title">掲示板</h2>
            </a>
              <p class="mb-5 card-desc">テニスについての掲示板です。<br/>大会情報や選手情 ets.. テニスのことに関することならなんでも書き込みOKです！現地リポートや実況掲示板としても使えます！</p>
          </div>
      </div>
      <div class="my-5 col-lg-4">
        <div class="mt-5 mx-auto mb-5 mb-lg-0 mb-lg-3">
          <div class="circle-button">
            <button id="btn2" class="icobutton icobutton-4-2196f3-blue">
              <span class="fa fa-book fa-5x"></span>
            </button>
          </div>
        </div>
        <div class="card-bottom text-center">
          <a id="ibook" href="#book">
            <h2 class="card-title">お勧め本</h2>
          </a>
            <p class="mb-5 card-desc">お勧めの本です<br/>お気に入りの選手の本を探すのも楽しいですよ！コーチの本もお勧めです！</p>
        </div>
      </div>
      <div class="my-5 col-lg-4">
        <div class="mt-5 mx-auto mb-5 mb-lg-0 mb-lg-3">
          <div class="circle-button">
            <button id="btn3" class="icobutton icobutton-4-2196f3-blue">
              <span class="fa fa-youtube fa-5x"></span>
            </button>
          </div>
        </div>
        <div class="card-bottom text-center">
          <a id="iお勧めテニス動画" href="#お勧めテニス動画">
            <h2 class="card-title">Youtubeリンク</h2>
          </a>
            <p class="mb-5 card-desc">動画を集めてみました。<br/>錦織選手、大阪選手はじめ、過去の動画も集めてみました、一度ご覧になってください(^ ^)</p>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="mb-5 bg-light text-center">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="fb-page" data-href="https://www.facebook.com/tennis365/" data-tabs="timeline" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/tennis365/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/tennis365/">テニス365 / tennis365.net</a></blockquote></div>
      </div>
      <div class="col-lg-4">
        <a class="twitter-timeline" data-lang="ja" data-width="340" data-height="500" href="https://twitter.com/keinishikori?ref_src=twsrc%5Etfw">Tweets by keinishikori</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
      </div>
      <div class="col-lg-4">
        <a class="twitter-timeline" data-lang="ja" data-width="340" data-height="500" href="https://twitter.com/Naomi_Osaka_?ref_src=twsrc%5Etfw">Tweets by Naomi_Osaka_</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
      </div>
    </div>
  </div>
</section>
<div id="掲示板" class="container">
<h1 class="text-center">掲示板</h1>
@include('search')
<div class="col-xs-8 col-xs-offset-2">

@foreach($posts as $post)
  <div class="card">
      <div class="card-header">
      <h4 class="font-weight-bold">タイトル：{{ $post->title }}</h4>
      <p><img src="img/backimg.jpg" alt="テニス掲示板"  width="100%" height="45"></p>
      </div>
      <div class="card-title">
          <p class="card-text">{{ $post->content }}</p>
          <p class="card-text">コメント数：{{ $post->comments()->count()}}</p><small>投稿日：{{ date("Y年 m月 d日 H:i",strtotime($post->created_at)) }}</small> <small>最新コメント投稿日時：{{ date("Y年 m月 d日 H:i",strtotime($post->created_at)) }}</small>
          <a class="btn btn-primary" href="/post/{{$post->id}}">続きを読む</a>
      </div>
  </div>
@endforeach
<div class="text-center">
  <div class="pagenation">
    <style>
      .pagination { justify-content: center; }
    </style>
    {{ $posts->appends(Request::only('keyword'))->links() }}
  </div>
</div>

@if(Session::has('message'))
	<div class="bg-primary">
		<p>{{ Session::get('message') }}</p>
	</div>
@endif

{{-- エラーメッセージの表示 --}}
@foreach($errors->all() as $message)
	<p class="bg-danger">{{ $message }}</p>
@endforeach
<form action="/post/create" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="title">＜新規投稿＞　タイトル</label>
        <input class="form-control" type="text" id="title" name="title">
    </div>
    <div class="form-group">
        <label for="content">＜新規投稿＞　内容</label>
        <textarea class="form-control" id="content" name="content" rows="3"></textarea>
    <!-- アップロードした画像。なければ表示しない -->
    @isset ($filename)
    <div>
        <img src="{{ asset('storage/' . $filename) }}">
    </div>
    @endisset

    <label for="photo">画像ファイル(無くてもOK！):</label>
    <input type="file" class="form-control" name="image">
    </div>
    <button class="btn btn-primary btn-block" type="submit">スレッドを立てる</button>
</form>
<h1 id="book" class="text-center">お勧め本</h1>
<section class="bg-light text-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="d-flex">
              <div class="card">
                <a target="_blank"  href="https://www.amazon.co.jp/gp/product/4163902511/ref=as_li_tl?ie=UTF8&camp=247&creative=1211&creativeASIN=4163902511&linkCode=as2&tag=yh72yh72-22&linkId=172221919ebbb3ac6813389e5ac09f83"><img border="0" src="//ws-fe.amazon-adsystem.com/widgets/q?_encoding=UTF8&MarketPlace=JP&ASIN=4163902511&ServiceVersion=20070822&ID=AsinImage&WS=1&Format=_SL250_&tag=yh72yh72-22" ></a><img src="//ir-jp.amazon-adsystem.com/e/ir?t=yh72yh72-22&l=am2&o=9&a=4163902511" width="1" height="1" border="0" alt="錦織圭" style="border:none !important; margin:0px !important;" />  
                  <div class="card-body">
                      <h4 class="card-title">頂点への道</h4>
                      <p class="card-text">2014年大活躍した年の本です。怪我をして長期離脱してたり、活躍の前にはかなり我慢の時期がありましたね。</p>
                  </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="d-flex">
              <div class="card">
                <a target="_blank"  href="https://www.amazon.co.jp/gp/product/4864106975/ref=as_li_tl?ie=UTF8&camp=247&creative=1211&creativeASIN=4864106975&linkCode=as2&tag=yh72yh72-22&linkId=751ca18812480af95158760e211f103b"><img border="0" src="//ws-fe.amazon-adsystem.com/widgets/q?_encoding=UTF8&MarketPlace=JP&ASIN=4864106975&ServiceVersion=20070822&ID=AsinImage&WS=1&Format=_SL250_&tag=yh72yh72-22" ></a><img src="//ir-jp.amazon-adsystem.com/e/ir?t=yh72yh72-22&l=am2&o=9&a=4864106975" width="1" height="1" border="0" alt="大坂なおみ" style="border:none !important; margin:0px !important;" />
                  <div class="card-body">
                      <h4 class="card-title">心を強くする</h4>
                      <p class="card-text">大坂なおみ選手の前コーチ、バインさんが書いた本です。大坂さんへのコーチングが一時話題になりましたね。</p>
                  </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="d-flex">
              <div class="card">
                <div class="card-body">
                <a target="_blank"  href="https://www.amazon.co.jp/gp/product/4800276284/ref=as_li_tl?ie=UTF8&camp=247&creative=1211&creativeASIN=4800276284&linkCode=as2&tag=yh72yh72-22&linkId=e1d737c326840843ec6a3751d0b28a50"><img border="0" src="//ws-fe.amazon-adsystem.com/widgets/q?_encoding=UTF8&MarketPlace=JP&ASIN=4800276284&ServiceVersion=20070822&ID=AsinImage&WS=1&Format=_SL250_&tag=yh72yh72-22" ></a><img src="//ir-jp.amazon-adsystem.com/e/ir?t=yh72yh72-22&l=am2&o=9&a=4800276284" width="1" height="1" border="0" alt="マイケルチャン" style="border:none !important; margin:0px !important;" />
                      <h4 class="card-title">超一流のメンタル</h4>
                      <p class="card-text">マイケル・チャンさんのテニスレッスン本DVD付きです。基本を大事にするチャンコーチの指導を疑似体験できるかも。</p>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
<section class="bg-light text-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="d-flex">
              <div class="card">
                <a target="_blank"  href="https://www.amazon.co.jp/gp/product/4569820786/ref=as_li_tl?ie=UTF8&camp=247&creative=1211&creativeASIN=4569820786&linkCode=as2&tag=yh72yh72-22&linkId=fe7a018a5554c9b78634e53a133e7aa1"><img border="0" src="//ws-fe.amazon-adsystem.com/widgets/q?_encoding=UTF8&MarketPlace=JP&ASIN=4569820786&ServiceVersion=20070822&ID=AsinImage&WS=1&Format=_SL250_&tag=yh72yh72-22" ></a><img src="//ir-jp.amazon-adsystem.com/e/ir?t=yh72yh72-22&l=am2&o=9&a=4569820786" width="1" height="1" border="0" alt="松岡修造" style="width:170px !important; border:none !important; margin:0px !important;" />
                  <div class="card-body">
                      <h4 class="card-title">まいにち、修造! </h4>
                      <p class="card-text">元気が出ない? 本気になれない? それなら僕にあなたの毎日を応援させてください!と修造さんがおっしゃっています！</p>
                  </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="d-flex">
              <div class="card">
                <a target="_blank"  href="https://www.amazon.co.jp/gp/product/4862560903/ref=as_li_tl?ie=UTF8&camp=247&creative=1211&creativeASIN=4862560903&linkCode=as2&tag=yh72yh72-22&linkId=9c5ea7bd82a55bb1f22a05c92a387893"><img border="0" src="//ws-fe.amazon-adsystem.com/widgets/q?_encoding=UTF8&MarketPlace=JP&ASIN=4862560903&ServiceVersion=20070822&ID=AsinImage&WS=1&Format=_SL250_&tag=yh72yh72-22" ></a><img src="//ir-jp.amazon-adsystem.com/e/ir?t=yh72yh72-22&l=am2&o=9&a=4862560903" width="1" height="1" border="0" alt="杉山愛" style="border:none !important; margin:0px !important;" />
                  <div class="card-body">
                      <h4 class="card-title">勝負をこえた生き方</h4>
                      <p class="card-text">杉山さんのコラムをまとめた本です。引退後もメディアで大活躍ですね！笑顔が素敵でご家族も仲良くて素敵です。</p>
                  </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="d-flex">
              <div class="card">
                <a target="_blank"  href="https://www.amazon.co.jp/gp/product/4163908013/ref=as_li_tl?ie=UTF8&camp=247&creative=1211&creativeASIN=4163908013&linkCode=as2&tag=yh72yh72-22&linkId=cd94aa65c4bca48c45b94febe1929435"><img border="0" src="//ws-fe.amazon-adsystem.com/widgets/q?_encoding=UTF8&MarketPlace=JP&ASIN=4163908013&ServiceVersion=20070822&ID=AsinImage&WS=1&Format=_SL250_&tag=yh72yh72-22" ></a><img src="//ir-jp.amazon-adsystem.com/e/ir?t=yh72yh72-22&l=am2&o=9&a=4163908013" width="1" height="1" border="0" alt="伊達公子" style="border:none !important; margin:0px !important;" />
                  <div class="card-body">  
                      <h4 class="card-title">伊達公子の日</h4>
                      <p class="card-text">伊達さんのセカンドキャリアを綴った本です。伊達さんの高いプロ意識や、やりきる姿勢をお手本にしたいです。</p>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
<h1 id="お勧めテニス動画">お勧めテニス動画</h1>
<section class="bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="d-flex">
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="https://www.youtube-nocookie.com/embed/QHF7oNuKGTs" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>  
                </div>
            </div>
              <div class="card">
                <div class="card-body">
                エース錦織選手のBESTショット集です！錦織選手の凄いショットが見れます。エアケイやフットワークを活かしたコートカバーリングが見ものです！
                </div>
              </div>
          </div>        
        </div>
        <div class="col-lg-6">
          <div class="mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="d-flex">
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="https://www.youtube-nocookie.com/embed/e9gD-Woxe44" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>   
                </div>
            </div>
              <div class="card">
                <div class="card-body">
                大坂選手の全米オープン初優勝の時の動画です。決勝ではセレナ選手の行動が物議を呼びましたが、大坂選手の誠実な対応が印象的でした。
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
</section>
<section class="bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="d-flex">
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="https://www.youtube-nocookie.com/embed/T61Xg5CEZgo" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
              <div class="card">
                <div class="card-body">
                修造さん１９９５年ウィンブルドンベスト８をかけた試合です。『この一球は絶対に無二の一球なり！！』と気合いを入れます。熱い！！熱すぎます！必見です。
                </div>
              </div>
          </div>        
        </div>
        <div class="col-lg-6">
          <div class="mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="d-flex">
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="https://www.youtube-nocookie.com/embed/ASwg7w6BTDE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>   
                </div>
            </div>
              <div class="card">
                <div class="card-body">
                伊達さん自身が仰るベストマッチ。２００キロを超えるビーナス・ウィリアムスのサービスをバシバシ返す伊達さんのライジングショット本当に凄かったです。
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
</section>
<section class="bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="d-flex">
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="https://www.youtube-nocookie.com/embed/-vnpS4wHuDU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
              <div class="card">
                <div class="card-body">
                杉山愛さんはダブルスの活躍が際立っているのでそちらに注目が行きがちですが、シングルスでも凄かったです。レジェンドのヒンギスにウィンブルドンで勝った試合です。ナイスフットワーク！！
                </div>
              </div>
          </div>        
        </div>
        <div class="col-lg-6 mb-5">
          <div class="mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="d-flex">
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="https://www.youtube-nocookie.com/embed/50gp8mTIOfY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>  
                </div>
            </div>
              <div class="card mb-5">
                <div class="card-body">
                テニス選手史上最強の選手と言われるフェデラー選手の動画、こんなショットが打てるのかと驚かされます。テニスを普段あまり見ない方にもお勧めできる動画です！
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
</section>

@endsection