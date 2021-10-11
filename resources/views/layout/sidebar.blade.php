<div class="sidebar">
    {{--    <div class="widget-no-style">--}}
    {{--        <div class="newsletter-widget text-center align-self-center">--}}
    {{--            <h3>Subscribe Today!</h3>--}}
    {{--            <p>Subscribe to our weekly Newsletter and receive updates via email.</p>--}}
    {{--            <form class="form-inline" method="post">--}}
    {{--                <input type="text" name="email" placeholder="Add your email here.." required="" class="form-control">--}}
    {{--                <input type="submit" value="Subscribe" class="btn btn-default btn-block">--}}
    {{--            </form>--}}
    {{--        </div><!-- end newsletter -->--}}
    {{--    </div>--}}

    @if($popular_posts)
        <div class="widget">
            <h2 class="widget-title">Recent Posts</h2>
            <div class="blog-list-widget">
                <div class="list-group">
                    @foreach($popular_posts as $popular_post)

                        <a href="{{ route('posts.single',['slug'=>$popular_post->slug]) }}"
                           class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="w-100 justify-content-between">
                                <img src="{{ $popular_post->getImage() }}" alt="" class="img-fluid float-left">
                                <h5 class="mb-1">{{ $popular_post->title }}</h5>
                                <small>
                                    {{ $popular_post->getPostDate() }}
                                    <i class="fa fa-eye"></i>
                                    {{ $popular_post->views }}
                                </small>
                            </div>
                        </a>
                    @endforeach

                </div>
            </div><!-- end blog-list -->
        </div><!-- end widget -->
    @endif
    @if($popular_categories)
        <div class="widget">
            <h2 class="widget-title">Popular Categories</h2>
            <div class="link-widget">
                <ul>
                    @foreach($popular_categories as $popular_category)
                        <li>
                            <a href="{{ route('categories.single', ['slug'=>$popular_category->slug]) }}">{{ $popular_category->title }}
                                <span>({{ $popular_category->posts_count }})</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div><!-- end link-widget -->
        </div><!-- end widget -->
    @endif
</div><!-- end sidebar -->
