<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>@yield('title')</title>
	<link rel="stylesheet" href="/css/master.css">
</head>

<body >
	<header>
		<nav>
			<a href="/">Home</a>
			<a href="/AcakKata">Mulai Game</a>
		</nav>
	</header>
	<br>
		@yield('content')

	<br>
	<div class="footer">
		<p>
			&copy;Game Acak Kata 2018
		</p>
	</div>	

</body>
</html>