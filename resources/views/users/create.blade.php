@extends('layouts.app')

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
                            <input class="form-control" type="password" name="contrasena" id="">
                        </div>

                        <div class="form-group">
                            <label for="">Contraseña</label>
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