@extends('principal')

	@section('titulo')
		<title>Todos os Animais</title>
	@stop
	@section('conteudo')
			<div class="container" style="text-align: center;">
				<h1>Lista de Animais</h1>
				<div class="small-12 columns">
					<table class="table">
				@foreach($animals as $a)
					<tr {{$a->ani_peso}}>
						<td>{{$a->ani_nome}}</td>
						<td>{{$a->ani_descricao or 'não tem descrição'}}</td>
						<td>{{$a->ani_peso}}</td>
						<td>{{$a->ani_raca}}</td>
						<td>	
						<a href="/animais/ver-animal/<?= $a->id ?>">
							<span class='fa fa-search-plus'></span>
						</a>	
						</td>
						<td>	
						<a href="/animais/remover-animal/<?= $a->id ?>">
							<span class='fa fa-trash'></span>
						</a>	
						</td>
					</tr>
					@endforeach
					</table>
					<a class="button" href="/animais/novo-animal">Novo Animal</a>
					@if(old('ani_nome'))
						<br/>
						<div>Animal {{old('ani_nome')}} adicionado com sucesso!</div>
					@endif
				</div>
			</div>
	@stop