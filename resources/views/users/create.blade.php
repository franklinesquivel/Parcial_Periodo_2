@include('../layouts/app')
@section('content')
    <div class="row">
        <form method='POST' action="{{ route("cuentas.store") }}">
            {{ csrf_field() }}
            <div class="input-field col l6 offset-l3 m10 offset-m1 s12">
                <input placeholder="Placeholder" id="nombre" type="text" name="nombre">
                <label for="nombre">Nombre</label>
            </div>
            <div class="input-field col l6 offset-l3 m10 offset-m1 s12">
                <input placeholder="Placeholder" id="apellido" type="text" name="apellido">
                <label for="apellido">Apellido</label>
            </div>
            <div class="input-field col l6 offset-l3 m10 offset-m1 s12">
                <input type="text" class="datepicker" name="fechaNacimiento">
                <label for="apellido">Fecha de Nacimiento</label>
            </div>
            <div class="input-field col l6 offset-l3 m10 offset-m1 s12">
                <input placeholder="Placeholder" id="dui" type="text" name="dui">
                <label for="dui">DUI [00000000-0]</label>
            </div>
            <div class="input-field col l6 offset-l3 m10 offset-m1 s12">
                <input placeholder="Placeholder" id="email" type="text" name="email">
                <label for="email">Email</label>
            </div>
            <div class="input-field col l6 offset-l3 m10 offset-m1 s12">
                <input placeholder="Placeholder" id="password" type="text" name="password">
                <label for="password">Contraseña</label>
            </div>
            <div class="input-field col l6 offset-l3 m10 offset-m1 s12">
                <input placeholder="Placeholder" id="telefono" type="text" name="telefono">
                <label for="telefono">Telefono</label>
            </div>
            <div class="input-field col l6 offset-l3 m10 offset-m1 s12">
                <textarea id="direccion" class="materialize-textarea" name="direccion"></textarea>
                <label for="direccion">Dirección</label>
            </div>
            <div class="input-field col l6 offset-l3 m10 offset-m1 s12">
                <select name="tipoUsuario">
                    @foreach ($tipoUsuarios as $tipos)
						<option value="{{ $tipos->id }}">{{ $tipos->name }}</option>	 
					@endforeach
                </select>
                <label>Tipo de Usuario</label>
            </div>
            <div class="input-field col l6 offset-l3 m10 offset-m1 s12">
                <select name="departamento" id="departamento">
                    @foreach ($departamentos as $departamento)
						<option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>	 
					@endforeach
                </select>
                <label>Departamento</label>
            </div>
            <div class="input-field col l6 offset-l3 m10 offset-m1 s12">
                <select name="municipio" id="municipio">

                </select>
                <label>Municipio</label>
            </div>
            <div class="input-field col l6 offset-l3 m10 offset-m1 s12">
            </div>
            <div class="input-field col l6 offset-l3 m10 offset-m1 s12 center-align">
                <button class="waves-effect waves-light btn" type="submit">Registrar</button>
            </div>  
        </form>
    </div>
    <script>
        $('#departamento').change(function(){
            $.ajax({
                type: 'POST',
                url: '/departamentos',
                data: $(this).val(),
                success: function(r){
                    console.log(r);
                }
            });
        });
    </script>
@endsection