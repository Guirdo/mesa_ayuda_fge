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

                    <div>
                        <a href="{{ route('solicitudes.mostrarTerminados') }}" class="btn btn-danger">Ver terminados y cancelados</a>
                    </div>
                    <br>
                    <label for="">Solicitudes sin atender</label>
                    <div class="my-custom-scrollbar table-wrapper-scroll-y">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <td scope="col">Folio</td>
                                <td scope="col">Fecha de registro</td>
                                <td scope="col">Estado</td>
                                <td scope="col">--</td>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($solicitudes as $solicitud)
                            <tr>
                                <td>{{ $solicitud->folio }}</td>
                                <td>{{ $solicitud->fechaRegistro }}</td>
                                <td><span class="text-danger">SIN ATENDER</span></td>
                                <td><a href="{{ route('solicitudes.show',$solicitud) }}">VER</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>

                    <label for="">Solicitudes en atencion</label>
                    <div class="my-custom-scrollbar table-wrapper-scroll-y">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <td scope="col">Folio</td>
                                <td scope="col">Fecha de registro</td>
                                <td scope="col">Estado</td>
                                <td scope="col">--</td>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($solicitudesA as $solicitud)
                            <tr>
                                <td>{{ $solicitud->folio }}</td>
                                <td>{{ $solicitud->fechaRegistro }}</td>
                                <td><span class="text-primary">ATENDIENDO</span></td>
                                <td><a href="{{ route('solicitudes.show',$solicitud) }}">VER</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection