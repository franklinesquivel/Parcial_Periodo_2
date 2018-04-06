@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                <form method="POST" class="row" action="{{ url('/login') }}">
                    {{ csrf_field() }}

                    <div class="input-field col s12 {{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email">Correo Electrónico</label>
                        <input id="email" type="email" class="" name="email" value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                            <span class="error-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="input-field col s12 {{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password">Contraseña</label>
                        <input id="password" type="password" class="" name="password" required>

                        @if ($errors->has('password'))
                            <span class="error-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                        @endif
                    </div>

                    <div class="col s12">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="filled-in" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <span>Recuérdame</span>
                            </label>
                        </div>
                    </div>

                    <div class="col s12 submitBtns" style="display: flex; justify-content: center;">
                        <button type="submit" class="btn waves-effect waves-light">
                            Iniciar Sesión
                        </button>   
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
