@extends('public.layout')
@section('content')
    <div class="col-sm-8 blog-main">

        <div class="blog-post">
            <form action="{{url('/file/upload')}}" enctype="multipart/form-data" method="post">
                {{ csrf_field() }}
                <label for=""><input type="text" name="title" autocomplete="off"/></label>
                <label for=""><input type="file" name="myfile" /></label>
                <input type="submit" />
            </form>
        </div><!-- /.blog-post -->

    </div><!-- /.blog-main -->
@endsection