@extends('layout.layout')

@section('title',$tag->title)

@section('header')

@endsection

@section('content')

    <div class="page-wrapper">
        <div class="blog-title-area">
            <ol class="breadcrumb hidden-xs-down">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Домой</a></li>
                <li class="breadcrumb-item"><a>{{ $tag->title }}</a>
            </ol>
            <h3>{{ $tag->title }}</h3>
        </div>
        <div class="blog-custom-build">
            @foreach($posts as $post)
                <div class="blog-box wow fadeIn">
                    <div class="post-media">
                        <a href="{{ route('posts.single', ['slug'=>$post->slug]) }}" title="">
                            <img src="{{ ($post->getImage()) }}" alt="" class="img-fluid">
                            <div class="hovereffect">
                                <span></span>
                            </div>
                            <!-- end hover -->
                        </a>
                    </div>
                    <!-- end media -->
                    <div class="blog-meta big-meta text-center">
                        <div class="post-sharing">
                            <ul class="list-inline">
                                <li><a href="#" class="fb-button btn btn-primary"><i
                                            class="fa fa-facebook"></i> <span
                                            class="down-mobile">Share on Facebook</span></a>
                                </li>
                                <li><a href="#" class="tw-button btn btn-primary"><i
                                            class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a>
                                </li>
                                <li><a href="#" class="gp-button btn btn-primary"><i
                                            class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div><!-- end post-sharing -->
                        <h4><a href="{{ route('posts.single', ['slug'=>$post->slug]) }}" title="">{{ $post->title }}</a>
                        </h4>
                        <p>{!! $post->description !!}</p>
                        <small><a href="{{ route('categories.single', ['slug'=>$post->category->slug]) }}"
                                  title="">{{ $post->category->title }}</a></small>
                        <small>{{ $post->getPostDate() }}</small>
                        <small><i class="fa fa-eye"></i> {{  $post->views }}</small>
                    </div><!-- end meta -->
                </div><!-- end blog-box -->
                <hr class="invis">
            @endforeach

        </div>
    </div>

    <hr class="invis">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="Page navigation">
                {{ $posts->links() }}
            </nav>
        </div><!-- end col -->
    </div><!-- end row -->
@endsection
