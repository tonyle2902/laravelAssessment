<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" >
	<title>Laravel</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/style.css') }}" rel="stylesheet">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{ asset('/') }}">Home</a>
                                @if(!Auth::guest())
                                    <a class="navbar-brand" href="{{ asset('showBooksPage') }}">Books List</a>
                                    @if(Auth::user()->role == 'admin')
                                        <a class="navbar-brand" href="{{ asset('addBooks') }}">Add more books</a>
                                    @endif
                                @endif
                                
                                
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				
                                
				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="{!! route('loginPage') !!}">Login</a></li>
						<li><a href="{!! route('registerPage') !!}">Register</a></li>
					@else 
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{!! route('logout') !!}">Logout</a></li>
							</ul>
						</li>
                                                @yield('barcontent')
					@endif
				</ul>
			</div>
		</div>
	</nav>

	@yield('content')

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>
        @yield('script')

</body>
</html>
