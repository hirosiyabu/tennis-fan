@extends('layouts.app')

@section('content')

<div class="container">
  <div class="card">
    <div class="card-header">
      <p class="font-weight-bold">タイトル：{{ $post->title }}</p>
    </div>
    <div class="card-title mb-5">
    @if (!empty($post->image))                          
    <div>     
      <img src="data:image/png;base64,<?= $post->image ?>" class="h-auto d-block mx-auto" style="width:330px;"> 
    </div>
    @endif
      <p class="card-text mb-5">{{ $post->content }}</p>
      
      <small>投稿日：{{ date("Y年 m月 d日　H:i",strtotime($post->created_at)) }}</small>
    </div>
  </div>
  <p>スレッドを立てた方だけが記事を編集できます<p>
@auth
  @if($post->user_id === $login_user_id)
    <div>
    <a href="/post/edit/{{$post->id}}" class="btn btn-outline-primary">編集</a>
    </div>
  @endif
@endauth
@auth
  @if($post->user_id === $login_user_id)
  <div>
    <form action="/post/delete" method="post">
      @csrf
      <input type="hidden" name="id" value="{{$post->id}}">
      <button type="submit" class="btn btn-danger">削除</button>
    </form>
  </div>
  @endif
@endauth
@if(Session::has('message'))
	<div class="bg-primary">
		<p>{{ Session::get('message') }}</p>
	</div>
@endif

{{-- エラーメッセージの表示 --}}
@foreach($errors->all() as $message)
	<p class="bg-danger">{{ $message }}</p>
@endforeach
  <div class="mb-5">
  <h3>コメント一覧</h3><p>コメント数：({{ $post->comments()->count()}})</p>
@include('comment')
@foreach($post->comments as $one_comment)
  <div class="card">
    <div class="card-header">
      <p class="font-weight-bold">コメンター：　{{ $one_comment->commenter }}</p>
      <small>投稿日：{{ date("Y年 m月 d日　H:i",strtotime($one_comment->created_at)) }}</small>
    </div>
    <div class="card-title">
      <p class="card-text">{{ $one_comment->comment }}</p>
    </div>
  </div>
@endforeach   
  </div>
</div>
@endsection