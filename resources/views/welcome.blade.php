@extends('layouts.guest')

@section('content')
<div class="container-fluid">
            <div class="row">

                <main class="col ml-sm-auto px-md-2 py-md-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header">{{ __('Dashboard') }}</div>

                                <div class="card-body">
                                    <form action="">
                                        <div class="form-group row">
                                            <label for="cuipEmpleado" class="col-sm-2">CUIP</label>
                                            <div class="col">
                                                <input type="text" name="cuip" id="" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="" class="col-sm-2">Nombre</label>
                                            <div class="col">
                                                <input type="text" name="nombreEmpleado" id="" class="form-control" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="" class="col-sm-2">Telefono</label>
                                            <div class="col">
                                                <input type="text" name="" id="" class="form-control" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="" class="col-sm-2">Email</label>
                                            <div class="col">
                                                <input type="text" name="" id="" class="form-control" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="" class="col-sm-2">Area</label>
                                            <div class="col">
                                                <input type="text" name="" id="" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </form>

                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </main>
            </div>
        </div>

        @endsection