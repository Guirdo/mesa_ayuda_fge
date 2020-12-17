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
                            <td class="table-dark text-center" colspan="4">DATOS DEL SOLICITANTE</td>
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
                            <td colspan="4" class="table-dark text-center">DATOS DEL EQUIPO</td>
                        </tr>
                        <tr>
                            <td class="table-dark">Marca</td>
                            <td>{{ $equipo->marca }}</td>
                            <td class="table-dark">Modelo</td>
                            <td>{{ $equipo->modelo }}</td>
                        </tr>
                        <tr>
                            <td class="table-dark">No. Serie</td>
                            <td>{{ $equipo->numeroSerie }}</td>
                            <td class="table-dark">Clave inventarial</td>
                            <td>{{ $equipo->claveInventaraial }}</td>
                        </tr>
                        <tr>
                            <td class="table-dark">Nombre del equipo</td>
                            <td></td>
                            <td class="table-dark">Grupo de trabajo</td>
                            <td>{{ $computadora!=null ? $computadora->grupo_de_trabajo:'' }}</td>
                        </tr>
                        <!-- ESPECIFICACIONES TECNICAS-->
                        <tr>
                            <td colspan="4" class="table-dark text-center">ESPECIFICACIONES TECNICAS</td>
                        </tr>
                        <tr>
                            <td class="table-dark">Disco duro</td>
                            <td>{{ $computadora!=null ? $computadora->discoDuro : '' }}</td>
                            <td class="table-dark">Sistema operativo</td>
                            <td>{{ $computadora!=null ? $computadora->sistemaOperativo : '' }}</td>
                        </tr>
                        <tr>
                            <td class="table-dark">RAM</td>
                            <td>{{ $computadora!=null ? $computadora->ram : '' }}</td>
                            <td class="table-dark">Procesador</td>
                            <td>{{ $computadora!=null ? $computadora->procesador : '' }}</td>
                        </tr>
                        <tr>
                            <td class="table-dark">Observaciones</td>
                            <td>{{ $solicitud->observaciones }}</td>
                            <td class="table-dark">Tipo de reparación</td>
                            <td>{{ $tipoReparacion->tipoReparacion }}</td>
                        </tr>
                        <!-- DATOS DEL SOPORTE -->
                        <tr>
                            <td class="table-dark text-center" colspan="4">DATOS DEL SOPORTE</td>
                        </tr>
                        <tr>
                            <td class="table-dark">Empleado de soporte</td>
                            <td colspan="3">{{ $soporte->nombre.' '.$soporte->apellidoPat.' '.$soporte->apellidoMat }}</td>
                        </tr>
                        <tr>
                            <td class="table-dark">Diagnóstico</td>
                            <td colspan="3">{{ $solicitud->diagnostico }}</td>
                        </tr>
                        <tr>
                            <td class="table-dark">Carpeta respaldada</td>
                            <td colspan="3">{{ $solicitud->respaldo }}</td>
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