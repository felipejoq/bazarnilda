@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row card-panel z-depth-0 white">
            <div class="hide-on-small-only">
                @include('layouts.opciones')
            </div>
            <div class="col s12 m12 l9 xl9 card-body">
                <h6>Lista de bodegas</h6>
                <div class="tabla-productos">

                    <table class="display" id="tbbodegas">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Número</th>
                            <th>Descripción</th>
                            <th>Opciones</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($listabodegas as $bodega)
                            <tr>
                                <td>{{ $bodega->nombre }}</td>
                                <td>{{ $bodega->numero }}</td>
                                <td>{{ $bodega->descripcion }}</td>
                                <td>
                                    <a class="modal-trigger black-text" id="verb-{!! $bodega->id !!}" href="#verbodega">
                                        <i class="material-icons tiny">remove_red_eye</i>
                                    </a> /

                                    <script>
                                        $('table').on('click', "#verb-{!! $bodega->id !!}", function() {
                                            $.ajax({
                                                url: "{{route('bodegas.show',compact('bodega'))}}",
                                                error: function () {
                                                    console.log('hubo un error');
                                                },
                                                success: function (objeto) {
                                                    $('#nombrebodegadetalle').html(objeto.nombre);
                                                    $('#descripcionbodegadetalle').html(objeto.descripcion);
                                                    $('#numerobodegadetalle').html(objeto.numero);
                                                }
                                            });
                                        });
                                    </script>

                                    <a class="modal-trigger black-text" id="editb-{!! $bodega->id !!}" href="#editarbodega">
                                        <i class="material-icons tiny">create</i>
                                    </a> /

                                    <script>
                                        $('table').on('click', "#editb-{!! $bodega->id !!}", function() {
                                            $.ajax({
                                                url: "{{route('bodegas.show',compact('bodega'))}}",
                                                error: function () {
                                                    console.log('hubo un error');
                                                },
                                                success: function (objeto) {
                                                    $('#nombrebodegae').val(objeto.nombre);
                                                    $('#descripcionbodegae').val(objeto.descripcion);
                                                    $('#numerobodegae').val(objeto.numero);

                                                    $('#formeditabodega').attr('action', 'bodegas/'+objeto.id);
                                                    M.updateTextFields();
                                                }
                                            });
                                        });
                                    </script>

                                    <a class="modal-trigger black-text" id="delb-{!! $bodega->id !!}" href="#eliminarbodega">
                                        <i class="material-icons tiny">delete</i>
                                    </a>

                                    <script>
                                        $('table').on('click', "#delb-{!! $bodega->id !!}", function() {
                                            $.ajax({
                                                url: "{{route('bodegas.show',compact('bodega'))}}",
                                                error: function () {
                                                    console.log('hubo un error');
                                                },
                                                success: function (objeto) {
                                                    $('#nombrebodegadel').html(objeto.nombre);
                                                    $('#descripcionbodegadel').html(objeto.descripcion);
                                                    $('#numerobodegadel').html(objeto.numero);

                                                    $('#formeliminabodega').attr('action', 'bodegas/'+objeto.id);

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
                        <a class="btn-floating btn-large waves-effect waves-light red modal-trigger btn-flat" href="#agregarbodega">
                            <i class="material-icons">add</i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.modals.bodegas.agregarbodega')
    @include('layouts.modals.bodegas.editarbodega')
    @include('layouts.modals.bodegas.eliminarbodega')
    @include('layouts.modals.bodegas.verbodega')

    <script>
        $(document).ready(function(){
            $('#agregarbodega').modal();
            $('#editarbodega').modal();
            $('#eliminarbodega').modal();
            $('#verbodega').modal();

            $('#tbbodegas').DataTable({
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

            @if(session()->has('bodega_creada'))
                M.toast({html: '{!! session('bodega_creada') !!}', classes: 'rounded'});
            @endif

            @if(session()->has('bodega_editada'))
                M.toast({html: '{!! session('bodega_editada') !!}', classes: 'rounded'});
            @endif

            @if(session()->has('bodega_eliminada'))
                M.toast({html: '{!! session('bodega_eliminada') !!}', classes: 'rounded'});
            @endif

        });
    </script>
@endsection
