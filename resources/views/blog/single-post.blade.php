@extends('layout.master')
@section('content')
<section class="s-content">

    <div class="row">
        <div class="column large-12">

            <article class="s-content__entry format-standard">

                <div class="s-content__media">
                    <div class="s-content__post-thumb" style="text-align: center;">
                        <img src="{{asset('./uploads/'.$post->image)}}" 
                             srcset="{{asset('./uploads/'.$post->image)}} 2100w, 
                             {{asset('./uploads/'.$post->image)}} 1050w, 
                             {{asset('./uploads/'.$post->image)}} 525w" sizes="(max-width: 2100px) 100vw, 2100px" alt="">
                    </div>
                </div> <!-- end s-content__media -->

                <div class="s-content__entry-header">
                    <h1 class="s-content__title s-content__title--post">{{$post->title}}.</h1>
                </div> <!-- end s-content__entry-header -->

                <div class="s-content__primary">

                    <div class="s-content__entry-content">

                        <p class="lead">
                        {!! $post->body !!}. </p> 
                    </div> <!-- end s-entry__entry-content -->

                    <div class="s-content__entry-meta">

                        <div class="entry-author meta-blk">
                            <div class="author-avatar">
                                <img class="avatar" src="{{asset('assets/images/avatars/me.jpg')}}" alt="">
                            </div>
                            <div class="byline">
                                <span class="bytext">Posted By</span>
                                <a href="#">Achraf Assila</a>
                            </div>
                        </div>

                        <div class="meta-bottom">
                            
                            <div class="entry-cat-links meta-blk">
                                {{-- <div class="cat-links">
                                    <span>In</span> 
                                    <a href="#0">Frontend</a>
                                    <a href="#0">Design</a>
                                    <a href="#0">Work</a>
                                </div> --}}

                                <span>On</span>
                                {{date('d M , Y', strtotime($post->created_at))}}
                            </div>

                            {{-- <div class="entry-tags meta-blk">
                                <span class="tagtext">Tags</span>
                                <a href="#">orci</a>
                                <a href="#">lectus</a>
                                <a href="#">varius</a>
                                <a href="#">turpis</a>
                            </div> --}}

                        </div>

                    </div> <!-- s-content__entry-meta -->

                    

                </div> <!-- end s-content__primary -->
            </article> <!-- end entry -->

        </div> <!-- end column -->
    </div> <!-- end row -->


    <!-- comments
    ================================================== -->
    <div class="comments-wrap">

        <div id="comments" class="row">
            <div class="column large-12">

                <h3>{{count($post->comments)}} Comments</h3>

                <!-- START commentlist -->
                <ol class="commentlist">

                    @foreach ($post->comments as $comment)
                    <li class="depth-1 comment">

                        <div class="comment__avatar">
                            <img class="avatar" src="{{asset('assets/images/avatars/ach.png')}}" alt="" width="50" height="50">
                        </div>
                            
                        <div class="comment__content">
                            
                            <div class="comment__info">
                                <div class="comment__author">{{$comment->name}}</div>
                                
                                <div class="comment__meta">
                                    <div class="comment__time">{{date('d M , Y', strtotime($comment->created_at))}}</div>
                                </div>
                            </div>

                            <div class="comment__text">
                            <p>{{$comment->comment}}</p>
                            </div>

                        </div>
                        
                    </li> <!-- end comment level 1 -->
                    @endforeach

                </ol>
                <!-- END commentlist -->

            </div> <!-- end col-full -->
        </div> <!-- end comments -->


        <div class="row comment-respond">

            <!-- START respond -->
            <div id="respond" class="column">

                <h3>
                Add Comment 
                <span>Your email address will not be published.</span>
                </h3>

                <form name="contactForm" id="contactForm" method="post" action="{{route('guest.storeComment',$post->id)}}" autocomplete="off">
                    <fieldset>
                        @csrf
                        <div class="form-field">
                            <input name="name" id="cName" class="h-full-width h-remove-bottom" placeholder="Your Name" value="" type="text">
                        </div>

                        <div class="form-field">
                            <input name="email" id="cEmail" class="h-full-width h-remove-bottom" placeholder="Your Email" value="" type="text">
                        </div>

                        <div class="form-field">
                            <input name="website" id="cWebsite" class="h-full-width h-remove-bottom" placeholder="Website" value="" type="text">
                        </div>

                        <div class="message form-field">
                            <textarea name="comment" id="cMessage" class="h-full-width" placeholder="Your Message"></textarea>
                        </div>
                        @if ($errors->any())
                        @foreach ($errors->all() as $error)
                                    <div class="alert-box alert-box--error">
                                        <p>{{ $error }}</p>
                                        <span class="alert-box__close"></span>
                                    </div><!-- end error -->
                        @endforeach
                        @endif
                        @if (Session::get('success'))
                            <div class="alert-box alert-box--success">
                                <p>{{Session::get('success')}}</p>
                                <span class="alert-box__close"></span>
                            </div><!-- end success -->
                        @endif
                        <br>
                        <input name="submit" id="submit" class="btn btn--primary btn-wide btn--large h-full-width" value="Add Comment" type="submit">

                    </fieldset>
                </form> <!-- end form -->

            </div>
            <!-- END respond-->

        </div> <!-- end comment-respond -->

    </div> <!-- end comments-wrap -->


</section> <!-- end s-content -->
@endsection