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
						<a id= "<?= $a->id ?>" onClick="retornarId(this.id)">
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

			
			<div class="reveal" id="exampleModal1" data-reveal>
				<div class="row">
					<div id="h3" class="small-12 columns" style="text-align: center;">
	
					</div>
				</div>
				<figure id="slide">
		
				</figure>
  				<a class="close-button" data-close aria-label="Close modal" type="button" onclick="clearModal()">
    				<span style="background: #fff;" aria-hidden="true">&times;</span>
  				</a>
  			</div>
  		
		@section('scripts')
			<script type="text/javascript">
			function slide() {
					if($(".ativo").next().size()){
						$(".ativo").fadeOut().removeClass("ativo").next().fadeIn().addClass("ativo");
					}else {
						//se não, irá retornar ao estado inicial do slide
						$(".ativo").fadeOut().removeClass("ativo");
						$("#slide img:eq(0)").fadeIn().addClass("ativo");
					}
				    
				}
				setInterval(slide,5000);
			var popup = new Foundation.Reveal($('#exampleModal1'));
				function retornarId(clicked_id){
		    		$.ajax({
			            type:'POST',		
			            data: {'clicked_id': clicked_id},
			            url:'animais/ver-animal',
			            cache:false,
			            success :function(result) {
			            	var jsondata=JSON.parse(JSON.stringify(result));
	    					var id = jsondata['animal']['id'];
	    					var nome = jsondata['animal']['ani_nome'];
	    					var raca = jsondata['animal']['ani_raca'];
	    					var peso = jsondata['animal']['ani_peso'];
	    					var descricao = jsondata['animal']['ani_descricao'];

	    					$('#h3').append($('<h3>Nome: '+ nome +'</h3>'));
	    					$('#h3').append($('<p>Peso: '+ peso +'</p>'));
	    					$('#h3').append($('<p>Raça: '+ raca +'</p>'));
	    					$('#h3').append($('<p>Descrição: '+ descricao +'</p>'));
	    						
      						
	    					for (var i = jsondata['images'].length - 1; i >= 0; i--) {
	    						//if (i = 1) {
	    							//$('#slideshow').append($('<img class="active"  src="'+ jsondata['images'][i][0]['img'] +'">'));
	    						//}else{
	    							$('#slide').append($('<img src="'+ jsondata['images'][i][0]['img'] +'">'));
	    						//}
	    					}
	    						 
	    					popup.open();
	    					$("#slide img:eq(0)").addClass("ativo").show();
	    					

	  					},
	  					error: function(e) {
	    					console.log(e.responseText);
	  					}
			                
	            	});
				}
				
				function clearModal(){
					 $('#exampleModal1').find("p").remove();
					 $('#exampleModal1').find("img").remove();
					 $('#exampleModal1').find("h3").remove();
			
					popup.close();

				}
				var modal = document.getElementById('#exampleModal1');

				var buscaTm = null;
    			$(document).on('click', function(e) {
        			$('#exampleModal1').find("p").remove();
        			$('#exampleModal1').find("img").remove();
        			$('#exampleModal1').find("h3").remove();
					popup.close();
    			});

    			$("#exampleModal1, .reveal > * ").on('click', function(e) {
        			e.stopPropagation();
    			});

			</script>
			<script>
	    		$(document).ready(function(){
	    			$(document).foundation();
	    			
	    		});
	    	</script>
	    @stop
	@stop
