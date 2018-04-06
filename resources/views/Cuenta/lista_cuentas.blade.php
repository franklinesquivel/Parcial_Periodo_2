@extends('layouts.app')

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <form method="GET" action="cuentas.create">
        <input type="submit" value="Ingresar nueva cuenta">
    </form>
    <table class="table bordered centered">
        <tr class="red lighten-4 red-text text-darken-4">
            <th class="center">Numero de cuenta</th>
            <th class="center">Saldo</th>
            <th class="center">Action</th>
        </tr>
        @foreach($cuentas as $cuenta)
            <tr>
                <td>{{ $cuenta->numCuenta }}</td>
                <td>{{ $cuenta->saldo }}</td>
                <td>
                    <form id="{{$cuenta->id}}" action="{{ route("cuentas.destroy", $cuenta->id) }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE" />
                        <input type="button" value="Eliminar" onclick="confirmar({{$cuenta->id}})">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <script type="text/javascript">
        
        function confirmar(form) {
            var c = window.confirm('Seguro de desear borrar este usuario');
            console.log(form);
            if(c == true){
                document.getElementById(form).submit();
            }
        }

    </script>
@endsection