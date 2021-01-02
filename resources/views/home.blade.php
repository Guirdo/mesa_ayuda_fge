@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
@endsection

@section('content')
<div class="container">
    <h3>Sobre el día de hoy...</h3>

    <div class="row row-col-2 justify-content-between">
        <div class="card text-white bg-info mb-3" style="width: 13rem;">
            <div class="card-header">Recibidas</div>
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="https://picsum.photos/100" alt="">
                </div>
                <div class="col">
                    <div class="card-body row justify-content-center">
                        <h1 class="card-text">{{$recibidas}}</h1>
                    </div>
                </div>
            </div>    
        </div>

        <div class="card text-white bg-success mb-3" style="width: 13rem;">
            <div class="card-header">Terminadas</div>
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="https://picsum.photos/100" alt="">
                </div>
                <div class="col">
                    <div class="card-body row justify-content-center">
                        <h1 class="card-text">{{$terminadas}}</h1>
                    </div>
                </div>
            </div>    
        </div>

        <div class="card text-dark bg-warning mb-3" style="width: 13rem;">
            <div class="card-header">En atencion</div>
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="https://picsum.photos/100" alt="">
                </div>
                <div class="col">
                    <div class="card-body row justify-content-center">
                        <h1 class="card-text">{{$atendidas}}</h1>
                    </div>
                </div>
            </div>    
        </div>

        <div class="card text-white bg-danger mb-3" style="width: 13rem;">
            <div class="card-header">Canceladas</div>
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="https://picsum.photos/100" alt="">
                </div>
                <div class="col">
                    <div class="card-body row justify-content-center">
                        <h1 class="card-text">{{ $canceladas }}</h1>
                    </div>
                </div>
            </div>    
        </div>
        
    </div>

    <div class="row justify-content-between">
        <h3 id="tituloSemana">Semana 28-Dic-2020 al 3-Ene-2021</h3>
        <button class="btn btn-info">Estadistica avanzada</button>
    </div>

    <div id="myChart"></div>
    <br>
    <br>
    <br>
    <br>
    <br>

</div>
@endsection

@section('scripts')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script src="{{ asset('js/home.js') }}"></script>
@endsection
