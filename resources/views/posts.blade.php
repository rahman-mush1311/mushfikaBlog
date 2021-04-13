@extends('layout')

@section('header')
    <div id="wrapper">
        <div id="header-wrapper">
            <div id="header">
                <div id="logo">
                    @auth
                    <h1>Indiviual Post Section  </h1>
                    @elseguest
                        <h1><a href="#">Hi Guest, Please Sign in </a></h1>
                        <p>By clicking home you will be redirected to loginpage <a> </a></p>
                    @endauth
                </div>
            </div>
        </div>
@endsection
@section('content')
        <!-- end #header -->
            <div id="menu">
                <ul>
                    <li class="current_page_item"><a href="/home">Home</a></li>
                  <!--  <li><a href="#">Blog</a></li>
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
                                <div class="post">
                                    <h2 class="title">{{$posts->title}}</h2>
                                    <p class="meta"  > Posted By:&nbsp <strong>{{$posts->user->name}}</strong> </p>
                                       <!-- &nbsp;&bull;&nbsp; <a href="#" class="comments"></a> &nbsp;&bull;&nbsp; -->
                                    <div class="entry">
                                        <p><img src="{{asset('/images/img03.jpg')}}" width="186" height="186" alt="" class="alignleft border" /> </p>
                                        @foreach($posts->tag as $tags)
                                        <p>{{$tags->name}}</p>
                                        @endforeach
                                        @auth
                                        @if(Auth::user()->id == $posts->user->id)
                                            <p>Delete Button will be places here</p>
                                        @endif
                                        @endauth
                                    </div>
                                </div>


                            <div style="clear: both;">&nbsp;</div>
                            <div class="container">
                                <hr>
                                @auth
                                    <p> <strong>Comment Section</strong></p>
                                    <hr>
                                    @foreach($comment as $comments)
                                    <comments>
                                        <strong> {{$comments->name}} </strong>&nbsp commented &nbsp; {{$comments->comment}}
                                    </comments>
                                    @endforeach
                            </div>
                                 <hr>
                            <div>
                                <form method="POST" action="{{url('save_comment',$posts->id)}}">
                                    @csrf
                                    <label for="comment">POSTS COMMENTS</label>
                                    <br>
                                    <textarea rows="3" cols="80" name="comment_box"> </textarea>
                                    <br>
                                    <input type="submit" value="Insert Comment">
                                </form>
                                @elseguest
                                    <p>Please Sign in to Post Comments</p>
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
