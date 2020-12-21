@extends('layouts.app')

@section('content')
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#tipoEquipo > option[value="{{$equipos->idTipoEquipo}}"]').attr('selected', 'selected');
});
</script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Equipo #'.$equipos->id) }}</div>

                <div class="card-body">

                    <form action="{{ route('equipos.update',$equipos->id) }}" method="POST">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="container row justify-content-between">
                            <div class="form-group">
                                <label for="">Marca</label>
                                <input class="form-control" type="text" name="marca" value="{{ $equipos->marca }}">
                            </div>

                            <div class="form-group">
                                <label for="">Modelo</label>
                                <input class="form-control" type="text" name="modelo" value="{{ $equipos->modelo }}">
                            </div>

                            <div class="form-group">
                                <label for="">Numero de Serie</label>
                                <input class="form-control" type="text" name="numeroSerie" value="{{ $equipos->numeroSerie }}">
                            </div>
                        </div>

                        <div class="container row">
                            <div class="form-group">
                                <label for="">Clave Inventarial</label>
                                <input class="form-control" type="text" name="claveInventarial" value="{{ $equipos->claveInventarial }}">
                            </div>

                            <div class="form-group ml-5">
                                 <label for="">Tipo Equipo</label>
                                  <select class="form-control" name="tipoEquipo" id="tipoEquipo" >
                                     @foreach($tipoEquipo as $tipo)
                                         <option value="{{ $tipo->id }}">{{ $tipo->tipoEquipo }}</option>
                                      @endforeach
                                 </select>
                            </div>
                        </div>
                        
                        
                        <a href="{{ route('equipos.show',$equipos->id) }}" class="btn btn-secondary">Regresar</a>
                        <button type="submit" class="btn btn-warning">Editar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script src="{{ asset('js/equipos/edit.js') }}"></script>
@endsection