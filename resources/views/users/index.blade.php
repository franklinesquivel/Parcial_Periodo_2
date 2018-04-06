@extends('layouts.app')
@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table bordered centered">
        <tr class="red lighten-4 red-text text-darken-4">
            <th class="center">DUI</th>
            <th class="center">E-mail</th>
            <th class="center">Nombre</th>
            <th class="center">Apellido</th>
            <th class="center" colspan="1">Action</th>
        </tr>
    @foreach ($users as $user)
        @if( auth()->user()->id != $user->id)
            <tr>
                <td>{{ $user->dui }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->nombre }}</td>
                <td>{{ $user->apellido }}</td>
                <td>
                    <form action="{{ route("users.destroy", $user->id) }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE" />
                        <button type="submit" 
                        @if ($user->cuentas() != null)
                            @php
                                $i = 0
                            @endphp
                            @foreach ($user->cuentas as $cuentas)
                                @php
                                    $i++
                                @endphp
                            @endforeach
                            @if($i != 0)
                                disabled
                            @endif
                        @endif 
                        >Eliminar</button>
                    </form>
                </td>
            </tr>
        @endif
    @endforeach
    </table>    

    <script>
    </script>
@endsection
