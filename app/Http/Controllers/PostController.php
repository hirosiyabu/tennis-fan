<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use Validator;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', '2fa'])->except(['index', 'detail']);
    }
    function index(Request $request){
        if($request->filled('keyword')){
            $keyword = $request->input('keyword');
            $posts = Post::where('title','like','%'.$keyword.'%');
            $posts = $posts->orderBy('created_at','desc')->paginate(5);
            return view('post/index',['posts' => $posts,'keyword',$keyword]);
        }else{
            $posts = \App\Post::orderBy('created_at', 'desc')->paginate(5);
            return view('post/index',['posts' => $posts]);
        }
            
    }

    function create(Request $request){
        $rules = [
            'title' => 'required',
            'content'=>'required',
            'image'=>[
                // アップロードされたファイルであること
                'file',
                // 画像ファイルであること
                'image',
                // MIMEタイプを指定
                'mimes:jpeg,png,jpg,bmp,gif,svg',
            ]
        ];
    
        $messages = array(
            'title.required' => 'タイトルを正しく入力してください。',
            'content.required' => '本文を正しく入力してください。',
            "image" => "指定されたファイルが画像(jpg、png、bmp、gif、svg)ではありません。",
        );
    
        $validator = Validator::make($request->all(),$rules,$messages);
        if ($validator->passes()){
            $post = new Post;
            $post->user_id = Auth::id();
            $post->title = $request->title;
            $post->content = $request->content;
            if (!empty($request->image)){
            $post->image = base64_encode(file_get_contents($request->image->getRealPath()));
            }
            $post->save();
            return redirect("/post/$post->id")
        ->with('message', '投稿がが完了しました。');
        }else{
        return redirect("/post")
        ->withErrors($validator)
		->withInput();
        }
    }

    function detail($id){
        $post = Post::find($id);
        $user = \Auth::user();
        if ($user) {
            $login_user_id = $user->id;
        } else {
            $login_user_id = "";
        }
        return view('/post/detail',['post' => $post,'login_user_id' => $login_user_id]);
    }

    function edit($id){
        $post = Post::find($id);
        return view('/post/edit',['post' => $post]);
    }

    function update(Request $request){
        Post::find($request->id)->update([
            'title' => $request->title,
            'content' => $request->content
        ]);
        return redirect("/post/$request->id");
    }

    function delete(Request $request){
        Post::destroy($request->id);
        return redirect("/post");
    }   
}



