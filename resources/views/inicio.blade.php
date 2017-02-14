@extends('principal')
	@section('titulo')
	<title>Bem-Vindo</title>
	@stop
@section('conteudo')
	<div class="small-12 columns" style="text-align: center;">
	  @if (Auth::guest())
    <p>Usuário não logado</p>
    <a class="button secondary" href="logar">Logar</a><br/><br/>
  @else
  	<div class="small-12 columns">
	  	<p>{{ Auth::user()->name }}</p>
	    <a href="/auth/logout">Logout</a>
	    <br/>
	    <br/>
  	</div>
    
  @endif
		<div class="small-12 medium-8 medium-offset-2 large-6 large-offset-3 columns end">
			<div style="display: flex; vertical-align: middle; justify-content: center;">
				<a href="/animais" class="button success" style="margin-right: 30px;">Ver Todos</a><br/>
				<a class="button alert" href="register">Cadastre-se</a><br/>
			</div>
		</div>
	</div>

	
@stop
