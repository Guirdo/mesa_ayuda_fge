@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Empleado #'.$empleado->id) }}</div>

                <div class="card-body">

                @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif

                    <form action="{{ route('empleados.update',$empleado->id) }}" method="POST">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="row">
                            <div class="col form-group">
                                <label for="">Nombre</label>
                                <input class="form-control" type="text" name="nombre" value="{{ $empleado->nombre }}">
                            </div>

                            <div class="col form-group">
                                <label for="">Apellido paterno</label>
                                <input class="form-control" type="text" name="apellidoPat" value="{{ $empleado->apellidoPat }}">
                            </div>

                            <div class="col form-group">
                                <label for="">Apellido materno</label>
                                <input class="form-control" type="text" name="apellidoMat" value="{{ $empleado->apellidoMat }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col form-group">
                                <label for="">Telefono</label>
                                <input class="form-control" type="text" name="telefonoPersonal" value="{{ $empleado->telefonoPersonal }}">
                            </div>

                            <div class="col form-group">
                                <label for="">Extencion telefono de oficina</label>
                                <input class="form-control" type="text" name="extencionTelOf" value="{{ $empleado->extencionTelOf }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col form-group">
                                <label for="">CUIP</label>
                                <input class="form-control" type="text" name="CUIP" value="{{ $empleado->CUIP }}">
                            </div> 

                            <div class="col form-group">
                                <label for="">Email</label>
                                <input class="form-control" type="text" name="email" value="{{ $empleado->email }}">
                            </div> 
                        </div>

                        <div class="form-group">
                            <label for="">Region</label>
                            <select class="form-control" name="region" id="region">
                                @foreach($regiones as $region)
                                    @if($region->id == $idRegion)
                                    <option value="{{ $region->id }}" selected="selected">{{ $region->region }}</option>
                                    @else
                                    <option value="{{ $region->id }}">{{ $region->region }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Adscripcion</label>
                            <select class="form-control" name="adscripcion" id="adscripcion">
                            @foreach($adscripciones as $adscripcion)
                                @if($adscripcion->id == $idAdscripcion)
                                <option value="{{ $adscripcion->id }}" selected="selected">{{ $adscripcion->adscripcion }}</option>
                                @else
                                <option value="{{ $adscripcion->id }}">{{ $adscripcion->adscripcion }}</option>
                                @endif
                            @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Area</label>
                            <select name="area" id="area" class="form-control">
                            @foreach($areas as $area)
                                @if($area->id == $empleado->idArea)
                                <option value="{{ $area->id }}" selected="selected">{{ $area->area }}</option>
                                @else
                                <option value="{{ $area->id }}">{{ $area->area }}</option>
                                @endif
                            @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Estatus</label>
                            <select name="estatus" class="form-control">
                                @foreach($estatus as $est)
                                <option value="{{ $est->id }}">{{ $est->estatus }}</option>
                                @endforeach
                            </select>
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

@section('scripts')
<script src="{{ asset('js/empleados/index.js') }}"></script>
@endsection