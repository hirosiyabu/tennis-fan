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
        $this->middleware('auth')->except(['index', 'detail']);
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
        ];
    
        $messages = array(
            'title.required' => 'タイトルを正しく入力してください。',
            'content.required' => '本文を正しく入力してください。',
        );
    
        $validator = Validator::make($request->all(),$rules,$messages);
        if ($validator->passes()){
        $create_post = Post::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'content' => $request->content
        ]);
        return redirect("/post/$create_post->id")
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



