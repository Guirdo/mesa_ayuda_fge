@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9" id="accordion">

            <div class="row justify-content-center">
                <h2>{{ __('Solicitud #'.$solicitud->folio) }}</h2>
            </div>

            <div class="card">
                <div class="card-header" id="detalles">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseDet" aria-expanded="true" aria-controls="collapseDet">
                            Detalles de la solicitud
                        </button>
                    </h5>
                </div>

                <div id="collapseDet" class="collapse" aria-labelledby="detalles" data-parent="#accordion">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col">
                                <div class="row">
                                    <div class="col">
                                        <h5>Tipo solicitud</h5>
                                        <p>{{ $tipoSolicitud->tipoSolicitud }}</p>
                                    </div>

                                    <div class="col">
                                        <h5>Oficio</h5>
                                        <p>{{ $solicitud->oficioRelacionado }}</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <h5>Descripcion breve de la falla</h5>
                                        <p>{{ $solicitud->descripcionFalla }}</p>
                                    </div>  

                                    <div class="col">
                                        <h5>Servicio solicitado</h5>
                                        <p>{{ $tipoServicio->tipoServicio }}</p>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="datosSolicitate">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Datos del solicitante
                        </button>
                    </h5>
                </div>

                <div id="collapseOne" class="collapse" aria-labelledby="datosSolicitante" data-parent="#accordion">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col">
                                <div class="row">
                                    <div class="col">
                                        <h5>Username</h5>
                                        <p>{{ $empleado->nombre.' '.$empleado->apellidoPat.' '.$empleado->apellidoMat }}</p>
                                    </div>

                                    <div class="col">
                                        <h5>Email</h5>
                                        <p>{{ $empleado->email }}</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <h5>Tipo</h5>
                                        <p>{{ $empleado->CUIP }}</p>
                                    </div>

                                <div class="col">
                                    <h5>Tipo</h5>
                                    <p>{{ $empleado->CUIP }}</p>
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if(Auth::user()->idTipoUsuario == 1)
            <div class="card">
                <div class="card-header" id="datosEmpSo">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseSoporte" aria-expanded="true" aria-controls="collapseSoporte">
                            Datos del empleado de soporte
                        </button>
                    </h5>
                </div>

                <div id="collapseSoporte" class="collapse" aria-labelledby="datosEmpSo" data-parent="#accordion">
                    <div class="card-body">
                        @if($solSop == null)
                            <form action="{{ url('/solicitudes/asignar') }}" method="post">
                                @csrf
                                <div class="form-group">
                                <label for="">Seleccione a empleado de soporte</label>
                                    <table class="table">
                                        <thead>
                                            <th>Seleccionar</th>
                                            <th>Nombre</th>
                                        </thead>
                                        <tbody>
                                            @foreach($soporte as $sop)
                                            <tr>
                                                <td><input type="radio" name="sop" value="{{ $sop['id'] }}" class="form-control"></td>
                                                <td>{{ $sop['nombre'].' '.$sop['apellidoPat'].' '.$sop['apellidoMat'] }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="sol" value="{{ $solicitud->id }}">
                                    <button class="btn btn-success" type="submit">Asignar empleado</button>
                                </div>
                            </form>
                        @else
                        <div class="row justify-content-center">
                            <div class="col">
                                <div class="row">
                                    <div class="col">
                                        <h5>Nombre</h5>
                                        <p>{{ $soporte->nombre.' '.$soporte->apellidoPat.' '.$soporte->apellidoMat }}</p>
                                    </div>

                                    <div class="col">
                                        <h5>Email</h5>
                                        <p>{{ $soporte->email }}</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <h5>Tipo</h5>
                                        <p>{{ $soporte->CUIP }}</p>
                                    </div>

                                <div class="col">
                                    <h5>Tipo</h5>
                                    <p>{{ $soporte->CUIP }}</p>
                                </div>  
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endif

            <div class="card">
                <div class="card-header" id="datosEquipo">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                            Datos del equipo
                        </button>
                    </h5>
                </div>

                <div id="collapseTwo" class="collapse" aria-labelledby="datosEquipo" data-parent="#accordion">
                    <div class="card-body">
                        <div class="col">
                            <div class="row justify-content-center">
                                <button class="btn btn-success">Agregar equipo</button>
                            </div>
                        </div>

                        <form action="" method="post">
                            <div class="row justify-content-between">
                                <div class="col form-group">
                                    <label for="">Observaciones</label>
                                    <input type="text" class="form-control" name="observacion">
                                </div>

                                <div class="col form-group">
                                    <label for="">Tipo reparacion</label>
                                    <select class="form-control" name="tipoReparacion">
                                        <option value="1">IN SITU</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <button class="btn btn-success">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="datosSoporte">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                            Datos del soporte
                        </button>
                    </h5>
                </div>

                <div id="collapseThree" class="collapse" aria-labelledby="datosSoporte" data-parent="#accordion">
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="">Diagnostico</label>
                                <textarea class="form-control" name="" id="" cols="30" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="">Carpeta respaldada</label>
                                <input class="form-control" type="text" name="" id="">
                            </div>

                            <div class="row justify-content-center">
                                <button class="btn btn-success">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-around mt-3 mb-3">
            <button class="btn btn-success">Terminar solicitud</button>
            <button class="btn btn-danger">Posponer solicitud</button>
        </div>
    </div>
</div>

@endsection