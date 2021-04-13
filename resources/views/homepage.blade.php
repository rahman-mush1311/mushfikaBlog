@extends('layout')

@section('header')
    <div id="wrapper">
        <div id="header-wrapper">
            <div id="header">
                <div id="logo">
                    <h1><a href="#">Hi blogger{{Auth::user()->name}} </a></h1>
                    <p>Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a></p>
                </div>
            </div>
        </div>
    @endsection('header')

    @section('content')
        <!-- end #header -->
            <div id="menu">
                <ul>
                    <li class="current_page_item"><a href="/welcomepage">Home</a></li>
                    <!-- <li><a href="/update">Update</a></li> -->
                    <li><a href="{{route('posts.index')}}">All Post</a></li>
                    <li><a href="/blog">Own Posts</a></li>
                    <li><a href="/create">Create Blog</a>
                    <li><a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
            <!-- end #menu -->
            <div id="page">
                <div id="page-bgtop">
                    <div id="page-bgbtm">
                        <div id="content">
                            @auth
                            @foreach($posts as $post)
                                <div class="post">
                                    <h2 class="title">{{$post->title}} </h2>
                                    <p class="meta">Posted by <a href="#">Someone</a> {{$post->created_at}}

                                        &nbsp;&bull;&nbsp; <a href="#" class="comments"></a> &nbsp;&bull;&nbsp; <a href="{{route('posts.show',$post->id)}}" class="permalink">Full article</a></p>

                                    <div class="entry">
                                        <p><img src="images/img03.jpg" width="186" height="186" alt="" class="alignleft border" />{{$post->short}}</p>
                                        <p> {{$post->des}}</p>
                                    </div>
                                </div>
                            @endforeach
                            @elseguest
                                Please Register to see the blog posts.
                            @endauth
                            <div style="clear: both;">&nbsp;</div>
                        </div>
                        <!-- end #content -->

                        <!-- end #sidebar -->
                        <div style="clear: both;">&nbsp;</div>
                    </div>
                </div>
            </div>
            <!-- end #page -->
    </div>
@endsection
