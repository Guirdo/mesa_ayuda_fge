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
                                        <h5>Telefono</h5>
                                        <p>{{ $soporte->telefonoPersonal }}</p>
                                    </div>

                                <div class="col">
                                    <h5>CUIP</h5>
                                    <p>{{ $soporte->CUIP }}</p>
                                </div>  
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>