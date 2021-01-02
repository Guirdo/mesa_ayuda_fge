@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Agregar empleado') }}</div>

                <div class="card-body">

                @if($errors->any())
                    <div class="alert alert-danger" role="aler">
                        <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('empleados.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="">Nombre</label>
                            <input class="form-control" type="text" name="nombre">
                        </div>

                        <div class="row">
                            <div class="col form-group">
                                <label for="">Apellido paterno</label>
                                <input class="form-control" type="text" name="apellidoPat">
                            </div>

                            <div class="col form-group">
                                <label for="">Apellido materno</label>
                                <input class="form-control" type="text" name="apellidoMat">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col form-group">
                                <label for="">Telefono</label>
                                <input class="form-control" type="text" name="telefonoPersonal">
                            </div>

                            <div class="col form-group">
                                <label for="">Extencion telefono de oficina</label>
                                <input class="form-control" type="text" name="extencionTelOf">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <label for="">Email</label>
                                <input class="form-control" type="text" name="email">
                            </div>

                            <div class="row">
                                <label for="">CUIP</label>
                                <input class="form-control" type="text" name="CUIP">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Region</label>
                            <select class="form-control" name="region" id="region">
                                @foreach($regiones as $region)
                                <option value="{{ $region->id }}">{{ $region->region }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                        <label for="">Adscripcion</label>
                        <select class="form-control" name="adscripcion" id="adscripcion">
                            @foreach($adscripciones as $adscripcion)
                                @if($adscripcion->idRegion == 1)
                                <option value="{{ $adscripcion->id }}">{{ $adscripcion->adscripcion }}</option>
                                @endif
                            @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Area</label>
                            <select class="form-control" name="area" id="area">
                                @foreach($areas as $area)
                                <option value="{{ $area->id }}">{{ $area->area }}</option>
                                @endforeach
                            </select>
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

@section('scripts')
<script src="{{ asset('js/empleados/index.js') }}"></script>
@endsection