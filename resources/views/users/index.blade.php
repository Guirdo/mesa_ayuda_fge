@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.1.0/css/bootstrap-switch-button.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.1.0/dist/bootstrap-switch-button.min.js"></script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Gestion usuarios') }}</div>

                <div class="card-body">

                    <div class="row justify-content-center mb-3 ">
                        <a href="{{ route('users.create') }}" class="btn btn-primary">Agregar usuario</a>
                    </div>

                    <form action="" class="form-inline mb-3">
                        <div class="form-group">
                            <label for=""></label>
                            <input class="form-control" type="text" name="" id="" placeholder="Buscar">
                        </div>

                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </form>

                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <td scope="col">ID</td>
                                <td scope="col">Correo</td>
                                <td scope="col">Tipo</td>
                                <td scope="col">Estatus</td>
                                <td scope="col">--</td>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($usuarios as $usuario)
                            <tr>
                                <td>{{ $usuario->id }}</td>
                                <td>{{ $usuario->email }}</td>
                                <td>{{ $tipoUsuario[$usuario->idTipoUsuario-1]->tipoUsuario }}</td>
                                <td> <input type="checkbox" data-toggle="switchbutton" checked data-size="xs"  data-onlabel="Activo" data-offlabel="Inactivo" data-offstyle="danger" ></td>
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