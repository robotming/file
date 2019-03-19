@extends('public.layout')
@section('title')
    <h1 class="blog-title">列表</h1>
    <p class="lead blog-description">简介</p>
@endsection
@section('content')
    <div class="blog-header">
        <h1 class="blog-title">112</h1>
        <p class="lead blog-description"></p>
    </div>

    <div class="row">

        <div class="col-sm-8 blog-main">

            <div class="blog-post">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>time</th>
                            <th>==</th>
                        </tr>
                        </thead>
                        <thead>
                        @foreach($list as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td><a href="/files/{{ $item->file_path }}" target="_blank">{{ $item->file_name }}</a></td>
                                <td>{{ $item->storage_time }}</td>
                                <td><a href="{{ url('/file/detail', ['id' => $item->id]) }}" target="_blank">查看</a></td>
                            </tr>
                        @endforeach
                        </thead>
                    </table>
                </div>
            </div><!-- /.blog-post -->
            <nav>
                <ul class="pager">
                    <li><a href="{{ url('/file/list') }}?page={{ $page <= 1 ? 1 : abs($page - 1) }}">Previous</a></li>
                    <li><a href="{{ url('/file/list') }}?page={{ abs($page + 1) }}">Next</a></li>
                </ul>
            </nav>
        </div><!-- /.blog-main -->

    </div><!-- /.row -->
@endsection