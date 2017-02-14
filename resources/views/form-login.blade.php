@extends('principal')

	@section('titulo')
		<title>Faça Login</title>
	@stop
	@section('conteudo')
			<div class="container" style="text-align: center;">
				<h1>Login</h1>
				<div class="row">
					<div class="small-12 columns">
						<form method="POST" action="/logar">
							<input type="hidden" name="_token" value=" {{csrf_token()}} ">
							<div class="small-12 medium-8 medium-offset-2 large-6 large-offset-3 columns end">
								<label>Email</label>
								<input type="text" name="email">
							</div>
							<div class="small-12 medium-8 medium-offset-2 large-6 large-offset-3 columns end">
								<label>Senha</label>
								<input type="password" name="password">
							</div>
							<div class="small-12 medium-8 medium-offset-2 large-6 large-offset-3 columns end">
								<button type="submit" class="success button">Adicionar</button>
							</div>
						</form>
					</div>
				</div>
				<br/>	
				@foreach($errors->all() as $error)	
					<div style="height: 30px; color: red;">
						{{$error}}
					</div>
				@endforeach
			</div>
	@stop
	@section('scripts')
	<script type="text/javascript">
		
	</script>
	@stop
	