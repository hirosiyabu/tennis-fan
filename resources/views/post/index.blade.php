@extends('layouts.app')

@section('content')
<div class="card bg-dark text-dark text-center">
  <img class="card-img" src="{{asset('img/tennis3.jpg')}}" width="744" height="450" alt="Card image">
  <div class="card-img-overlay">
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto mb-20">
          <h1 class="mb-5 display-4">Welcome to the Tennis Fan Site!</h1>
        </div>
      </div>
    </div>
  </div>
</div>
  

  <!-- Icons Grid -->
  <section class="features-icons bg-light text-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="icon-screen-desktop m-auto text-primary"></i>
            </div>
            <h3>Fully Responsive</h3>
            <p class="lead mb-0">This theme will look great on any device, no matter the size!</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="icon-layers m-auto text-primary"></i>
            </div>
            <h3>Bootstrap 4 Ready</h3>
            <p class="lead mb-0">Featuring the latest build of the new Bootstrap 4 framework!</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="icon-check m-auto text-primary"></i>
            </div>
            <h3>Easy to Use</h3>
            <p class="lead mb-0">Ready to use with your own content, or customize the source files!</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="container">

<p class="text-center">掲示板</p>
@include('search')
<div class="col-xs-8 col-xs-offset-2">

@foreach($posts as $post)
  <div class="card">
      <div class="card-header">
      <h4 class="font-weight-bold">タイトル：{{ $post->title }}</h4>
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
    {{ $posts->links() }}
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
<form action="/post/create" method="post">
    @csrf
    <div class="form-group">
        <label for="title">タイトル</label>
        <input class="form-control" type="text" id="title" name="title">
    </div>
    <div class="form-group">
        <label for="content">内容</label>
        <textarea class="form-control" id="content" name="content" rows="3"></textarea>
    </div>
    <button class="btn btn-primary btn-block" type="submit">スレッドを立てる</button>
</form>
<section class="bg-light text-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="d-flex">
              <div class="card">
                <a target="_blank"  href="https://www.amazon.co.jp/gp/product/4163902511/ref=as_li_tl?ie=UTF8&camp=247&creative=1211&creativeASIN=4163902511&linkCode=as2&tag=yh72yh72-22&linkId=172221919ebbb3ac6813389e5ac09f83"><img border="0" src="//ws-fe.amazon-adsystem.com/widgets/q?_encoding=UTF8&MarketPlace=JP&ASIN=4163902511&ServiceVersion=20070822&ID=AsinImage&WS=1&Format=_SL250_&tag=yh72yh72-22" ></a><img src="//ir-jp.amazon-adsystem.com/e/ir?t=yh72yh72-22&l=am2&o=9&a=4163902511" width="1" height="1" border="0" alt="" style="border:none !important; margin:0px !important;" />  
                  <div class="card-body">
                      <h4 class="card-title">Card title that wraps to a new line</h4>
                      <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content
                          is a little bit longer.</p>
                  </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="d-flex">
              <div class="card">
                <a target="_blank"  href="https://www.amazon.co.jp/gp/product/4864106975/ref=as_li_tl?ie=UTF8&camp=247&creative=1211&creativeASIN=4864106975&linkCode=as2&tag=yh72yh72-22&linkId=751ca18812480af95158760e211f103b"><img border="0" src="//ws-fe.amazon-adsystem.com/widgets/q?_encoding=UTF8&MarketPlace=JP&ASIN=4864106975&ServiceVersion=20070822&ID=AsinImage&WS=1&Format=_SL250_&tag=yh72yh72-22" ></a><img src="//ir-jp.amazon-adsystem.com/e/ir?t=yh72yh72-22&l=am2&o=9&a=4864106975" width="1" height="1" border="0" alt="" style="border:none !important; margin:0px !important;" />
                  <div class="card-body">
                      <h4 class="card-title">Card title that wraps to a new line</h4>
                      <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content
                          is a little bit longer.</p>
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
                <a target="_blank"  href="https://www.amazon.co.jp/gp/product/4800276284/ref=as_li_tl?ie=UTF8&camp=247&creative=1211&creativeASIN=4800276284&linkCode=as2&tag=yh72yh72-22&linkId=e1d737c326840843ec6a3751d0b28a50"><img border="0" src="//ws-fe.amazon-adsystem.com/widgets/q?_encoding=UTF8&MarketPlace=JP&ASIN=4800276284&ServiceVersion=20070822&ID=AsinImage&WS=1&Format=_SL250_&tag=yh72yh72-22" ></a><img src="//ir-jp.amazon-adsystem.com/e/ir?t=yh72yh72-22&l=am2&o=9&a=4800276284" width="1" height="1" border="0" alt="" style="border:none !important; margin:0px !important;" />
                      <h4 class="card-title">Card title that wraps to a new line</h4>
                      <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content
                          is a little bit longer.</p>
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
                <a target="_blank"  href="https://www.amazon.co.jp/gp/product/4569820786/ref=as_li_tl?ie=UTF8&camp=247&creative=1211&creativeASIN=4569820786&linkCode=as2&tag=yh72yh72-22&linkId=fe7a018a5554c9b78634e53a133e7aa1"><img border="0" src="//ws-fe.amazon-adsystem.com/widgets/q?_encoding=UTF8&MarketPlace=JP&ASIN=4569820786&ServiceVersion=20070822&ID=AsinImage&WS=1&Format=_SL250_&tag=yh72yh72-22" ></a><img src="//ir-jp.amazon-adsystem.com/e/ir?t=yh72yh72-22&l=am2&o=9&a=4569820786" width="1" height="1" border="0" alt="" style="width:170px !important; border:none !important; margin:0px !important;" />
                  <div class="card-body">
                      <h4 class="card-title">Card title that wraps to a new line</h4>
                      <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content
                          is a little bit longer.</p>
                  </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="d-flex">
              <div class="card">
                <a target="_blank"  href="https://www.amazon.co.jp/gp/product/4862560903/ref=as_li_tl?ie=UTF8&camp=247&creative=1211&creativeASIN=4862560903&linkCode=as2&tag=yh72yh72-22&linkId=9c5ea7bd82a55bb1f22a05c92a387893"><img border="0" src="//ws-fe.amazon-adsystem.com/widgets/q?_encoding=UTF8&MarketPlace=JP&ASIN=4862560903&ServiceVersion=20070822&ID=AsinImage&WS=1&Format=_SL250_&tag=yh72yh72-22" ></a><img src="//ir-jp.amazon-adsystem.com/e/ir?t=yh72yh72-22&l=am2&o=9&a=4862560903" width="1" height="1" border="0" alt="" style="border:none !important; margin:0px !important;" />
                  <div class="card-body">
                      <h4 class="card-title">Card title that wraps to a new line</h4>
                      <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content
                          is a little bit longer.</p>
                  </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="d-flex">
              <div class="card">
                <a target="_blank"  href="https://www.amazon.co.jp/gp/product/4163908013/ref=as_li_tl?ie=UTF8&camp=247&creative=1211&creativeASIN=4163908013&linkCode=as2&tag=yh72yh72-22&linkId=cd94aa65c4bca48c45b94febe1929435"><img border="0" src="//ws-fe.amazon-adsystem.com/widgets/q?_encoding=UTF8&MarketPlace=JP&ASIN=4163908013&ServiceVersion=20070822&ID=AsinImage&WS=1&Format=_SL250_&tag=yh72yh72-22" ></a><img src="//ir-jp.amazon-adsystem.com/e/ir?t=yh72yh72-22&l=am2&o=9&a=4163908013" width="1" height="1" border="0" alt="" style="border:none !important; margin:0px !important;" />
                  <div class="card-body">  
                      <h4 class="card-title">Card title that wraps to a new line</h4>
                      <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content
                          is a little bit longer.</p>
                  </div>
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
                  <iframe class="embed-responsive-item" src="https://www.youtube-nocookie.com/embed/QHF7oNuKGTs" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>  
                </div>
            </div>
              <div class="card">
                <div class="card-body">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, voluptate.
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
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, voluptate.
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
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, voluptate.
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
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, voluptate.
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
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, voluptate.
                </div>
              </div>
          </div>        
        </div>
        <div class="col-lg-6">
          <div class="mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="d-flex">
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="https://www.youtube-nocookie.com/embed/50gp8mTIOfY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>  
                </div>
            </div>
              <div class="card">
                <div class="card-body">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, voluptate.
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
</section>



  
  <!-- Footer -->
  <footer class="footer bg-primary">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
          <ul class="list-inline mb-2">
            <li class="list-inline-item">
              <a href="#">About</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Contact</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Terms of Use</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Privacy Policy</a>
            </li>
          </ul>
          <p class="text-muted small mb-4 mb-lg-0">&copy; Your Website 2019. All Rights Reserved.</p>
        </div>
        <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
          <ul class="list-inline mb-0">
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-facebook fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-twitter-square fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-instagram fa-2x fa-fw"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>


@endsection