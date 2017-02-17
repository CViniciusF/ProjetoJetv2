<!DOCTYPE html>
<html>
	<head>
		<base href="http://localhost:8000/">
		<link rel="stylesheet" href="/css/font-awesome.min.css">
		<link rel="stylesheet" href="/css/app.css">
		<link rel="stylesheet" type="text/css" href="css/foundation.css">
		<meta name="_token" content="{!! csrf_token() !!}"/>
		@yield('titulo')
	</head>
	<body>
		@yield('conteudo')
		<script src="js/jquery.js"></script>
		<script src="js/foundation.js"></script>
		<script src="js/what-input.js"></script>
		<script type="text/javascript">
			$.ajaxSetup({
   				headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
			});
		</script>
		@yield('scripts')
	</body>
</html>