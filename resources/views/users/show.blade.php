@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Usuario #'.$usuario->id) }}</div>

                <div class="card-body">

                    <div class="row justify-content-center">
                        <div class="col">
                            <div class="col">
                                <h5>Username</h5>
                                <p>{{ $usuario->name }}</p>
                            </div>

                            <div class="col">
                                <h5>Email</h5>
                                <p>{{ $usuario->email }}</p>
                            </div>

                            <div class="col">
                                <h5>Tipo</h5>
                                <p>{{ $tipoUsuario->tipoUsuario }}</p>
                            </div>
                        </div>

                        <div class="col">
                            <a href="{{ route('users.index') }}" class="btn btn-secondary">Regresar</a>
                            <div class="w-100 m-3"></div>
                            <a href="{{ route('users.edit',$usuario->id) }}" class="btn btn-warning">Editar</a>
                            <div class="w-100 m-3"></div>
                            <form action="{{ route('users.destroy',$usuario->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection