@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Bienvenida') }}</div>

                <div class="card-body">
                    <div class="row justify-content-center">
                        <h1>¡BIENVENIDO!</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/empleados/cuip.js') }}"></script>
@endsection
