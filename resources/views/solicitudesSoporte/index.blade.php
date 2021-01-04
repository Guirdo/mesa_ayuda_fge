@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Solicitudes') }}</div>

                <div class="card-body">

                    <div class="row justify-content-center mb-3 ">
                        <a href="{{ route('solicitudes.create') }}" class="btn btn-primary">Registrar solicitud</a>
                    </div>

                    <label for="">Solicitudes en atencion</label>
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
                            @if (!is_null($solicitudesA))
                                @foreach ($solicitudesA as $solicitud)
                            <tr>
                                <td>{{ $solicitud['folio'] }}</td>
                                <td>{{ $solicitud['fechaRegistro'] }}</td>
                                <td><span class="text-primary">ATENDIENDO</span></td>
                                <td><a href="{{ route('solicitudesSoporte.show',$solicitud['id']) }}">VER</a></td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>

                    <label for="">Solicitudes sin atender</label>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <td scope="col">Folio</td>
                                <td scope="col">Fecha de registro</td>
                                <td scope="col">Estado</td>
                                <td scope="col">--</td>
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
                                <td>
                                    <button class="btn btn-primary" name="tomar" id="tomar">Tomar solicitud</button>
                                    <input type="hidden" name="idSol" id="idSol" value="{{ $solicitud->id }}">
                                </td>
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

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/html-docx-js@0.3.1/build/api.min.js"></script>
    <script type="module" src="{{ asset('js/solicitudes/prueba.js') }}"></script>
    <script src="{{ asset('js/obtieneFila.js') }}"></script>
@endsection


