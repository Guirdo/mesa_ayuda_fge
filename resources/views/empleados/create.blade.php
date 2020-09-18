@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Crear usuario') }}</div>

                <div class="card-body">

                <form action="{{ route('empleados.store') }}" method="POST">
                        @csrf
                        <div class="container row justify-content-between">
                            <div class="form-group">
                                <label for="">Nombre</label>
                                <input class="form-control" type="text" name="nombre">
                            </div>

                            <div class="form-group">
                                <label for="">Apellido paterno</label>
                                <input class="form-control" type="text" name="apellidoPat">
                            </div>

                            <div class="form-group">
                                <label for="">Apellido materno</label>
                                <input class="form-control" type="text" name="apellidoMat">
                            </div>
                        </div>

                        <div class="container row">
                            <div class="form-group">
                                <label for="">Telefono</label>
                                <input class="form-control" type="text" name="telefonoPersonal">
                            </div>

                            <div class="form-group ml-5">
                                <label for="">Extencion telefono de oficina</label>
                                <input class="form-control" type="text" name="extencionTelOf">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">CUIP</label>
                            <input class="form-control" type="text" name="CUIP">
                        </div>

                        <a href="{{ route('empleados.index') }}" class="btn btn-secondary">Regresar</a>
                        <button type="submit" class="btn btn-success">Agregar</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection