@extends('layouts.app')
@section('styles')
<link href="{{ asset('css/estilo.css') }}" rel="stylesheet">
@endsection
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Crear usuario') }}</div>

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

                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        
                        <div class="form-group">
                            <label for="">Username</label>
                            <input class="form-control" type="text" name="name" id="name" >
                        </div>

                        <div class="form-group">
                            <label for="">Email</label>
                            <input class="form-control" type="text" name="email" id="">
                        </div>

                        <div class="row">
                            <div class="col form-group">
                                <label for="">Contraseña</label>
                                <input class="form-control" type="password" name="password">
                            </div>

                            <div class="col form-group">
                                <label for="">Confirmar contraseña</label>
                                <input class="form-control" type="password" name="confirmacion">
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="" class="col-sm-2">Empleado</label>
                            <div class="col">
                                <input type="text" name="apellidoPat" id="apellidoPat" class="form-control">
                            </div>
                            <button class="btn btn-success" id="btnBuscar">Buscar</button>
                        </div>

                        <div class="my-custom-scrollbar table-wrapper-scroll-y">
                            <label for="">Seleccione a empleado </label>
                                <table class="table">
                                    <thead>
                                        <th>Seleccionar</th>
                                        <th>Nombre</th>
                                        <th>Telefono</th>
                                        <th>Email</th>
                                        <th>Area</th>
                                    </thead>
                                    <tbody id="tbEmpleados"></tbody>
                                </table>
                        </div>

                        <div class="form-group">
                            <label for="">Tipo usuario</label>
                            <select class="form-control" name="idTipoUsuario">
                                @foreach($tipoUsuario as $tipo)
                                <option value="{{ $tipo->id }}">{{ $tipo->tipoUsuario }}</option>
                                @endforeach
                            </select>
                        </div>
                        

                        <a href="{{ route('users.index') }}" class="btn btn-secondary">Regresar</a>
                        <button type="submit" class="btn btn-success">Crear usuario</button>

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