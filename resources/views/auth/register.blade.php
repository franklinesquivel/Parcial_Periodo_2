@extends('layouts.app')

@section('content')
<div class="row">
    <h2 class="center-align">Registrar</h2>

        <form class="" method="POST" action="{{ route("users.store") }}">
            {{ csrf_field() }}
            <div class="input-field col l8 offset-l2 m10 offset-m1 s12">
                <input id="nombre" type="text" name="nombre">
                <label for="nombre">Nombre</label>
            </div>
            <div class="input-field col l8 offset-l2 m10 offset-m1 s12">
                <input id="apellido" type="text" name="apellido">
                <label for="apellido">Apellido</label>
            </div>
            <div class="input-field col l8 offset-l2 m10 offset-m1 s12">
                <input type="date" id="fechaNac" name="fechaNac">
                <label for="fechaNac">Fecha de Nacimiento</label>
            </div>
            <div class="input-field col l8 offset-l2 m10 offset-m1 s12">
                <input id="dui" type="text" name="dui">
                <label for="dui">DUI [00000000-0]</label>
            </div>
            <div class="input-field col l8 offset-l2 m10 offset-m1 s12">
                <input id="email" type="text" name="email">
                <label for="email">Email</label>
            </div>  
            <div class="input-field col l8 offset-l2 m10 offset-m1 s12">
                <input id="telefono" type="text" name="telefono">
                <label for="telefono">Telefono</label>
            </div>
            <div class="input-field col l8 offset-l2 m10 offset-m1 s12">
                <textarea id="direccion" class="materialize-textarea" name="direccion"></textarea>
                <label for="direccion">Dirección</label>
            </div>
            <div class="input-field col l8 offset-l2 m10 offset-m1 s12">
                <select name="tipoUsuario">
                    @foreach ($tiposUsuarios as $tipos)
                        <option value="{{ $tipos->id }}">{{ $tipos->nombre }}</option>	 
                    @endforeach
                </select>
                <label>Tipo de Usuario</label>
            </div>
            <div class="input-field col l8 offset-l2 m10 offset-m1 s12">
                <select name="departamento" id="departamento">
                    @foreach ($departamentos as $departamento)
                        <option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>	 
                    @endforeach
                </select>
                <label>Departamento</label>
            </div>
            <div class="input-field col l8 offset-l2 m10 offset-m1 s12">
                <select name="municipio" id="municipio">

                </select>
                <label>Municipio</label>
            </div>
            <div class="input-field col l8 offset-l2 m10 offset-m1 s12">
                <label for="password">Contraseña</label>
                <input id="password" type="password" class="form-control" name="password" required>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="input-field col l8 offset-l2 m10 offset-m1 s12 center-align">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Registrar
                        </button>
                </div>
            </div>
    </form>
</div>
<div class="row">
	@if(Session::has('message'))
        <p class="center-align">{{ Session::get('message') }}</p>
    @endif
</div>
<script>
    $('select').formSelect();
    $('.datepicker').datepicker();
    var elem = document.querySelector('select');
    var instance = M.FormSelect.init(elem);
    $('#departamento').change(function(){
        $.ajax({
            type: 'GET',
            url: "/departamentos/"+ $(this).val() +"",
            data: {id: $(this).val()},
            success: function(r){
                let option = ``;
                try{
                    for(var i = 0; i < r.length; i++){
                        option += `<option value='${r[i].id}'> ${r[i].nombre} </option>`;
                    }
                    $('#municipio').html(option);
                    var elem = document.querySelector('#municipio');
                    var instance = M.FormSelect.init(elem);
                }catch(err){
                    console.log('Error');
                }
            }
        });
    });
</script>
@endsection
