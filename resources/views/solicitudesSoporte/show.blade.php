@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9" id="accordion">

            <div class="row justify-content-center">
                <h2>{{ __('Solicitud #'.$solicitud['folio']) }}</h2>
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
                                        <h5>Telefono</h5>
                                        <p>{{ $empleado->telefonoPersonal }}</p>
                                    </div>

                                <div class="col">
                                    <h5>CUIP</h5>
                                    <p>{{ $empleado->CUIP }}</p>
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if(Auth::user()->idTipoUsuario == 1)
                @include('solicitudes.admin')
            @endif

            <div class="card">
                <div class="card-header" id="datosEquipo">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                            Datos del equipo @if($equipo != null) #{{ $equipo->numeroSerie }} @endif
                        </button>
                    </h5>
                </div>

                <div id="collapseTwo" class="collapse" aria-labelledby="datosEquipo" data-parent="#accordion">
                    <div class="card-body">
                    @if($equipo == null)
                        <form action="{{ url('solicitudes/guardarEquipo')}}" method="post">
                        @csrf
                            <input type="hidden" name="idSol" value="{{ $solicitud->id }}">
                            <div class="form-group">
                                <label for="">Introduzca No. de serie: </label>
                                <div class="row">
                                    <div class="col">
                                        <input class="form-control" type="text" name="noSerie" id="noSerie">
                                    </div>
                                    <button type="submit" class="btn btn-primary" id="btnBuscar">Buscar</button>
                                    <div class="col-sm-1"></div>
                                    <a href="{{ route('equipos.create') }}" class="btn btn-warning">Agregar equipo</a>
                                </div>
                                
                            </div>

                            <div class="row">
                                <div class="col form-group">
                                    <label for="">Marca</label>
                                    <input class="form-control" type="text" id="marca" readonly>
                                </div>

                                <div class="col form-group">
                                    <label for="">Modelo</label>
                                    <input class="form-control" type="text" id="modelo" readonly>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col form-group">
                                    <label for="">Clave inventarial</label>
                                    <input class="form-control" type="text" id="claveInv" readonly>
                                </div>

                                <div class="col form-group">
                                    <label for="">Tipo de equipo</label>
                                    <input class="form-control" type="text" id="tipoEquipo" readonly>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <button class="btn btn-success" type="submit">Guardar</button>
                            </div>
                        </form>
                    @else
                        <div class="row">
                            <div class="col">
                                <h5>Marca</h5>
                                <p>{{ $equipo->marca }}</p>
                            </div>
                            <div class="col">
                                <h5>Modelo</h5>
                                <p>{{ $equipo->modelo }}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col form-group">
                                <h5>Clave inventarial</h5>
                                <p>{{ $equipo->claveInventarial }}</p>
                            </div>
                            <div class="col">
                                <h5>Tipo de equipo</h5>
                                <p>{{ $tipoEquipo->tipoEquipo }}</p>
                            </div>
                        </div>

                        @if($tipoEquipo->tipoEquipo == 'COMPUTADORA')
                            <div class="row justify-content-center">
                                <h3>Datos de la computadora</h3>
                            </div>
                            <div class="row">
                                <div class="col">
                                     <h5>Grupo de trabajo</h5>
                                     <p>{{ $computadora->grupo_de_trabajo }}</p>
                                </div>
                                <div class="col">
                                    <h5>Disco duro</h5>
                                    <p>{{ $computadora->discoDuro }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h5>Sistema operativo</h5>
                                    <p>{{ $computadora->sistemaOperativo }}</p>
                                </div>
                                <div class="col">
                                    <h5>RAM</h5>
                                    <p>{{ $computadora->ram }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h5>Procesador</h5>
                                    <p>{{ $computadora->procesador }}</p>
                                </div>
                            </div>
                        @endif
                        @if($solSop != null)
                            <hr>
                            <form action="{{ url('solicitudes/guardarObservacion') }}" method="post">
                            @csrf
                                <input type="hidden" name="idSol" value="{{ $solicitud->id }}">
                                <div class="form-group">
                                    <label>Observaciones</label>
                                    <input class="form-control" type="text" name="observacion" value="{{ $solicitud->observaciones }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Tipo de reparacion</label>
                                    <select name="tipoReparacion" class="form-control">
                                    @foreach($tipoReparacion as $tipoRe)
                                        <option value="{{ $tipoRe->id }}" @if($solicitud->tipoReparacion == $tipoRe->id) selected @endif>{{ $tipoRe->tipoReparacion }}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="row justify-content-center">
                                    <button class="btn btn-success" type="submit">Guardar</button>
                                </div>
                            </form>
                        @endif
                    @endif
                    </div>
                </div>
            </div>

            @if($solSop != null)
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
                        <form action="{{ url('solicitudes/guardarDiagnostico') }}" method="post">
                        @csrf
                            <input type="hidden" name="idSol" value="{{ $solicitud->id }}">
                            <div class="form-group">
                                <label for="">Diagnóstico</label>
                                <textarea class="form-control" name="diagnostico" cols="30" rows="3">{{ $solicitud->diagnostico }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="">Carpeta respaldada</label>
                                <input class="form-control" type="text" name="carpeta" value="{{ $solicitud->respaldo }}">
                            </div>

                            <div class="row justify-content-center">
                                <button class="btn btn-success">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endif
        </div>

        @if($solSop != null && $equipo != null)
        <div class="row justify-content-around mt-3 mb-3">
            <form action="{{ url('solicitudes/terminar') }}" method="post">
            @csrf
                <input type="hidden" id="idSol" name="idSol" value="{{ $solicitud->id }}">
                <button id="btnTerminar" type="submit" class="btn btn-success">Terminar solicitud</button>
            </form>
            <form action="{{ url('solicitudes/posponer') }}" method="post">
            @csrf
                <input type="hidden" id="idSol" name="idSol" value="{{ $solicitud->id }}">
                <button class="btn btn-danger" type="submit">Posponer solicitud</button>
            </form>
        </div>
        @endif
    </div>
</div>

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.6/jspdf.plugin.autotable.min.js"></script>
    <script src="{{ asset('js/equipos/buscar.js') }}"></script>
@endsection