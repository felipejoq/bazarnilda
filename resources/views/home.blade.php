@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col s12 m12 l12 xl12">
                <div class="card-panel z-depth-0 white">
                    <div class="row">
                        @include('layouts.opciones')
                        <div class="col s12 m12 l9 xl9">


                            <div class="row">
                                <div class="col s12 m12">
                                    <div class="card-panel">
                                        <a class="waves-effect" href="{{route('productos.index')}}">
                                            <i class="material-icons tiny">add_box</i> Administrar Productos
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col s12 m12">
                                    <div class="card-panel">
                                        <a class="waves-effect" href="{{route('retirarproductos.index')}}">
                                            <i class="material-icons tiny">monetization_on</i> Retirar Productos
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col s12 m12">
                                    <div class="card-panel">
                                        <a class="waves-effect" href="{{route('usuarios.index')}}">
                                            <i class="material-icons tiny">person</i> Administrar Usuarios
                                        </a>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
