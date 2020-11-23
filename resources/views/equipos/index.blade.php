@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Gestion equipos') }}</div>

                <div class="card-body">

                    <div class="row justify-content-center mb-3 ">
                        <a href="{{ route('equipos.create') }}" class="btn btn-primary">Agregar Equipo</a>
                    </div>

                    <form action="" class="form-inline mb-3">
                        <div class="form-group">
                            <input class="form-control" type="text" name="" id="" placeholder="Buscar">
                        </div>

                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </form>

                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <td scope="col">ID</td>
                                <td scope="col">Marca</td>
                                <td scope="col">Modelo</td>
                                <td scope="col">No. Serie</td>
                                <td scope="col">Clave Inventarial</td>
                                <td scope="col">--</td>
                            </tr>
                        </thead>
                         <tbody>
                            @foreach ($equipos as $equipo)
                            <tr>
                                <td>{{ $equipo->id }}</td>
                                <td>{{ $equipo->marca }}</td>
                                <td>{{ $equipo->modelo }}</td>
                                <td>{{ $equipo->numeroSerie }}</td>
                                <td>{{ $equipo->claveInventarial }}</td>
                                <td><a href="{{ route('equipos.show',$equipo->id) }}">VER</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>



                </div>
            </div>
        </div>
    </div>
</div>

@endsection