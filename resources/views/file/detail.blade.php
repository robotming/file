@extends('public.layout')
@section('title')
    <h1 class="blog-title">{{ $detail['title'] }}</h1>
    <p class="lead blog-description">简介</p>
@endsection
@section('content')
    <div class="blog-post">
        <img src="/files/{{ $detail['file_path'] }}" alt="" width="300" height="200" />
    </div><!-- /.blog-post -->
@endsection
@section('right')
    <div class="sidebar-module sidebar-module-inset">
        <h4>About</h4>
        <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
    </div>
    <div class="sidebar-module">
        <h4>Archives</h4>
        <ol class="list-unstyled">
            <li><a href="https://v3.bootcss.com/examples/blog/#">March 2014</a></li>
        </ol>
    </div>
    <div class="sidebar-module">
        <h4>Elsewhere</h4>
        <ol class="list-unstyled">
            <li><a href="https://v3.bootcss.com/examples/blog/#">GitHub</a></li>
        </ol>
    </div>
@endsection