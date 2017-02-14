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
						<div class="row">
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
						</div>
						<br/>
						<div class="row">
							<div class="small-12 medium-8 medium-offset-2 large-6 large-offset-3 columns end">
								<label>Descrição</label>
								<textarea type="text" name="ani_descricao"></textarea>
							</div>
						</div>
						<div class="row">
							<div class="small-12 medium-8 medium-offset-2 large-6 large-offset-3 columns end">
								<div id="targetElement"></div>
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
					<div class="row">
						<div class="small-12 medium-8 medium-offset-2 large-6 large-offset-3 columns end">
							 <div class="row" id="image_preview"></div>
						</div>
					</div>
				</div>
			</div>
	@stop
	@section('scripts')
	<script type="text/javascript">
    //get the form
    var form = document.getElementById('form');

    //disable form submit
    form.onsubmit = function(){
        return false;
    };

    //disable the submit button
    var submitBtn = form.querySelector("button[type=submit]");
    submitBtn.setAttribute("disabled", "disabled");

    //create the uploader
    var uploader = new RealUploader("#targetElement", {
        accept: "image/*",
        autoStart: false, //upload file automatically on select as GMAIL
        url: "upload.php",
        listeners: {
            //on upload end appends the file name to the form
            finish: function(fileNames) {

                //for each uploaded file add a hidden input to the form
                //with the file name. The remote path should be know only on server script
                console.log('Uploaded files are', fileNames);
                for(var i = 0; i<fileNames.length; i++) {
                    var input = document.createElement('input');
                    input.setAttribute('type', 'hidden');
                    input.setAttribute('name', 'files[]');
                    input.value = fileNames[i];
                    form.appendChild(input);
                }
                form.onsubmit = null;
                submitBtn.removeAttribute("disabled");
            }
        }
    });
    </script>
	@stop
	