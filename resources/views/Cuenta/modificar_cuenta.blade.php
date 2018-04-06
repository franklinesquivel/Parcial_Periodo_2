@extends('layouts.app')

@section('content')
	<div class="row">
        <form method="POST" action="{{-- route('cuentas.update') --}}">
            <div class='col l6 offset-l3 m10 offset-m1 s12'>
                <center><img src="{{ asset('img/safebox.svg') }}" style="height: 15rem;"></center>
            </div>

            <div class='input-field col l6 offset-l3 m10 offset-m1 s12'>
                <select name="usuario">
                    @foreach ($cuentas as $cuenta)
                        <option value="{{ $cuenta->numCuenta }}">{{ $cuenta->numCuenta }}</option>	 
                    @endforeach
                </select>
                <label>Cuentas:</label>
            </div>

			<div class='input-field col l6 offset-l3 m10 offset-m1 s12'>
				<input name="cuenta" id="numCuenta" type="text" value="{{ $cuenta->numCuenta }}">
          		<label for="numCuenta">Número de Cuenta</label>
			</div>
			<div class='input-field col l6 offset-l3 m10 offset-m1 s12'>
				<input name="monto" id="monto" type="text">
          		<label for="monto">Monto a depositar ($)</label>
			</div>
			<div class='input-field col l6 offset-l3 m10 offset-m1 s12 center-align'>
				<button class="waves-effect waves-light btn">
                    Depositar
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
			$('select').formSelect();
	</script>
@endsection