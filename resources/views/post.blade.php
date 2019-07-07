<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
    </head>
    <body>
        <p>掲示板</p>
        @foreach($posts as $post)
          <p>題名{{$post->title}}</p>
          <p>内容{{$post->content}}</p>
        @endforeach
        
    </body>
</html>
