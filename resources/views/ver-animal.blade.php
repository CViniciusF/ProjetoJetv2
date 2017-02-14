@extends('principal')

	@section('titulo')
		<title>Ver Animal</title>
	@stop

	@section('conteudo')
			<div class="container" style="text-align: center;">
				<h3>Visualizando animal {{$a->ani_nome}}</h3>
				<div class="row">
					<div class="small-12 columns">
						<ul>
							<li>
								{{$a->ani_descricao}}
							</li>
							<li>
								{{$a->ani_peso}}
							</li>
							<li>
								{{$a->ani_raca}}
							</li>
						</ul>
					</div>
				</div>
			</div>
	@stop