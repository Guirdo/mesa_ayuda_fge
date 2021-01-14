@extends('layouts.app')

@section('styles')
<link href="{{ asset('css/estilo.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrar solicitud') }}</div>

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
                    
                    @if(Auth::user()->idTipoUsuario == 1)
                    <form action="{{ route('solicitudes.store') }}" method="POST">
                    @else
                    <form action="{{ route('solicitudesSoporte.store') }}" method="POST">
                    @endif
                    @csrf
                        <div class="row">
                            <div class="col form-group">
                                <label for="">Tipo solicitud</label>
                                <select class="form-control" name="tipoSolicitud" id="">
                                    @foreach($tipoSolicitudes as $tipoSol)
                                    <option value="{{ $tipoSol->id }}">{{ $tipoSol->tipoSolicitud }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col form-group">
                                <label for="">Oficio relacionado</label>
                                <input class="form-control" type="text" name="oficioRelacionado" value="{{ old('oficioRelacionado') }}">
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <h3>Datos del solicitante</h3>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2">Empleado</label>
                            <div class="col">
                                <input type="text" name="apellidoPat" id="apellidoPat" class="form-control" placeholder="Buscar por apellido paterno">
                            </div>
                            <button class="btn btn-success" id="btnBuscar">Buscar</button>
                            <a href="{{ route('empleados.create') }}" class="btn btn-warning">Agregar empleado</a>
                        </div>

                        <div class="my-custom-scrollbar table-wrapper-scroll-y">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Seleccionar</th>
                                        <th>Nombre</th>
                                        <th>Telefono</th>
                                        <th>Email</th>
                                        <th>Area</th>
                                    </tr>
                                </thead>
                                <tbody id="tbEmpleados"></tbody>
                            </table>
                        </div>

                        <div class="form-group">
                            <label for="" class="">Servicio solicitado:</label>
                            <select name="tipoServicio" class="form-control">
                                @foreach($tipoServicios as $tipoSer)
                                <option value="{{ $tipoSer->id }}">{{ $tipoSer->tipoServicio }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Descripcion breve de la falla</label>
                            <textarea class="form-control" name="descripcion" id="" cols="30" rows="3">{{ old('descripcion') }}</textarea>
                        </div>

                        @if($soporte->idEstatus == 1)
                            <button class="btn btn-success">Registrar</button>
                        @else
                            <div class="alert alert-warning" role="alert">
                                Estas deshabilitado, no puedes registrar una solicitud.
                            </div>
                        @endif
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/empleados/buscar.js') }}"></script>
@endsection