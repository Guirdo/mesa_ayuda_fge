@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Equipo #'.$equipos->id) }}</div>

                <div class="card-body">

                    <div class="row justify-content-center">
                        <div class="col">
                            <div class="col">
                                <h5>Marca</h5>
                                <p>{{ $equipos->marca }}</p>
                            </div>

                            <div class="col">
                                <h5>Modelo</h5>
                                <p>{{ $equipos->modelo }} </p>
                            </div>

                            <div class="col">
                                <h5>Numero de Serie</h5>
                                <p>{{ $equipos->numeroSerie }}</p>
                            </div>

                            <div class="col">
                                <h5>Clave Inventarial</h5>
                                <p>{{ $equipos->claveInventarial }}</p>
                            </div>

                          <div class="col">
                                <h5>Tipo</h5>
                                <p>{{ $tipoEquipo->tipoEquipo }}</p>
                            </div>
                        </div>

                        <div class="col">
                            <a href="{{ route('equipos.index') }}" class="btn btn-secondary">Regresar</a>
                            <div class="w-100 m-3"></div>
                            <a href="{{ route('equipos.edit',$equipos->id) }}" class="btn btn-warning">Editar</a>
                            <div class="w-100 m-3"></div>
                            <form action="{{ route('equipos.destroy',$equipos->id) }}" method="post">
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