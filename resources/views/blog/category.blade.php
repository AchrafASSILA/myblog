@extends('layout.master')
@section('content')
<section class="s-content">
    <!-- page header
    ================================================== -->
    <div class="s-pageheader">
        <div class="row">
            <div class="column large-12">
                <h1 class="page-title">
                    <span class="page-title__small-type">Category</span>
                    {{$category->name}}
                </h1>
            </div>
        </div>
    </div> <!-- end s-pageheader-->
    

    <!-- masonry
    ================================================== -->
    <div class="s-bricks s-bricks--half-top-padding">

        <div class="masonry">
            <div class="bricks-wrapper h-group">

                <div class="grid-sizer"></div>

                <div class="lines">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                @foreach ($posts as $post)
                    
                <article class="brick entry" data-aos="fade-up">
    
                    <div class="entry__thumb">
                        <a href="{{route('blog.single-post',$post->id)}}" class="thumb-link">
                            <img src="{{asset('./uploads/'.$post->image)}}" 
                            srcset="{{asset('./uploads/'.$post->image)}}, {{asset('./uploads/'.$post->image)}}" alt="">
                        </a>
                    </div> <!-- end entry__thumb -->

                    <div class="entry__text">
                        <div class="entry__header">
                            <h1 class="entry__title"><a href="{{route('blog.single-post',$post->id)}}">{{$post->title}}</a></h1>
                            
                            <div class="entry__meta">
                                <span class="byline">By:
                                    <span class='author'>
                                        <a target="_blank" href="https://achrafassila.herokuapp.com/">Achraf Assila</a>
                                </span>
                            </span>
                                
                            </div>
                            <div class="entry__meta">
                                <span class="byline">Category:
                                    <span class='author'>
                                        <a href="{{route('blog.category',$category->id)}}">{{$post->category->name}}</a>
                                </span>
                            </span>
                                
                            </div>
                        </div>
                        <div class="entry__excerpt">
                            <p>
                                {!! Str::limit($post->body, 20) !!}</p>
                        </div>
                        <a class="entry__more-link" href="{{route('blog.single-post',$post->id)}}">Learn More</a>
                    </div> <!-- end entry__text -->
                
                </article> <!-- end article -->

                @endforeach
            </div> <!-- end brick-wrapper -->

        </div> <!-- end masonry -->

        <div class="row">
            <div class="column large-12">
                <nav class="pgn">
            {{$posts->links()}}
                </nav>
            </div>
        </div>
    </div> <!-- end s-bricks -->

</section> <!-- end s-content -->
@endsection