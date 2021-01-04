@extends('layouts.app')

@section('styles')
<link href="{{ asset('css/estilo.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Gestion Solicitudes') }}</div>

                <div class="card-body">

                    <div class="row justify-content-center mb-3 ">
                        <a href="{{ route('solicitudes.create') }}" class="btn btn-primary">Registrar solicitud</a>
                    </div>

                    <br>
                    <form action="{{ url('/solicitudes/gestion') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group">
                            <label for="">Fecha de inicio</label>
                            <input class="form-control" type="date" name="fechaInicio" id="fechaInicio">
                        </div>
                        <div class="form-group">
                            <label for="">Fecha final</label>
                            <input class="form-control" type="date" name="fechaFinal" id="fechaFinal">
                        </div>
                    </div>

                    <div class="form-group row justify-content-between">
                        <label for="">Estado de la solicitud: </label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="estadoSolicitud" value="1" checked>
                            <label class="form-check-label" for="">Recibidas</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="estadoSolicitud" value="2">
                            <label class="form-check-label" for="">Terminadas</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="estadoSolicitud" value="3">
                            <label class="form-check-label" for="">En atencion</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="estadoSolicitud" value="4">
                            <label class="form-check-label" for="">Canceladas</label>
                        </div>

                        <button type="submit" class="btn btn-primary" id="btnBuscar">Buscar</button>
                        </form>
                    </div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Folio</th>
                                <th>Fecha de registro</th>
                                <th>Estado</th>
                                <th>---</th>
                            </tr>
                        </thead>

                        <tbody id="tbSolicitudes">
                            @if($solicitudes != null)
                                @foreach($solicitudes as $sol)
                                    <tr>
                                        <td>{{ $sol->folio }}</td>
                                        <td>{{ $sol->fechaRegistro }}</td>
                                        @switch($sol->idEstado)
                                            @case(1)
                                                <td class="text-white bg-primary text-center">SIN ATENDER</td>
                                                <td><a href="{{ route('solicitudes.show',$sol->id) }}">VER</a></td>
                                                @break
                                            @case(2)
                                                <td class="bg-warning text-center">EN ATENCION</td>
                                                <td><a href="{{ route('solicitudes.show',$sol->id) }}">VER</a></td>
                                                @break
                                            @case(3)
                                                <td class="bg-success text-center">TERMINADA</td>
                                                <td><a href="{{ url('/solicitudes/recibo',$sol->folio) }}">VER</a></td>
                                                @break
                                            @case(4)
                                                <td class="text-white bg-danger text-center">CANCELADA</td>
                                                <td><a href="{{ route('solicitudes.show',$sol->id) }}">VER</a></td>
                                                @break
                                        @endswitch
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('js/solicitudes/index.js') }}"></script>
@endsection