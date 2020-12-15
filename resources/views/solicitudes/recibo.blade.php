@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">

            <div class="row justify-content-center">
                <h2>{{ __('Solicitud #'.$solicitud->folio) }}</h2>
            </div>

            <div class="row justify-content-center">

                <table class="table-sm table-bordered" id="recibo">
                    <tbody>
                        <tr>
                            <td class="table-dark">Folio</td>
                            <td>{{ $solicitud->folio }}</td>
                            <td class="table-dark">Fecha solicitud</td>
                            <td>{{ $solicitud->fechaRegistro }}</td>
                            
                        </tr>
                        <tr>
                            <td class="table-dark">Oficio relacionado</td>
                            <td>{{ $solicitud->oficioRelacionado }}</td>
                            <td class="table-dark">Tipo solicitud</td>
                            <td>{{ $tipoSolicitud->tipoSolicitud }}</td>
                        </tr>
                        <!-- Datos del solicitante -->
                        <tr>
                            <td class="table-dark text-center" colspan="4">Datos del solicitante</td>
                        </tr>
                        <tr>
                            <td class="table-dark">Nombre</td>
                            <td>{{ $empleado->nombre.' '.$empleado->apellidoPat.' '.$empleado->apellidoMat }}</td>
                            <td class="table-dark">Telefono</td>
                            <td>{{ $empleado->telefonoPersonal }}</td>
                        </tr>
                        <tr>
                            <td class="table-dark">Adscripcion</td>
                            <td>{{ $area->area }}</td>
                            <td class="table-dark">E-mail</td>
                            <td>{{ $empleado->email }}</td>
                        </tr>
                        <tr>
                            <td class="table-dark" colspan="2">Servicio que solicita</td>
                            <td colspan="2">{{ $tipoServicio->tipoServicio }}</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="table-dark text-center">Descripcion breve de la falla</td>
                        </tr>
                        <tr>
                            <td colspan="4">{{ $solicitud->descripcionFalla }}</td>
                        </tr>
                        <!-- Datos del equipo -->
                        <tr>
                            <td colspan="4" class="table-dark">Datos del equipo</td>
                        </tr>
                        <tr>
                            <td class="table-dark">Nombre del equipo</td>
                            <td></td>
                            <td class="table-dark">Grupo de trabajo</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div>
                <input type="hidden" name="idSol" id="idSol" value="{{ $solicitud->id }}">
                <button class="btn btn-success" id="btnImprimir">Imprimir</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.6/jspdf.plugin.autotable.min.js"></script>
     <script src="{{ asset('js/solicitudes/generarPDF.js') }}"></script>
@endsection