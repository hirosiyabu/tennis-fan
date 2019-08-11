
<form action="/comment/create" method="post">
    @csrf
    <div class="form-group">
      <label for="commenter" class="">名前</label>
      <input class="form-control" type="text" id="commenter" name="commenter">
    </div>

    <div class="form-group">
      <label for="comment" class="">コメント</label>
      <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
      <input type="hidden" name="post_id" value="{{$post->id}}">
      <button type="submit" class="btn btn-primary">投稿する</button>
    </div>
</form>