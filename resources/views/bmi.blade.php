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
        <h1>BMI計算ページです</h1>
        <form method="post">
            @csrf
            <p>
                身長<input type="text" name="height" size="40">
            </p>
            <p>    
                体重<input type="text" name="weight" size="40">
            </p>
            <div class="button">
                <button type="submit">データを送信</button>
            </div>

            @isset($bmi)
                <p>あなたのBMIは {{$bmi}}です。</p>
                <p>あなたのボディータイプは {{$bodytype}}です。</p>
            @endisset
            

        </form>
    </body>
</html>