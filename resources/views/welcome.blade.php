@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col s12 m12 l12 xl12">
                <div class="card-panel z-depth-0 white center-align">
                    <div class="card-title">
                        <h5 class="panel-title">Control de Stock en Bodega</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col s12 m6 l6 xl6 push-m3 push-l3 push-xl3">
                                <p class="center-align"><img src="{{ asset('img/bazarnilda-logo.jpg') }}" alt="" class="responsive-img"></p>
                                Bienvenido(a) al sistema de control de stock para las bodegas de "Bazar Nilda".
                                Ingrese con sus credenciales.
                                <p class="text-center"><a class="waves-effect waves-light btn red lighten-2" href="{{ route('login') }}">Ingresar</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
