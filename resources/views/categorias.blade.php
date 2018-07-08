@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row card-panel z-depth-0 white">
            <div class="hide-on-small-only">
                @include('layouts.opciones')
            </div>
            <div class="col s12 m12 l9 xl9 card-body">
                <h6>Lista de categorias</h6>
                <div class="tabla-productos">

                    <table class="display" id="tbcategorias">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Opciones</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($listadecategorias as $categoria)

                            <tr>
                                <td>{{ $categoria->nombre }}</td>
                                <td>{{ $categoria->descripcion }}</td>
                                <td>
                                    <a class="modal-trigger black-text" id="verc-{!! $categoria->id !!}" href="#vercategoria">
                                        <i class="material-icons tiny">remove_red_eye</i>
                                    </a> /

                                    <script>
                                        $('table').on('click', "#verc-{!! $categoria->id !!}", function() {
                                            $.ajax({
                                                url: "{{route('categorias.show',compact('categoria'))}}",
                                                error: function () {
                                                    console.log('hubo un error');
                                                },
                                                success: function (objeto) {
                                                    console.log(objeto);
                                                    $('#nombrecategoriadetalle').html(objeto.nombre);
                                                    $('#descripcioncategoriadetalle').html(objeto.descripcion);
                                                }
                                            });
                                        });
                                    </script>

                                    <a class="modal-trigger black-text" id="editc-{!! $categoria->id !!}" href="#editarcategoria">
                                        <i class="material-icons tiny">create</i>
                                    </a> /

                                    <script>
                                        $('table').on('click', "#editc-{!! $categoria->id !!}", function() {
                                            $.ajax({
                                                url: "{{route('categorias.show',compact('categoria'))}}",
                                                error: function () {
                                                    console.log('hubo un error');
                                                },
                                                success: function (objeto) {

                                                    $('#nombrecategoriae').val(objeto.nombre);
                                                    $('#descripcioncategoriae').val(objeto.descripcion);

                                                    $('#formeditacategoria').attr('action', 'categorias/'+objeto.id);
                                                    M.updateTextFields();
                                                }
                                            });
                                        });
                                    </script>

                                    <a class="modal-trigger black-text" id="delc-{!! $categoria->id !!}" href="#eliminarcategoria">
                                        <i class="material-icons tiny">delete</i>
                                    </a>

                                    <script>
                                        $('table').on('click', "#delc-{!! $categoria->id !!}", function() {
                                            $.ajax({
                                                url: "{{route('categorias.show',compact('categoria'))}}",
                                                error: function () {
                                                    console.log('hubo un error');
                                                },
                                                success: function (objeto) {
                                                    $('#nombrecategoriadel').html(objeto.nombre);
                                                    $('#descripcioncategoriadel').html(objeto.descripcion);

                                                    $('#formeliminacategoria').attr('action', 'categorias/'+objeto.id);
                                                }
                                            });
                                        });
                                    </script>
                                </td>
                            </tr>

                        @endforeach

                        </tbody>
                    </table>

                    <div class=" right center">
                        <a class="btn-floating btn-large waves-effect waves-light red modal-trigger btn-flat" href="#agregarcategoria">
                            <i class="material-icons">add</i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.modals.categorias.vercategoria')
    @include('layouts.modals.categorias.editarcategoria')
    @include('layouts.modals.categorias.eliminarcategoria')
    @include('layouts.modals.categorias.agregarcategoria')

    <script>
        $(document).ready(function(){
            $('#vercategoria').modal();
            $('#editarcategoria').modal();
            $('#eliminarcategoria').modal();
            $('#agregarcategoria').modal();

            $('#tbcategorias').DataTable({
                responsive: true, //transforma la tabla en responsiva, cuando cambia el tamaño se agrupan las filas
                language : {
                    "sProcessing":     "Procesando...",
                    "sLengthMenu":     "Mostrar _MENU_ registros",
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "Ningún dato disponible en esta tabla",
                    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix":    "",
                    "sSearch":         "Buscar:",
                    "sUrl":            "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst":    "Primero",
                        "sLast":     "Último",
                        "sNext":     "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    },
                    'paging'      : true,
                    'lengthChange': false,
                    'searching'   : true,
                    'ordering'    : true,
                    'info'        : true,
                    'autoWidth'   : false
                }
            });

            @if(session()->has('flash'))
                M.toast({html: '{!! session('flash') !!}', classes: 'rounded'});
            @endif

            @if(session()->has('eliminada'))
                M.toast({html: '{!! session('eliminada') !!}', classes: 'rounded'});
            @endif

        });

    </script>
@endsection
