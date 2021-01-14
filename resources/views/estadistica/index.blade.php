@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<link href="{{ asset('css/estilo.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <h3>Estadistica Avanzada</h3>

    <div class="container">
        <div class="row justify-content-around">
            <div>
                <div class="row justify-content-around">
                    <div class="form-group">
                        <label for="">Fecha de inicio</label>
                        <input class="form-control" type="date" name="fechaInicio" id="fechaInicio">
                    </div>
                    <div class="form-group">
                        <label for="">Fecha final</label>
                        <input class="form-control" type="date" name="fechaFinal" id="fechaFinal">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="">Seleccione el estado de la solicitud:</label>
                    <div class="col">
                        <div><input type="checkbox" name="" id="checkRecibidas" checked>Recibidas</div>
                        <div><input type="checkbox" name="" id="checkTerminadas" checked>Terminadas</div>
                        <div><input type="checkbox" name="" id="checkCanceladas" checked>Canceladas</div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <button class="btn btn-info" id="btnGenerar">Generar</button>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="porEmpleado" id="porEmpleado">
                    <label class="form-check-label" for="">Buscar por empleado</label>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2">Empleado</label>
                        <div class="col">
                            <input type="text" name="apellidoPat" id="apellidoPat" class="form-control" disabled placeholder="Buscar por apellido paterno">
                        </div>
                        <button class="btn btn-success" id="btnBuscar">Buscar</button>
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
            </div>
        </div>
        <h3 id="tituloPeriodo"></h3>
        <div id="grafica"></div>
    </div>
</div>
@endsection

@section('scripts')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script src="{{ asset('js/estadistica/index.js') }}"></script>
<script src="{{ asset('js/empleados/buscar.js') }}"></script>
@endsection

