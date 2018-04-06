@extends('layouts.app')

@section('content')
	<div class="row">
        <form id="form_mod" method="POST" action="">
            <div class='col l6 offset-l3 m10 offset-m1 s12'>
                <center><img src="{{ asset('img/safebox.svg') }}" style="height: 15rem;"></center>
            </div>

			<input type="hidden" name="accion" value="{{ $accion }}">
			<input type="hidden" name="_method" value="PUT">
			{!! csrf_field () !!}
			
            <div class='input-field col l6 offset-l3 m10 offset-m1 s12'>
				<div class="row">
					<div class="col s9">
						<select id="sel_ceuntas" name="cuenta">
							@foreach ($cuentas as $cuenta)
								<option value="{{ $cuenta->id }}">{{ $cuenta->numCuenta }}</option>	 
							@endforeach
						</select>
						<label for="sel_ceuntas">Cuentas:</label>
					</div>
					<div id="saldo" class="col s3 white-text ">
						<span class="new badge" style="height: 2rem;"><i class="material-icons">attach_money</i>{{ $saldo }}</span>
					</div>
				</div>
                
            </div>

			<div class='input-field col l6 offset-l3 m10 offset-m1 s12'>
				<input name="monto" id="monto" type="number" min="0.01" step="0.01" value="1">
          		<label for="monto">Monto a {{ ($accion == 1)? 'depositar' : 'retirar' }} ($)</label>
			</div>
			<div class='input-field col l6 offset-l3 m10 offset-m1 s12 center-align'>
				<button class="waves-effect waves-light btn white-text" type="submit">
                    {{ ($accion == 1)? 'Depositar' : 'Retirar' }}
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

		$('#sel_ceuntas').on('change',function(){
			$.get("{{ route('cuenta.saldo') }}", {'num_cuenta' : $(this).val()}, function(data){
				$("#saldo").html("<span class='new badge' style='height: 2rem;'>attach_money</i>" + data + "</span>");
			});
		});

		$("#form_mod").submit(function(){
			$.post("{{ route('cuentas.update', ['cuenta' => $accion]) }}", $(this).serialize(), function(data){
				// Si es un error
				if (data.error) {
					M.toast({html: data.msg})
				} else {
					$.get('{{ route("cuenta.saldo") }}', {'num_cuenta' : $('#sel_ceuntas').val(), "_token": "{{ csrf_token() }}" }, function(data){
						$("#saldo").html("<span class='new badge' style='height: 2rem;'><i class='material-icons'>attach_money</i>" + data + "</span>");
						M.toast({html: "Su nuevo saldo es de " + data + "$"})
					});
				}
			})
			return false;
		});

		$('select').formSelect();
	</script>
@endsection