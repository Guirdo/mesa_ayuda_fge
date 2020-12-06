@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrar solicitud') }}</div>

                <div class="card-body">
                    
                    <form action="{{ route('solicitudes.store') }}" method="POST">
                    @csrf
                        <div class="row">
                            <div class="col form-group">
                                <label for="">Tipo solicitud</label>
                                <select class="form-control" name="tipoSolicitud" id="">
                                    @foreach($tipoSolicitudes as $tipoSol)
                                    <option value="{{ $tipoSol->id }}">{{ $tipoSol->tipoSolicitud }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col form-group">
                                <label for="">Oficio relacionado</label>
                                <input class="form-control" type="text" name="oficioRel">
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <h3>Datos del solicitante</h3>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2">CUIP:</label>
                            <div class="col">
                                <input type="text" name="CUIP" id="CUIP" class="form-control">
                            </div>
                            <button class="btn btn-success" id="btnBuscar">Buscar</button>
                            <a href="{{ route('empleados.create') }}" class="btn btn-warning">Agregar empleado</a>
                        </div>

                        <div class="row">
                            <div class="col form-group">
                                <label for="" class="">Nombre:</label>
                                <input type="text" id="nombre" class="form-control" readonly>
                            </div>
                            <div class="col form-group">
                                <label for="" class="">Telefono:</label>
                                <input type="text" id="telefono" class="form-control" readonly>
                            </div>                        
                        </div>

                        <div class="row">
                            <div class="col form-group">
                                <label for="" class="">Email:</label>
                                <input type="text" id="email" class="form-control" readonly>
                            </div>
                            <div class="col form-group">
                                <label for="" class="">Area:</label>
                                <input type="text" id="area" class="form-control" readonly>
                            </div>                        
                        </div>

                        <div class="form-group">
                            <label for="" class="">Servicio solicitado:</label>
                            <select name="tipoServicio" class="form-control">
                                @foreach($tipoServicios as $tipoSer)
                                <option value="{{ $tipoSer->id }}">{{ $tipoSer->tipoServicio }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Descripcion breve de la falla</label>
                            <textarea class="form-control" name="descripcion" id="" cols="30" rows="3"></textarea>
                        </div>

                        <button class="btn btn-success">Registrar</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/empleados/cuip.js') }}"></script>
@endsection