@extends('layout')

@section('header')
    <div id="wrapper">
        <div id="header-wrapper">
            <div id="header">
                <div id="logo">
                    @auth
                        <h1><a href="#">All blogs of {{Auth::user()->name}} </a></h1>
                        <p>Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a></p>
                    @elseguest
                    <h1><a href="#">Hi Guest Please Sign in </a></h1>
                        <p>By clicking home you will be redirected to loginpage <a> </a></p>
                    @endauth

                </div>
            </div>
        </div>
@endsection('header')
    {{session('message')}}
    @section('content')
        <!-- end #header -->
            <div id="menu">
                <ul>
                    <li class="current_page_item"><a href="/home">Home</a></li>
                 <!--   <li><a href="#">Blog</a></li>
                    <li><a href="#">Photos</a></li>
                    <li><a href="/about">About</a></li>
                    <li><a href="#">Posts</a></li>
                    <li><a href="#">Contact</a></li> -->
                </ul>
            </div>
            <!-- end #menu -->
            <div id="page">
                <div id="page-bgtop">
                    <div id="page-bgbtm">
                        <div id="content">
                            @foreach($posts as $post)
                            <div class="post">
                                <h2 class="title">{{$post->title}} </h2>
                                <p class="meta">Posted by: <strong>{{$post->user->name}} </strong>&nbsp {{$post->created_at}}

                                    &nbsp;&bull;&nbsp; <a href="#" class="comments"></a> &nbsp;&bull;&nbsp; <a href="{{route('posts.show',$post->id)}}" class="permalink">Full article</a></p>

                                <div class="entry">
                                    <p><img src="{{asset('/images/img03.jpg')}}" width="186" height="186" alt="" class="alignleft border" />{{$post->short}}</p>
                                    <p> {{$post->des}}</p>
                                </div>
                            </div>
                            @endforeach

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
