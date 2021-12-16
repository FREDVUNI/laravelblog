@extends('layouts.app')
@section('title','Blog Posts')
@section('content')
<section class="page-section-pt">
<div class="container">
    <div class="page-section-pt">
        <div class="text-center">
            <h1 class="font-weight-bold">Recent Posts</h1>
        </div>
        <div class="pb-5 pl-3">
            @if(Auth::check())
                 <a href="/blog/create" class="btn btn-3">Add Post</a>
             @endif
        </div>
        <div class="container blog">
            @if($message = Session::get('message'))
                <div class="alert alert-success">{{ $message }}</div>
            @endif
            @forelse ($posts as $post)
                <div class="row pt-5">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <a href="/blog/{{ $post->slug }}">
                            <img src="/posts/{{ $post->image }}" alt="blog" width="100%" height="100%">
                        </a>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <h1 class="text-dark font-weight-bold">
                            <a href="/blog/{{ $post->slug }}" class="text-dark">{{ $post->title }}</a>
                        </h1>
                        <span class="text-muted">By <strong><i>{{ $post->user->name }}, </i></strong>, Created on {{ date('jS M Y',strtotime($post->updated_at)) }}</span>
                        <h3 class="text-dark pt-3">
                            {{ str_limit($post->description,100) }}
                        </h3>
                        <a href="/blog/{{ $post->slug }}" class="btn-3 btn">Keep Reading</a>
                        
                        <div class="pb-5 pt-5 d-flex float-right">
                            @if(Auth::check() && Auth::user()->id == $post->user_id)
                                <a href="/blog/{{ $post->slug }}/edit" class="btn text-gray float-right">
                                    <i>Edit</i>
                                </a>
                                <form action="/blog/{{ $post->slug }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn text-danger float-right"><i>Delete</i></button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <li class="text-danger">There are no available posts.</li>
            @endforelse
        </div>  
    </div>    
</div>    
</section>         
@endsection