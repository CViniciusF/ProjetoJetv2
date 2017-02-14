@extends('principal')

    @section('titulo')
        <title>Faça Login</title>
    @stop
    @section('conteudo')
<div class="container">
    <div class="small-12 columns">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Faça seu Cadastro</div>
                <div class="panel-body">
                    <form role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="small-12 medium-8 medium-offset-2 large-6 large-offset-3 columns end">Nome</label>

                            <div class="small-12 medium-8 medium-offset-2 large-6 large-offset-3 columns end">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="small-12 medium-8 medium-offset-2 large-6 large-offset-3 columns end">E-Mail</label>

                            <div class="small-12 medium-8 medium-offset-2 large-6 large-offset-3 columns end">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="small-12 medium-8 medium-offset-2 large-6 large-offset-3 columns end">Senha</label>

                            <div class="small-12 medium-8 medium-offset-2 large-6 large-offset-3 columns end">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="small-12 medium-8 medium-offset-2 large-6 large-offset-3 columns end">Confirmar Senha</label>

                            <div class="small-12 medium-8 medium-offset-2 large-6 large-offset-3 columns end">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="small-12 medium-8 medium-offset-2 large-6 large-offset-3 columns end">
                                <button type="submit" class="button">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('scripts')
<script type="text/javascript">
        
</script>
@stop
