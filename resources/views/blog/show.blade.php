@extends('layouts.app')
@section('title',strtolower($post->title))
@section('content')
<section class="page-section-pt">
<div class="container">
    <div class="page-section-pt">
        <div class="container blog pb-5">
                <div class="row">
                     <div class="col-lg-6 col-md-6 col-sm-6">
                        <h1 class="text-dark font-weight-bold">{{ $post->title }}</h1>
                        <span class="text-muted">By <strong><i>{{ $post->user->name }}, </i></strong>, Created on {{ date('jS M Y',strtotime($post->updated_at)) }}</span>
                        <h3 class="text-dark pt-3">
                            {{ str_limit($post->description,100) }}
                        </h3>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <img src="/posts/{{ $post->image }}" alt="blog" width="100%" height="100%">
                    </div>
                </div>
                </div>
            </div>  
        </div>    
    </section>         
@endsection