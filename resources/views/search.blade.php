<form action="/post" method="get">
    @csrf
    <div class='form-group'>
        <label for="keyword">キーワード</label>
        <input class="form-control" type="text" id="keyword" name="keyword">
    </div>
    <div class='form-group'>
    <button class="btn btn-primary btn-block" type="submit">スレッド検索</button>
        <a class="btn btn-outline-info" href= '/post' >クリア</a>
    </div>
</form>