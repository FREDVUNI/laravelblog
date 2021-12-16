@extends('layouts.app')
@section('title','Home')
@section('content')
    <div class="background-image bg-overlay">
        <div class="flex text-gray pt-5">
            <div class="m-auto pt-4 pb-5 py-4 text-center">
                <h1 class="font-weight-bold pb-4">
                    Do you want to become a developer ?
                </h1>
                <p>Having clarity of purpose and a clear picture of what you desire, is probably the single most important thing</p>
                <a href="/blog" class="text-center text-gray py-2 px-4 font-weight-bold">Read More</a>
            </div>
        </div>
    </div>
    <div class="page-section-pt">
            <div class="container blog pb-5">
               <div class="row">
                  <div class="col-lg-5 col-md-6 col-sm-6">
                  <  <img src="/images/item.jpg" alt="blog" width="100%">
                  </div>
                  <div class="col-lg-7 col-md-6 col-sm-6">
                        <h1 class="text-gray font-weight-bold">Struggling to be a better web developer ?</h1>
                        <p class="text-muted">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nobis nihil tempore harum voluptas cupiditate, mollitia voluptatem
                        </p>
                        <p class="text-dark text-sm">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nobis nihil tempore harum voluptas cupiditate, mollitia voluptatem
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nobis nihil tempore harum voluptas cupiditate, mollitia voluptatem
                        </p>
                        <a href="/blog" class="btn-3">Find Out More</a>
                </div>
               </div>
            </div>
            <section class="expertise">
                <div class="text-center pt-5 pb-5">
                <span class="uppercase text-sm text-white font-weight-bold">Expert in</span>
                <div class="contents pt-3">
                    <p class="text-white font-weight-bold">— UX Design</p>
                    <p class="text-white font-weight-bold">— Project Management</p>
                    <p class="text-white font-weight-bold">— Digital Strategy</p>
                    <p class="text-white font-weight-bold">— Backend</p>
                </div>
            </div>
            </section>
         </div>
         <div class="container">
             <div class="page-section-pt">
             <div class="text-center">
                <span class="uppercase text-sm text-gray font-weight-bold">Blog</span>
                <h2 class="font-weight-bold">Recent Posts</h2>
                <p class="text-gray">Lorem, ipsum dolor sit ratione repellat maiores debitis reprehenderit error vero 
                    beatae consectetur cupiditate quam voluptatibus odit praesentium mollitia.
                </p>
             </div>
             <div class="container blog pb-5">
               <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6 post bg-yellow pt-5 pl-5 pr-5 pb-3">
                        <span class="text-gray font-weight-bold text-cap"> {{$post->title}}</span>
                        <h3 class="text-dark">
                             {{$post->description}}
                        </h3>
                        <a href="/blog" class="btn-1">Find Out More</a>
                </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 post-image">
                    <img src="/posts/{{$post->image}}" alt="blog" width="100%" height="100%">
                  </div>
               </div>
            </div>
             </div>
         </div>
         </div>
    @endsection