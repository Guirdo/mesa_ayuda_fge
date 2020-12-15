@extends('layouts.guest')

@section('styles')
<link href="{{ asset('css/estilo.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid">
            <div class="row">

                <main class="col ml-sm-auto px-md-2 py-md-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header">{{ __('Dashboard') }}</div>

                                <div class="card-body">
                                    <form action="">
                                        <div class="form-group row">
                                            <label class="col-sm-2">Empleado</label>
                                            <div class="col">
                                                <input type="text" name="apellidoPat" id="" class="form-control">
                                            </div>
                                            <button class="btn btn-success" id="btnBuscar">Buscar</button>
                                        </div>

                                        <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                            <table class="table" id="tbEmpleados">
                                                <thead>
                                                    <tr>
                                                        <th>Seleccion</th>
                                                        <th>Nombre</th>
                                                    </tr>
                                                </thead>

                                                <tbody id="tbCuerpo">

                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="form-group row">
                                            <label for="" class="col-sm-2">Nombre</label>
                                            <div class="col">
                                                <input type="text" name="nombreEmpleado" id="nombre" class="form-control" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="" class="col-sm-2">Telefono</label>
                                            <div class="col">
                                                <input type="text" name="" id="telefono" class="form-control" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="" class="col-sm-2">Email</label>
                                            <div class="col">
                                                <input type="text" name="" id="email" class="form-control" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="" class="col-sm-2">Area</label>
                                            <div class="col">
                                                <input type="text" name="" id="area" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </form>

                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </main>
            </div>
        </div>

        @endsection

        @section('scripts')
        <script src="{{ asset('js/empleados/buscar.js') }}"></script>
        @endsection