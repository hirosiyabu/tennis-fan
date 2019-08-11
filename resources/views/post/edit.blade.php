@extends('layouts.app')

@section('content')
<div class="container">
<form action="/post/update" method="post">
    @csrf
    <div class="form-group">
        <label for="title">タイトル</label>
        <input value="{{$post->title}}" class="form-control" type="text" id="title" name="title">
    </div>
    <div class="form-group">
        <label for="content">内容</label>
        <textarea class="form-control" id="content" name="content" rows="3">{{$post->content}}</textarea>
    </div>
    <input type="hidden" name="id" value="{{$post->id}}">
    <button class="btn btn-primary btn-block" type="submit">編集</button>
</form>
</div>
@endsection 