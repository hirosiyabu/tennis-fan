<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Recomendbooks</title>
    </head>
    <body>
        <p>お勧め本</p>
        @foreach($books as $book)
          <p>題名{{$book->booktitle}}</p>
          <a href="{{$book->link}}">購入</a>
        @endforeach
        
    </body>
</html>
