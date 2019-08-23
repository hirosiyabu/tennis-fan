
<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <form action="/post" method="get">
                @csrf
                <div class='form-group'>
                    <label for="keyword">キーワード</label>
                    <input class="form-control" type="text" id="keyword" name="keyword"  placeholder="スレッドタイトル検索">
                </div>
                <div class='form-group'>
                    <button class="btn btn-primary btn-block" type="submit">検索</button>
                        <a class="btn btn-outline-info" href= '/post' >クリア</a>
                </div>
            </form>
        </div>
        <div class="col-lg-4">
        <div class="d-block mx-auto">
            <FORM NAME="a">        
            <TEXTAREA NAME="b" rows="8" cols="40" style="color:black;background-color:white"></TEXTAREA>
            </FORM> 
        </div>
        </div>
        <div class="col-lg-4 ">
            <img class="d-block mx-auto" src="{{asset('img/tennis_animal_neko.png')}}"   width="200" height="200" ait="テニス">
        </div>
    </div>
</div>
    