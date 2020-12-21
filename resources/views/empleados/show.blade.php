@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Empleado #'.$empleado->id) }}</div>

                <div class="card-body">

                    <div class="row justify-content-center">
                        <div class="col">
                            <div class="col">
                                <h5>Nombre</h5>
                                <p>{{ $empleado->nombre.' '.$empleado->apellidoPat.' '.$empleado->apellidoMat }}</p>
                            </div>

                            <div class="col">
                                <h5>Telefono personal</h5>
                                <p>
                                @if($empleado->telefonoPersonal==null)
                                    NO DATA
                                @else
                                    {{ $empleado->telefonoPersonal }}
                                @endif
                                </p>
                            </div>

                            <div class="col">
                                <h5>Extencion Oficina</h5>
                                <p>@if($empleado->extencionTelOf==null)
                                    NO DATA
                                @else
                                    {{ $empleado->extencionTelOf }}
                                @endif</p>
                            </div>

                            <div class="col">
                                <h5>CUIP</h5>
                                <p>{{ $empleado->CUIP }}</p>
                            </div>

                            <div class="col">
                                <h5>Area</h5>
                                <p>{{ $area->area }}</p>
                            </div>
                            
                            <div class="col">
                                <h5>Estatus</h5>
                                <p>{{ $estatus->estatus }}</p>
                            </div>
                        </div>

                        <div class="col">
                            <a href="{{ route('empleados.index') }}" class="btn btn-secondary">Regresar</a>
                            <div class="w-100 m-3"></div>
                            <a href="{{ route('empleados.edit',$empleado->id) }}" class="btn btn-warning">Editar</a>
                            <div class="w-100 m-3"></div>
                            <form action="{{ route('empleados.destroy',$empleado->id) }}" method="post">
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