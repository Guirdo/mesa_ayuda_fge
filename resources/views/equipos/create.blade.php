@extends('layouts.app')

@section('content')

<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Agregar equipo') }}</div>

                <div class="card-body">

                @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('equipos.store') }}" method="POST" >
                        @csrf
                        <div class="container row justify-content-between">
                         <div class="container row">
                               <div class="form-group">
                                   <label for="">Marca</label>
                                   <input class="form-control" type="text" name="marca" value="{{ old('marca') }}">
                              </div>

                              <div class="form-group ml-5">
                                  <label for="">Modelo</label>
                                  <input class="form-control" type="text" name="modelo" value="{{ old('modelo') }}">
                              </div>
                         </div>
                            <div class="container row">
                               <div class="form-group">
                                  <label for="">Numero de Serie</label>
                                  <input class="form-control" type="text" name="numeroSerie" value="{{ old('numeroSerie') }}">
                               </div>

                              <div class="form-group ml-5">
                                  <label for="">Clave Inventarial</label>
                                  <input class="form-control" type="text" name="claveInventarial" value="{{ old('claveInventarial') }}">
                              </div>

                             <div class="form-group ">
                                 <label for="">Tipo Equipo</label>
                                  <select class="form-control" name="tipoEquipo" id="tipoEquipo">
                                     @foreach($tipoEquipo as $tipo)
                                         <option value="{{ $tipo->id }}">{{ $tipo->tipoEquipo }}</option>
                                      @endforeach
                                 </select>
                             </div>
                         </div>
                     </div>
                     <div id="editData"></div>
                     

                     
                        <a href="{{ route('equipos.index') }}" class="btn btn-secondary">Regresar</a>
                        <button type="submit" class="btn btn-success">Agregar</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('js/equipos/index.js') }}"></script>
@endsection