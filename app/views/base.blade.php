<!DOCTYPE html>
<html>
<head>
	<title>templating test</title>
	@section('head')
	<link rel="stylesheet" href="style.css" />
	@show
</head>
<body>
	@yield('body')
	<p>root template content</p>
</body>
</html>