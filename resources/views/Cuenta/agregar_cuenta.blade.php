@extends('layouts.app')

@section('content')
	<div class="row">
		<form method="POST" action="{{ route('cuentas.store') }}">
			<div class='input-field col l6 offset-l3 m10 offset-m1 s12'>
				<select name="usuario">
			     	@foreach ($usuarios as $usuario)
						<option value="{{ $usuario->id }}">{{ $usuario->dui }}</option>	 
					@endforeach
    			</select>
				<label>Usuario</label>
			</div>
			<div class='input-field col l6 offset-l3 m10 offset-m1 s12'>
				<input name="cuenta" id="numCuenta" type="text">
          		<label for="numCuenta">Número de Cuenta</label>
			</div>
			<div class='input-field col l6 offset-l3 m10 offset-m1 s12'>
				<input name="monto" id="monto" type="text">
          		<label for="monto">Monto Inicial ($)</label>
			</div>
			<div class='input-field col l6 offset-l3 m10 offset-m1 s12 center-align'>
				<button class="waves-effect waves-light btn">
					Registrar
				</button>
			</div>
		</form>
	</div>
	<div class="row">
		@if(Session::has('message'))
            <p class="center-align">{{ Session::get('message') }}</p>
        @endif
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$('select').formSelect();
		});
	</script>
@endsection