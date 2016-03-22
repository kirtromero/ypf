<!DOCTYPE html>
<html>
<head>
    <title>Youpornflix.com</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" >

    <link rel="icon" href="{{ url('images/favicon.ico') }}" type="image/x-icon"/>
    <link rel="shortcut icon" href="{{ url('images/favicon.ico') }}" type="image/x-icon"/>

    <style>
    html, body {
        height: 100%;
    }
    body {
        margin: 0;
        padding: 0;
        width: 100%;
        color: #fff;
        font-weight: 400;
        background: #000;
    }
    a {
        color: #fff;
    }
    a:hover,
    .nav>li>a:focus,
    .nav>li>a:hover {
        color: #000;
        background: transparent;
    }
    .navbar {
        background: #df2027;
        border-radius: 0px;
    }
    h1 {
    	margin: 0px;
    	font-size: 25px;
    }
    h5 {
	    margin: 5px 0px;
	    font-weight: bold;
	    width: 100%;
	    text-overflow: ellipsis;
	    white-space: nowrap;
	    overflow: hidden;
	}
    .container {
        text-align: center;
        vertical-align: middle;
    }

    .content {
        text-align: center;
        display: inline-block;
    }

    .title {
        font-size: 96px;
    }
    .thumbs {
        float: left;
        width: 180px;
        margin: 0px 1px 1px 1px;
    }
    .thumbs:hover h5 {
        text-decoration: underline;
    }
    .navbar-brand {
        padding: 10px 10px;
    }
    .navbar-brand>img {
        width: 250px;
    }
    .navbar-toggle .icon-bar {
        background: #fff;
    }
    @media (max-width: 768px){
        .navbar-brand>img {
            width: 205px;
        }
        .thumbs {
            width: 49%;
        }
        .navbar-form {
            display: none;
        }
    }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="container-fluid">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ url('images/logo.png') }}" id="logo"></a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="/search/?sort=rated">Top Rated</a></li>
                    <li><a href="/search/?sort=date">New Videos</a></li>
                    <li><a href="/search/asian">Asian</a></li>
                    <li><a href="/search/amateur">Amateur</a></li>
                    <li><a href="/search/Lesbian">Lesbian</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <form class="navbar-form navbar-left" role="search">
	                    <div class="form-group">
	                        <input type="text" class="form-control" placeholder="Search">
	                    </div>
	                    <button type="submit" class="btn btn-default">Search</button>
	                </form>
                </ul>
            </div>
        </div>
    </nav>
    <div class="cleafix"></div>
    <div class="container-fluid">
    	@yield('content')
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>
