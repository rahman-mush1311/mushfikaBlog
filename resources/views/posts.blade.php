@extends('layout')

@section('header')
    <div id="wrapper">
        <div id="header-wrapper">
            <div id="header">
                <div id="logo">
                    <h1>Indiviual Post Section  </h1>
                </div>
            </div>
        </div>
@endsection
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
                        <div id="content">
                                <div class="post">
                                    <h2 class="title">{{$posts->title}}</h2>
                                    <p class="meta"  > Posted By:&nbsp <strong>{{$posts->user->name}}</strong> </p>
                                       <!-- &nbsp;&bull;&nbsp; <a href="#" class="comments"></a> &nbsp;&bull;&nbsp; -->
                                    <div class="entry">
                                        <p><img src="{{asset('/images/img03.jpg')}}" width="186" height="186" alt="" class="alignleft border" /> </p>
                                        @foreach($posts->tag as $tags)
                                        <p>{{$tags->name}}</p>
                                        @endforeach
                                        @if(Auth::user()->id == $posts->user->id)
                                            <p>Delete Button will be places here</p>
                                        @endif
                                    </div>
                                </div>


                            <div style="clear: both;">&nbsp;</div>
                            <div class="container">
                                <hr>
                                @auth
                                    <comments>
                                        comment section
                                    </comments>
                            </div>
                                 <hr>
                            <div>
                                <form method="POST" action="">
                                    @csrf
                                    <label for="comment">POSTS COMMENTS</label>
                                    <br>
                                    <textarea rows="3" cols="80" name="comment"> </textarea>
                                    <br>
                                    <input type="submit" value="Insert Comment">
                                </form>
                                @endauth
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
