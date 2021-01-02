@extends('layouts.app')

@section('styles')
<link href="{{ asset('css/estilo.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Usuario #'.$usuario->id) }}</div>

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

                    <form action="{{ route('users.update',$usuario->id) }}" method="POST">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label for="">Username</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ $usuario->name }}">
                        </div>

                        <div class="form-group">
                            <label for="">Email</label>
                            <input class="form-control" type="text" name="email" id="" value="{{ $usuario->email }}">
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
                                    <tbody id="tbEmpleados">
                                        <tr>
                                            <td><input type="radio" name="idEmpleado" value="{{ $empleado->id }}" checked></td>
                                            <td>{{ $empleado->nombre.' '.$empleado->apellidoPat.' '.$empleado->apellidoMat }}</td>
                                            <td>{{ $empleado->telefonoPersonal }}</td>
                                            <td>{{ $empleado->email }}</td>
                                            <td>{{ $area->area }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                        </div>

                        <div class="form-group">
                            <label for="">Tipo usuario</label>
                            <select class="form-control" name="" id="">
                                @foreach($tipoUsuario as $tipo)
                                    <option value="{{ $tipo->id }}" @if($tipo->id == $usuario->idTipoUsuario) selected="selected" @endif>
                                        {{ $tipo->tipoUsuario }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        

                        <a href="{{ route('users.show',$usuario->id) }}" class="btn btn-secondary">Regresar</a>
                        <button type="submit" class="btn btn-warning">Editar</button>

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