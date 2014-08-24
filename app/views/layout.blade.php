<html>
	<head>
		<title>
			@yield('title', 'Dan\'s Laravel Quickstart')
		</title>
		<link rel="stylesheet" href="/css/styles.css" />
	</head>
	<body>
		<div class="container">
			<h1>Dan's Laravel Quickstart</h1>
			<div class="headCont">
				<div class="headRight">
					@if (Auth::check())
						You're logged in <a href="{{ route('editAccount') }}">{{ Auth::user()->name }}</a>!  
						<a href="{{ route('logout') }}">Logout</a>
					@elseif (!Request::is('login'))
						You're not logged in.  <a href="{{ route('loginForm') }}">Login</a>
					@endif
				</div>
				<div class="headLeft">
					<ul class="navbar">
					<?php
						$pages = Page::all();
						foreach($pages as $page) 
							echo '<li><a href="/'.$page->slug.'">'.$page->title.'</a></li>';
					?>
					</ul>
				</div>
			</div>
			@yield('content')
		</div>
	</body>
</html>