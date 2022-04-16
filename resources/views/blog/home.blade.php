@extends('layout.master')
@section('content')
<!-- hero
    ================================================== -->
    <section id="hero" class="s-hero">

        <div class="s-hero__slider">

            <div class="s-hero__slide">

                <div class="s-hero__slide-bg" style="background-image: url('./assets/images/1.jpeg');"></div>

                <div class="row s-hero__slide-content animate-this">
                    <div class="column">
                        <div class="s-hero__slide-meta">
                            <span class="byline"> 
                                Posted by 
                                <span class="author">
                                    <a href="#0">Achraf Assila</a>
                                </span>
                            </span>
                        </div>
                        <h1 class="s-hero__slide-text">
                                Tips and Ideas to Help You Start Programming.
                                                    </h1>
                    </div>
                </div>

            </div> <!-- end s-hero__slide -->

            <div class="s-hero__slide">

                <div class="s-hero__slide-bg" style="background-image: url('./assets/images/2.jpeg');"></div>

                <div class="row s-hero__slide-content animate-this">
                    <div class="column">
                        <div class="s-hero__slide-meta">
                            <span class="byline"> 
                                Posted by 
                                <span class="author">
                                    <a href="#0">Achraf Assila</a>
                                </span>
                            </span>
                        </div>
                        <h1 class="s-hero__slide-text">
                                Different Types And Tricks To Be Good Developer.
                        </h1>
                    </div>
                </div>

            </div> <!-- end s-hero__slide -->

            <div class="s-hero__slide">

                <div class="s-hero__slide-bg" style="background-image: url('./assets/images/3.jpeg');"></div>

                <div class="row s-hero__slide-content animate-this">
                    <div class="column">
                        <div class="s-hero__slide-meta">
                            <span class="byline"> 
                                Posted by 
                                <span class="author">
                                    <a href="#0">Achraf Assila</a>
                                </span>
                            </span>
                        </div>
                        <h1 class="s-hero__slide-text">
                                10 Reasons Why Being Developer in 2022.
                        </h1>
                    </div>
                </div>

            </div> <!-- end s-hero__slide -->

        </div> <!-- end s-hero__slider -->

        <div class="s-hero__social hide-on-mobile-small">
            <p>Follow</p>
            <span></span>
            <ul class="s-hero__social-icons">
                <li><a href="https://github.com/AchrafASSILA"><i class="fab fa-github" aria-hidden="true"></i></a></li>
                <li><a href="https://www.linkedin.com/in/achraf-assila-94448321a/"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                <li><a href="https://www.instagram.com/achraf_essl/"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
            </ul>
        </div> <!-- end s-hero__social -->

        <div class="nav-arrows s-hero__nav-arrows">
            <button class="s-hero__arrow-prev">
                <svg viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg" width="15" height="15"><path d="M1.5 7.5l4-4m-4 4l4 4m-4-4H14" stroke="currentColor"></path></svg>
            </button>
            <button class="s-hero__arrow-next">
               <svg viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg" width="15" height="15"><path d="M13.5 7.5l-4-4m4 4l-4 4m4-4H1" stroke="currentColor"></path></svg>
            </button>
        </div> <!-- end s-hero__arrows -->

    </section> <!-- end s-hero -->
        <!-- content
    ================================================== -->
    <section class="s-content s-content--no-top-padding">


        <!-- masonry
        ================================================== -->
        <div class="s-bricks">

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
                                <img style="width: 100%;" src="{{asset('./uploads/'.$post->image)}}" 
                                srcset="{{asset('./uploads/'.$post->image)}}, {{asset('./uploads/'.$post->image)}}" alt="">
                            </a>
                        </div> <!-- end entry__thumb -->
    
                        <div class="entry__text">
                            <div class="entry__header">
                                <h1 class="entry__title"><a href="https://www.dreamhost.com/r.cgi?287326">{{$post->title}}</a></h1>
                                
                                <div class="entry__meta">
                                    <span class="byline">By:
                                        <span class='author'>
                                            <a href="https://achrafassila.herokuapp.com/">Achraf Assila</a>
                                    </span>
                                </span>
                                    
                                </div>
                                <div class="entry__meta">
                                    <span class="byline">Category:
                                        <span class='author'>
                                            <a href="#">{{$post->category->name}}</a>
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