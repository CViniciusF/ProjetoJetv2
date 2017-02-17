@extends('principal')

	@section('titulo')
		<title>Ver Animal</title>
	@stop

	@section('conteudo')
		<div class="container">
			<br/>
			<div class="row">
				<div class="small-12 columns">
					<div class="small-12 medium-8 medium-offset-2 large-6 large-offset-3 columns end">
						<h4 style="text-align: center;">Editando animal {{$a->ani_nome}}</h4>
					</div>
				</div>
			</div>
			<form method="post" action="/animais/updateAnimal">
				<div class="row">
					<div class="small-12 columns">
						<div class="small-12 medium-8 medium-offset-2 large-6 large-offset-3 columns end">
							<input type="hidden" name="_token" value=" {{csrf_token()}} ">
							<input type="hidden" name="id" value="{{$a->id}}">
							<label>Nome do animal:</label>
							<input type="text" name="ani_nome" value="{{$a->ani_nome}}">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="small-12 columns">
						<div class="small-12 medium-8 medium-offset-2 large-6 large-offset-3 columns end">
							<label>Descrição:</label>
							<textarea type="text" name="ani_descricao">{{$a->ani_descricao}}</textarea>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="small-12 columns">
						<div class="small-12 medium-8 medium-offset-2 large-6 large-offset-3 columns end">
							<label>Peso (Kg):</label>
							<input type="text" name="ani_peso" value="{{$a->ani_peso}}">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="small-12 columns">
						<div class="small-12 medium-8 medium-offset-2 large-6 large-offset-3 columns end">
							<label>Raça:</label>
							<input type="text" name="ani_raca" value="{{$a->ani_raca}}">
						</div>
					</div>
				</div>
				<div class="row" style="text-align: center;">
					<div class="small-12 columns">
						<div class="small-12 medium-8 medium-offset-2 large-6 large-offset-3 columns end">
							<button type="submit" class="success button">Atualizar animal</button>
						</div>
					</div>
				</div>
			</form>
			<div class="reveal" id="exampleModal2" data-reveal>
				  <img id="modalImage" src="" width="100%" height="100%">
				  <a class="close-button" data-close aria-label="Close modal" type="button">
    				<span style="background: transparent;" aria-hidden="true">&times;</span>
  				</a>
  			</div>
			<div class="row" style="text-align: center;">
				<div class="small-12 columns">
					<div class="small-12 medium-8 medium-offset-2 large-6 large-offset-3 columns end">
						@foreach($images as $imgformatada)
					  		<img class="thumba" id="{{$imgformatada['id']}}" onclick="openModal(this.id);" src="{{$imgformatada['img']}}">
						@endforeach
					</div>
				</div>
			</div>		
			@foreach($errors->all() as $error)	
				<div style="height: 30px; color: red;">
					{{$error}}
				</div>
			@endforeach
		</div>
		@section('scripts')
			<script type="text/javascript">
				var popup = new Foundation.Reveal($('#exampleModal2'));
				function openModal(clicked_id){
					$('#modalImage').attr('src', $('#'+clicked_id).attr('src'));
					popup.open();
				}
			</script>
			<script>
	    		$(document).ready(function(){
	    			$(document).foundation();	
	    		});
	    	</script>
		@stop
				
	@stop