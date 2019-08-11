<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Comment;
use Validator;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['']);
    }
    function create(Request $request){
        $rules = [
            'commenter'=>'required',
            'comment'=>'required',
        ];
    
        $messages = array(
            'commenter.required' => 'お名前を正しく入力してください',
            'comment.required' => 'コメントを正しく入力してください。',
        );
    
        $validator = Validator::make($request->all(),$rules,$messages);
        if ($validator->passes()){
        $comment = new Comment;
        $comment->user_id = Auth::id();
		$comment->commenter = $request->commenter;
		$comment->comment = $request->comment;
		$comment->post_id = $request->post_id;
        $comment->save();
        return redirect("/post/$request->post_id")
        ->with('message', 'コメントありがとうございます。');
    }else{
        return redirect("/post/$request->post_id")
        ->withErrors($validator)
		->withInput();
    }
}
}


