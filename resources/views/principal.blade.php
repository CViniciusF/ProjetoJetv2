<!DOCTYPE html>
<html>
	<head>
		<base href="http://localhost:8000/">
		<link rel="stylesheet" href="/css/font-awesome.min.css">
		<link rel="stylesheet" href="/css/app.css">
		<link rel="stylesheet" type="text/css" href="css/foundation.css">
		@yield('titulo')
	</head>
	<body>
		@yield('conteudo')
		<script src="js/jquery.js"></script>
		<script src="js/foundation.js"></script>
		<script src="js/what-input.js"></script>
		@yield('scripts')
	</body>
</html>