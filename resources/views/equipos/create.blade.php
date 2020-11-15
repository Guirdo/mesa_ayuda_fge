@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Agregar equipo') }}</div>

                <div class="card-body">

                <form action="{{ route('equipos.store') }}" method="POST">
                        @csrf
                        <div class="container row justify-content-between">
                            <div class="form-group">
                                <label for="">Nombre equipo</label>
                                <input class="form-control" type="text" name="nombreE">
                            </div>

                            <div class="form-group">
                                <label for="">Marca</label>
                                <input class="form-control" type="text" name="Marca">
                            </div>

                            <div class="form-group">
                                <label for="">Modelo</label>
                                <input class="form-control" type="text" name="Modelo">
                            </div>
                        </div>

                        <div class="container row">
                            <div class="form-group">
                                <label for="">Numero de Serie</label>
                                <input class="form-control" type="text" name="numeroserie">
                            </div>

                            <div class="form-group ml-5">
                                <label for="">Clave Inventarial</label>
                                <input class="form-control" type="text" name="claveinventarial">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Disco Duro</label>
                            <input class="form-control" type="text" name="discoduro">
                        </div>
                        <div class="form-group">
                            <label for="">Memoria RAM</label>
                            <input class="form-control" type="text" name="memoriaram">
                        </div>
                        <div class="form-group">
                            <label for="">Sistema Operativo</label>
                            <input class="form-control" type="text" name="sistemaoperativo">
                        </div>
                         <div class="form-group">
                            <label for="">Procesador</label>
                            <input class="form-control" type="text" name="procesador">
                        </div>
                        

                        <a href="{{ route('equipos.index') }}" class="btn btn-secondary">Regresar</a>
                        <button type="submit" class="btn btn-success">Agregar</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection