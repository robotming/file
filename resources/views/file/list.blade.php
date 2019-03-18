<!DOCTYPE html>
<!-- saved from url=(0037)https://v3.bootcss.com/examples/blog/ -->
<html lang="zh-CN"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://v3.bootcss.com/favicon.ico">

    <title>Blog Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="{{ asset('/css/ie10-viewport-bug-workaround.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('/css/blog.css') }}" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="{{ asset('/js/ie8-responsive-file-warning.js') }}"></script><![endif]-->
    <script src="{{ asset('/js/ie-emulation-modes-warning.js') }}"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="{{ asset('/public/js/html5shiv.min.js') }}"></script>
    <script src="{{ asset('/public/js/respond.min.js') }}"></script>
    <![endif]-->
</head>

<body>

<div class="blog-masthead">
    <div class="container">
        <nav class="blog-nav">
            <a class="blog-nav-item active" href="/">Home</a>
        </nav>
    </div>
</div>

<div class="container">

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
                        </tr>
                        </thead>
                        <thead>
                        @foreach($list as $item)
                        <tr><td>{{ $item->id }}</td><td><a href="/files/{{ $item->file_path }}" target="_blank">{{ $item->file_name }}</a></td><td>{{ $item->storage_time }}</td></tr>
                        @endforeach
                        </thead>
                    </table>
                </div>
            </div><!-- /.blog-post -->
            <nav>
                <ul class="pager">
                    <li><a href="https://v3.bootcss.com/examples/blog/#">Previous</a></li>
                    <li><a href="https://v3.bootcss.com/examples/blog/#">Next</a></li>
                </ul>
            </nav>
        </div><!-- /.blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
            <div class="sidebar-module sidebar-module-inset">
                <h4>About</h4>
                <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
            </div>
            <div class="sidebar-module">
                <h4>Archives</h4>
                <ol class="list-unstyled">
                    <li><a href="https://v3.bootcss.com/examples/blog/#">March 2014</a></li>
                    <li><a href="https://v3.bootcss.com/examples/blog/#">February 2014</a></li>
                    <li><a href="https://v3.bootcss.com/examples/blog/#">January 2014</a></li>
                    <li><a href="https://v3.bootcss.com/examples/blog/#">December 2013</a></li>
                    <li><a href="https://v3.bootcss.com/examples/blog/#">November 2013</a></li>
                    <li><a href="https://v3.bootcss.com/examples/blog/#">October 2013</a></li>
                    <li><a href="https://v3.bootcss.com/examples/blog/#">September 2013</a></li>
                    <li><a href="https://v3.bootcss.com/examples/blog/#">August 2013</a></li>
                    <li><a href="https://v3.bootcss.com/examples/blog/#">July 2013</a></li>
                    <li><a href="https://v3.bootcss.com/examples/blog/#">June 2013</a></li>
                    <li><a href="https://v3.bootcss.com/examples/blog/#">May 2013</a></li>
                    <li><a href="https://v3.bootcss.com/examples/blog/#">April 2013</a></li>
                </ol>
            </div>
            <div class="sidebar-module">
                <h4>Elsewhere</h4>
                <ol class="list-unstyled">
                    <li><a href="https://v3.bootcss.com/examples/blog/#">GitHub</a></li>
                    <li><a href="https://v3.bootcss.com/examples/blog/#">Twitter</a></li>
                    <li><a href="https://v3.bootcss.com/examples/blog/#">Facebook</a></li>
                </ol>
            </div>


        </div><!-- /.blog-sidebar -->

    </div><!-- /.row -->

</div><!-- /.container -->

<footer class="blog-footer">
    <p>Blog template built for <a href="http://getbootstrap.com/">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
    <p>
        <a href="https://v3.bootcss.com/examples/blog/#">Back to top</a>
    </p>
</footer>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ asset('/js/jquery.min.js') }}"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="{{ asset('/js/ie10-viewport-bug-workaround.js') }}"></script>


</body></html>