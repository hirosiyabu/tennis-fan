@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="display-6">BMI計算ページです</h1>
    <form method="post">
        @csrf
        <div class="row">
            <div class="form-group col-sm-3">
                <label for="height">身長</label>
                <input class="form-control" name="height" type="text" id="height">
            </div>
            <div class="form-group col-sm-3">
                <label for="weight">体重</label>
                <input class="form-control" name="weight" type="text" id="weight">
            </div>
        </div>
        <button class="btn btn-primary" type="submit">計算する</button>
        @isset($bmi)
            <p>あなたのBMIは {{$bmi}}です。</p>
            <p>あなたの体型は {{$bodytype}}です。</p>
        @endisset
        

    </form>
</div>
@endsection