@extends('layouts.app')
@section("title",strtolower($post->title))
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 page-section-pt">
             <h1 class="font-weight-bold">Edit {{ $post->title }}</h1>
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="/blog/{{ $post->slug }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <div class="col-md-12">
                            <label for="title">Title</label>

                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $post->title }}" placeholder="Enter the post title" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-md-12">
                            <label for="description">Description</label>

                                <textarea name="description" id="description" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror" placeholder="Enter post description here .">{{ old('description') ?? $post->description }}</textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-md-12">
                                <img src="/posts/{{ $post->image }}" alt="{{ $post->slug }}" width="100%"><br>
                            <label for="image">Image</label>
                                <input id="Image" type="file" class="form-control-file @error('image') is-invalid @enderror" name="image">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-block mb-3">
                                   Update Post
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
