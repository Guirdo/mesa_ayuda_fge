@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Gestion empleados') }}</div>

                <div class="card-body">

                    <div class="row justify-content-center mb-3 ">
                        <a href="{{ route('empleados.create') }}" class="btn btn-primary">Agregar empleado</a>
                    </div>

                    <form action="" class="form-inline mb-3">
                        <div class="form-group">
                            <input class="form-control" type="text" name="" id="" placeholder="Buscar">
                        </div>

                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </form>

                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <td scope="col">ID</td>
                                <td scope="col">Nombre</td>
                                <td scope="col">Adscripcion</td>
                                <td scope="col">--</td>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($empleados as $empleado)
                            <tr>
                                <td>{{ $empleado->id }}</td>
                                <td>{{ $empleado->nombre.' '.$empleado->apellidoPat.' '.$empleado->apellidoMat }}</td>
                                <td>---</td>
                                <td><a href="{{ route('empleados.show',$empleado->id) }}">VER</a></td>
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