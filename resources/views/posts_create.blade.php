@extends('layout')
<link href="{{ asset('css/create.css') }}" rel="stylesheet">
@section('header')
    <div id="wrapper">
        <div id="header-wrapper">
            <div id="header">
                <div id="logo">
                    <h1><a href="#">Create Post {{Auth::user()->name}}</a></h1>
                    <p>Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a></p>
                </div>
            </div>
        </div>
@endsection('header')

    @section('content')
        <!-- end #header -->
            <div id="menu">
                <ul>
                    <li class="current_page_item"><a href="#">Home</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Photos</a></li>
                    <li><a href="/about">About</a></li>
                    <li><a href="#">Posts</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <!-- end #menu -->
            <div id="page">
                <div id="page-bgtop">
                    <div id="page-bgbtm">
                        @auth
                        <form method="POST" action="{{route('posts.store')}}">
                        @csrf
                            <label for="title">Title</label>
                            <input type="text" id="title" name="title" placeholder="Your Title Goes Here">

                            <label for="short">Short Description</label>
                            <input type="text" id="short" name="short" placeholder="Short Description for Post">

                            <label for="des">Description</label>
                            <textarea id="des" name="des" placeholder="Description goes here" style="height:200px"></textarea>
                            <div class="control ">
                            <label for=""tag> Tags For Your Article
                                <select
                                     name ="tags[]"
                                     multiple
                                    >
                                      @foreach($tags as $tag)
                                          <option value="{{$tag->id}}"> {{$tag->name}} </option>
                                      @endforeach
                                    </select>
                                </label>
                                @error('tags')
                                <p class="help is-danger">{{$message}}</p>
                            @enderror
                            </div>
                            <input type="submit" value="Create Post">
                        </form>
                        @elseguest
                            <p>Please login To Create Post</p>
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
