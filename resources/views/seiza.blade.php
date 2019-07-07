<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        
    </head>
    <body>
        <h1>星座判定式</h1>
        <form method="post">
            @csrf
            <p>誕生日を入力してください</p>
            <p>
                月<input type="text" name="month" size="40">
            </p>
            <p>    
                日<input type="text" name="day" size="40">
            </p>
            <div class="button">
                <button type="submit">データを送信</button>
            </div>

            @isset($seiza)
                <p>あなたの星座は{{$seiza}}です。</p>
            @endisset

        </form>
    </body>
</html>