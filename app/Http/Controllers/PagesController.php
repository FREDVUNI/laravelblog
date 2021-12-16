<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $post = Post::all()->random(1)->first();
        //$posts = Post::all();
        return view('index',compact('post'));
    }
}
