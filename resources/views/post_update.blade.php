@extends('layout')
<link href="{{ asset('css/create.css') }}" rel="stylesheet">
@section('header')
    <div id="wrapper">
        <div id="header-wrapper">
            <div id="header">
                <div id="logo">
                    <h1><a href="#">Update Post Page Working</a></h1>
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
                        @auth
                        <form method="POST" action="{{route('posts.update',$postsLst->id)}}">
                            @csrf
                            @method('PUT')
                            <label for="title">Title</label>
                            <input type="text" id="title" name="title" placeholder="Your Title Goes Here" value="{{$postsLst->title}}">

                            <label for="short">Short Description</label>
                            <input type="text" id="short" name="short" placeholder="Short Description for Post" value="{{$postsLst->short}}">

                            <label for="des">Description</label>
                            <textarea id="des" name="des" placeholder="Description goes here" style="height:200px" value="{{$postsLst->des}}"></textarea>

                            <input type="submit" value="Update Post">
                        </form>
                        @elseguest
                            <p>Please Login to Create & Update a post</p>
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
