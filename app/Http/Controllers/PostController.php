<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    function index(){
        $posts = Post::all();
        return view('post',['posts' => $posts]); 
    }
}



