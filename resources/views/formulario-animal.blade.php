@extends('principal')

	@section('titulo')
		<title>Cadastro</title>
	@stop
	@section('conteudo')
			<div class="container" style="text-align: center;">
				<h1>Cadastrar Animal</h1>
				<div class="small-12 columns">
					<form id="form" method="POST" action="/animais/adicionar-animal" enctype="multipart/form-data">
						<input type="hidden" name="_token" value=" {{csrf_token()}} ">
				
							<div class="small-12 medium-4 columns">
								<label>Nome do Animal</label>
								<input type="text" name="ani_nome">
							</div>

							<div class="small-12 medium-4 columns">
								<label>Raça</label>
								<input type="text" name="ani_raca">
							</div>
							<div class="small-12 medium-4 columns">
								<label>Peso (Kg)</label>
								<input type="text" name="ani_peso" >
							</div>
						
						<br/>
						<div class="row">
							<div class="small-12 medium-8 medium-offset-2 large-6 large-offset-3 columns end">
								<label>Descrição</label>
								<textarea type="text" name="ani_descricao"></textarea>
							</div>
						</div>
						
						<div class="append" style="text-align: center;">
							<input class="upload" id="files0" type="file" name="imgs[]" multiple>
							
						</div>	
						
						
						<div class="row">
							<div class="small-12 medium-8 medium-offset-2 large-6 large-offset-3 columns end">
							 	<output id="list"></output>
							</div>
						</div>
						<br/>
						<button type="submit" class="success button" name='submit_image'>Enviar</button>
					</form>
					@foreach($errors->all() as $error)	
						<div style="height: 30px; color: red;">
							{{$error}}
						</div>
					@endforeach
					
				</div>
			</div>
	@stop
	@section('scripts')
	<script type="text/javascript">
		
		var idCounter = 0;
			function addfield(af) {
				$(".upload").attr("style", " width: 0; visibility: hidden");
				var input = document.createElement("input");
				input.type = "file";
				input.id = "files" + af;
				input.name = "imgs[]";
				input.className = "upload";
				  // set the CSS class
				$(".append").append(input);	
				document.getElementById('files' + af).addEventListener('change', handleFileSelect, false);
				//++idCounter;
				alert(af);
				
	    	};
	
	function handleFileSelect(evt) {

		addfield(++idCounter);

    	var files = evt.target.files;

    // Loop through the FileList and render image files as thumbnails.
    	for (var i = 0, f; f = files[i]; i++) {

      // Only process image files.
     		if (!f.type.match('image.*')) {
        		continue;
      		}

		    var reader = new FileReader();

		     // Closure to capture the file information.
		     reader.onload = (function(theFile) {
		        return function(e) {
		          // Render thumbnail.
		          var span = document.createElement('span');
		          span.innerHTML = 
		          [
		            '<img style="height: 75px; border: 1px solid #000; margin: 5px" src="', 
		            e.target.result,
		            '" title="', escape(theFile.name), 
		            '"/>'
		          ].join('');
		          
		          document.getElementById('list').insertBefore(span, null);
		        };
		      })(f);

		      // Read in the image file as a data URL.
		      reader.readAsDataURL(f);
    	}
  	}

  	document.getElementById('files' + idCounter).addEventListener('change', handleFileSelect, false);

    </script>
	@stop
	