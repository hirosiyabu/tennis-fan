@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Set up Google Authenticator</div>
 
                <div class="panel-body" style="text-align: center;">
                    <p>二段階認証をするためにバーコードをスキャンしてください。代わりにコードを使用することもできます。 {{ $secret }}</p>
                    <div>
                        <img src="{{ $QR_Image }}">
                    </div>
                    <p>続行する前にGoogle Authenticatorアプリを設定する必要があります。そうでなければログインすることができません。</p>
                    <div>
                        <a href="/complete-registration"><button class="btn-primary">Complete Registration</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection