<!-- preloader
    ================================================== -->
    <div id="preloader"> 
    	<div id="loader"></div>
    </div>


    <!-- header
    ================================================== -->
    <header class="s-header s-header--opaque" style="background: black">

        <div class="s-header__logo">
            <a class="logo" href="{{route('blog.home')}}">
                <img src="{{asset('assets/images/logo.svg')}}" alt="Homepage">
            </a>
        </div>

        <div class="row s-header__navigation">

            <nav class="s-header__nav-wrap">

                <h3 class="s-header__nav-heading h6">Navigate to</h3>

                <ul class="s-header__nav">
                    <li class="current"><a href="/" title="">Home</a></li>
                    <li class="has-children">
                        <a href="#" title="">Categories</a>
                        <ul class="sub-menu">
                            @foreach ($categories as $category)
                            <li><a href="{{route('blog.category',$category->id)}}">{{$category->name}}</a></li>
                            @endforeach
                            
                        </ul>
                    </li>
                    {{-- <li><a href="about.html" title="">About</a></li>
                    <li><a href="contact.html" title="">Contact</a></li> --}}
                </ul> <!-- end s-header__nav -->

                <a href="#0" title="Close Menu" class="s-header__overlay-close close-mobile-menu">Close</a>

            </nav> <!-- end s-header__nav-wrap -->

        </div> <!-- end s-header__navigation -->

        <a class="s-header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>

        <div class="s-header__search">

            <div class="s-header__search-inner">
                <div class="row wide">

                    <form role="search" method="get" class="s-header__search-form" action="#">
                        <label>
                            <span class="h-screen-reader-text">Search for:</span>
                            <input type="search" class="s-header__search-field" placeholder="Search for..." value="" name="s" title="Search for:" autocomplete="off">
                        </label>
                        <input type="submit" class="s-header__search-submit" value="Search"> 
                    </form>

                    <a href="#0" title="Close Search" class="s-header__overlay-close">Close</a>

                </div> <!-- end row -->
            </div> <!-- s-header__search-inner -->

        </div> <!-- end s-header__search wrap -->	



    </header> <!-- end s-header -->