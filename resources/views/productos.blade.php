@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row card-panel z-depth-0 white">
            <div class="hide-on-small-only">
                @include('layouts.opciones')
            </div>

            <div class="col s12 m12 l9 xl9 card-body">
                <h6>Tabla de productos</h6>
                <div class="tabla-productos">

                    <table class="display" id="tbproductos">
                        <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Bodega</th>
                            <th>Cantidad</th>
                            <th>Ingreso</th>
                            <th>Opciones</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($listaproductos as $producto)

                            <tr>
                                <td>{{ $producto->barcode }}</td>
                                <td>{{ $producto->nombre }}</td>
                                <td>{{ $producto->bodega->nombre }}</td>
                                <td>{{ $producto->cantidad }}</td>
                                <td>{{ $producto->created_at->format('d/m/Y') }}</td>
                                <td>
                                    <a class="modal-trigger black-text" id="verp-{!! $producto->id !!}" href="#verproductos">
                                        <i class="material-icons tiny">remove_red_eye</i>
                                    </a> /

                                    <script>
                                        $('table').on('click', "#verp-{!! $producto->id !!}", function() {
                                            $.ajax({
                                                url: "{{route('productos.show',compact('producto'))}}",
                                                error: function () {
                                                    console.log('hubo un error');
                                                },
                                                success: function (objeto) {

                                                    JsBarcode("#barcode", objeto.barcode, {
                                                        width:1,
                                                        height:50,
                                                        fontSize:15,
                                                        displayValue: true
                                                    });

                                                    $('#nombre_producto').html(objeto.nombre);
                                                    $('#talla_producto').html(objeto.talla);
                                                    $('#cantidad_producto').html(objeto.cantidad);
                                                    $('#minimo_producto').html(objeto.minimo);
                                                    $('#categoria_producto').html(objeto.categoria.nombre);
                                                    $('#bodega_producto').html(objeto.bodega.nombre);
                                                    $('#detalle_producto').html(objeto.descripcion);

                                                }
                                            });
                                        });
                                    </script>

                                    <a class="modal-trigger black-text" id="editp-{{ $producto->id }}" href="#editarproducto">
                                        <i class="material-icons tiny">create</i>
                                    </a> /

                                    <script>
                                        $('table').on('click', "#editp-{!! $producto->id !!}", function() {
                                            $.ajax({
                                                url: "{{route('productos.show',compact('producto'))}}",
                                                error: function () {
                                                    console.log('hubo un error');
                                                },
                                                success: function (objeto) {

                                                    $('#categoria_productoe').formSelect();
                                                    $('#bodega_productoe').formSelect();

                                                    $('#nombre_productoe').val(objeto.nombre);
                                                    $('#talla_productoe').val(objeto.talla);
                                                    $('#cantidad_productoe').val(objeto.cantidad);
                                                    $('#minimo_productoe').val(objeto.minimo);
                                                    $('#categoria_productoe').val(objeto.categoria.id);
                                                    $('#bodega_productoe').val(objeto.bodega.id);
                                                    $('#detalle_productoe').val(objeto.descripcion);

                                                    $('#formeditaproducto').attr('action', 'productos/'+objeto.id);

                                                    M.updateTextFields();                                                }
                                            });
                                        });
                                    </script>

                                    <a class="modal-trigger black-text" id="delp-{!! $producto->id !!}" href="#eliminarproducto">
                                        <i class="material-icons tiny">delete</i>
                                    </a>

                                    <script>
                                        $('table').on('click', "#delp-{!! $producto->id !!}", function() {
                                            $.ajax({
                                                url: "{{route('productos.destroy',compact('producto'))}}",
                                                error: function () {
                                                    console.log('hubo un error');
                                                },
                                                success: function (objeto) {

                                                    JsBarcode("#barcode", objeto.barcode, {
                                                        width:1,
                                                        height:50,
                                                        fontSize:15,
                                                        displayValue: true
                                                    });

                                                    $('#nombre_productodel').html(objeto.nombre);
                                                    $('#talla_productodel').html(objeto.talla);
                                                    $('#cantidad_productodel').html(objeto.cantidad);
                                                    $('#minimo_productodel').html(objeto.minimo);
                                                    $('#categoria_productodel').html(objeto.categoria.nombre);
                                                    $('#bodega_productodel').html(objeto.bodega.nombre);
                                                    $('#detalle_productodel').html(objeto.descripcion);

                                                    $('#formeliminaproducto').attr('action', 'productos/'+objeto.id);


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
                        <a class="btn-floating btn-large waves-effect waves-light red modal-trigger btn-flat" href="#agregarproducto">
                            <i class="material-icons">add</i></a>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.modals.verproductos')
        @include('layouts.modals.agregarproducto')
        @include('layouts.modals.editarproducto')
        @include('layouts.modals.eliminarproducto')

    </div>

    <script>
        $(document).ready(function(){
            $('#verproductos').modal();
            $('#agregarproducto').modal();
            $('#editarproducto').modal();
            $('#eliminarproducto').modal();


            var table = $('#tbproductos').DataTable({
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

            @if(session()->has('producto_agregado'))
                M.toast({html: '{!! session('producto_agregado') !!}', classes: 'rounded'});
            @endif

            @if(session()->has('producto_editado'))
                M.toast({html: '{!! session('producto_editado') !!}', classes: 'rounded'});
            @endif

            @if(session()->has('producto_eliminado'))
                M.toast({html: '{!! session('producto_eliminado') !!}', classes: 'rounded'});
            @endif
        });
    </script>
@endsection
