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

                        <div class="form-group">
                            <label for="">Contraseña</label>
                            <input class="form-control" type="password" name="password" id="">
                        </div>
                        <div class="my-custom-scrollbar table-wrapper-scroll-y">
                                <label for="">Seleccione a empleado </label>
                                    <table class="table">
                                        <thead>
                                            <th>Seleccionar</th>
                                            <th>Nombre</th>
                                        </thead>
                                        <tbody>
                                            @foreach($soporte as $sop)
                                            <tr>
                                                <td><input type="radio" name="sop" value="{{ $sop->id }}" class="form-control"></td>
                                                <td>{{ $sop['nombre'].' '.$sop['apellidoPat'].' '.$sop['apellidoMat'] }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                        <div class="form-group">
                            <label for="">Tipo usuario</label>
                            <select class="form-control" name="tipoUsuario" id="">
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