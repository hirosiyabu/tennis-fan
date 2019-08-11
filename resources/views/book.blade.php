@extends('layouts.app')
@section('content')
<div class="container">
        <p class="h1">お勧め本</p>
        @foreach($books as $book)
          <p class="font-weight-bold">題名{{$book->booktitle}}</p>
          <a href="{{$book->link}}">購入</a>
        @endforeach 
</div>  
@endsection
