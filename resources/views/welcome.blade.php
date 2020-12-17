@extends('layouts.guest')

@section('styles')
<link href="{{ asset('css/estilo.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid">
            <div class="row">

                <main class="col ml-sm-auto px-md-2 py-md-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-9">
                            <div class="container">
                                <h1 class="text-center">Mesa de ayuda</h1>
                                <div class="row justify-content-center">
                                <a class="text-center" href="{{ route('home') }}"><img src="{{asset('js/solicitudes/fge.png')}}" alt="FISCALIA GENERAL DEL ESTADO DE GUERRERO"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </main>
            </div>
        </div>

        @endsection

        @section('scripts')
        <script src="{{ asset('js/empleados/buscar.js') }}"></script>
        @endsection