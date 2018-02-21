<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>PhotoShow</title>
	<link rel="stylesheet" type="text/css" href="/css/app.css">
</head>
<body>
	@include('inc.navbar')
	<br>
	
	<div class="container">
		@include('inc.messages')
		@yield('content')
	</div>
</body>
</html>