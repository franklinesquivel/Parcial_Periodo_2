@include('../layouts/app')
@section('content')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 5.5 CRUD Example from scratch</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('users.create') }}"> Create New Article</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <th>DUI</th>
            <th>E-mail</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Fecha de nacimiento</th>
            <th>Edad</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th width="280px">Action</th>
        </tr>
    @foreach ($users as $user)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $user->dui}}</td>
        <td>{{ $user->nombre}}</td>
        <td>{{ $user->apellido}}</td>
        <td>{{ $user->email}}</td>
        <td>{{ $user->fechaNac}}</td>
        <td>{{ $user->direccion}}</td>
        <td>{{ $user->telefono}}</td>
        <td>
            <a class="btn btn-info" href="{{ route('articles.show',$user->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('articles.edit',$user->id) }}">Edit</a>
            {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </table>

    {!! $users->links() !!}
@endsection