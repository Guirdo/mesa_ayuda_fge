@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Gestion usuarios') }}</div>

                <div class="card-body">

                    <div class="row justify-content-center mb-3 ">
                        <a href="{{ route('users.create') }}" class="btn btn-primary">Agregar usuario</a>
                    </div>

                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <td scope="col">ID</td>
                                <td scope="col">Correo</td>
                                <td scope="col">Tipo</td>
                                <td scope="col">--</td>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($usuarios as $usuario)
                            <tr>
                                <td>{{ $usuario->id }}</td>
                                <td>{{ $usuario->email }}</td>
                                <td>{{ $tipoUsuario[$usuario->idTipoUsuario-1]->tipoUsuario }}</td>
                                <td><a href="{{ route('users.show',$usuario->id) }}">VER</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection