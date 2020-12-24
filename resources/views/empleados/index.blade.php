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

                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <td scope="col">ID</td>
                                <td scope="col">Nombre</td>
                                <td scope="col">Area</td>
                                <td scope="col">--</td>
                            </tr>
                        </thead>

                        <tbody>
                            @php($i=0)
                            @foreach ($empleados as $empleado)
                            <tr>
                                <td>{{ $empleado->id }}</td>
                                <td>{{ $empleado->nombre.' '.$empleado->apellidoPat.' '.$empleado->apellidoMat }}</td>
                                <td>{{ $areas[$i]}}</td>
                                <td><a href="{{ route('empleados.show',$empleado->id) }}">VER</a></td>
                            </tr>
                            @php($i = $i+1)
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection