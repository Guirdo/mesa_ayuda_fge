@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Usuario #'.$usuario->id) }}</div>

                <div class="card-body">

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

                        <div class="form-group">
                            <label for="">Contraseña</label>
                            <input class="form-control" type="password" name="contrasena" id="" value="">
                        </div>

                        <div class="form-group">
                            <label for="">Contraseña</label>
                            <select class="form-control" name="" id="">
                                @foreach($tipoUsuario as $tipo)
                                <option value="{{ $tipo->id }}">{{ $tipo->tipoUsuario }}</option>
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