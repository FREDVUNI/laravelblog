<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        return $this->middleware('auth')->except('index','show');
    }
    public function index()
    {
        $posts = Post::orderBy('updated_at','DESC')->get();
        return view('blog.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:posts|max:255',
            'description' => 'required',
            'slug' => '',
            'image' => 'required|image|max:255|mimes:jpg,png,jpeg,svg,gif',
        ]);
        
        $image = $request->file('image');
        $img = md5(microtime()).".".$image->getClientOriginalExtension();
        $image->move(public_path('/posts'),$img);

        Post::create([
            "title" => $request->title,
            "description" => $request->description,
            "slug" => str_slug($request->title),
            "image" => $img,
            "user_id" => auth()->user()->id
        ]);
        return redirect('/blog')->with('message','Your Post has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //$post = Post::FindorFail($slug)->where('slug',$slug)->get();
        //return view('blog.show',$post);
        $post = Post::where('slug',$slug)->first();
        if(! $post):
            return abort(404);
        endif;
        return view('blog.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $post = Post::where('slug',$slug)->first();
        if(! $post):
            return abort(404);
        endif;
        return view('blog.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$slug)
    {
        $post = Post::where('slug',$slug)->first();
        if(! $post):
            return abort(404);
        endif;

        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'slug' => '',
        ]);
        if($request->image):
            $request->validate([
                'image' => 'required|image|max:255|mimes:jpg,png,jpeg,svg,gif',
            ]);
            $image = $request->file('image');
            $img = md5(microtime()).".".$image->getClientOriginalExtension();
            $image->move(public_path('/posts'),$img);

            $path = public_path("posts/");
            if($post->image != " " && $post->image != NULL):
                $old = $path.$post->image;
                unlink($old);
            endif;

             $post->update([
                "image" => $img,
             ]);
        endif;

        $post->update([
            "title" => $request->title,
            "description" => $request->description,
            "slug" => str_slug($request->title),
            "user_id" => auth()->user()->id
         ]);
        return redirect('/blog')->with('message','Your Post has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $post = Post::where('slug',$slug)->first();
        if(! $post):
            return abort(404);
        endif;
        $path = public_path('posts/');
        if($post->image != NULL || $post->image == ""):
            $old = $path.$post->image;
            unlink($old);
        endif;
        $post->delete();
        return redirect('/blog')->with('message','Your Post has been deleted.');
    }
}
