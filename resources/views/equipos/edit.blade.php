@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Empleado #'.$empleado->id) }}</div>

                <div class="card-body">

                    <form action="{{ route('empleados.update',$empleado->id) }}" method="POST">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="container row justify-content-between">
                            <div class="form-group">
                                <label for="">Nombre</label>
                                <input class="form-control" type="text" name="nombre" value="{{ $empleado->nombre }}">
                            </div>

                            <div class="form-group">
                                <label for="">Apellido paterno</label>
                                <input class="form-control" type="text" name="apellidoPat" value="{{ $empleado->apellidoPat }}">
                            </div>

                            <div class="form-group">
                                <label for="">Apellido materno</label>
                                <input class="form-control" type="text" name="apellidoMat" value="{{ $empleado->apellidoMat }}">
                            </div>
                        </div>

                        <div class="container row">
                            <div class="form-group">
                                <label for="">Telefono</label>
                                <input class="form-control" type="text" name="telefonoPersonal" value="{{ $empleado->telefonoPersonal }}">
                            </div>

                            <div class="form-group ml-5">
                                <label for="">Extencion telefono de oficina</label>
                                <input class="form-control" type="text" name="extencionTelOf" value="{{ $empleado->extencionTelOf }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">CUIP</label>
                            <input class="form-control" type="text" name="CUIP" value="{{ $empleado->CUIP }}">
                        </div>

                        <a href="{{ route('empleados.show',$empleado->id) }}" class="btn btn-secondary">Regresar</a>
                        <button type="submit" class="btn btn-warning">Editar</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection