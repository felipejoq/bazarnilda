@extends('layouts.app')

@section('content')

    <style>
        .select-wrapper, .dataTables_filter, .dataTables_info, .dropdown-trigger, .select-dropdown { display: none; }
    </style>

    <div class="container">
        <div class="row card-panel z-depth-0 white">
            <div class="hide-on-small-only">
                @include('layouts.opciones')
            </div>
            <div class="col s12 m12 l9 xl9 card-body">
                <h6>Retirar productos de bodega</h6>
                <p class="divider"></p>
                <div class="retirar-productos">
                    <div class="row">
                        <div class="input-field col s12 m12 l12 xl12">
                            <label for="codigoproducto">Ingrese el código del producto:</label>
                            <input id="codigoproducto" placeholder="El CÓDIGO AQUÍ..." type="text" class="validate">
                        </div>

                        <div class="tabla-productos col s12 m12 l12 x12">

                            <table class="display" id="tbretirarproductos">
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
                                            <a class="modal-trigger black-text" id="verretiros-{!! $producto->id !!}" href="#retirarmodal">
                                                <i class="material-icons tiny">launch</i> Retirar
                                            </a>

                                            <script>
                                                $('table').on('click', "#verretiros-{!! $producto->id !!}", function() {
                                                    $.ajax({
                                                        url: "productos/{!! $producto->id !!}",
                                                        type: 'GET',
                                                        error: function () {
                                                            console.log('hubo un error');
                                                        },
                                                        success: function (objeto) {

                                                            var t = $('#tbdetallep').DataTable();

                                                            $('#productoid').val(objeto.id);

                                                            t.clear();

                                                            $.each(objeto.retiradas, function (index, value) {

                                                                var date = new Date(value.pivot.created_at);
                                                                var newDate = date.toString('dd/mm/yy');

                                                                t.row.add([
                                                                    value.name,
                                                                    value.pivot.accion,
                                                                    value.pivot.cantidad,
                                                                    objeto.nombre,
                                                                    newDate
                                                                ]).draw(true);

                                                                console.log(value);

                                                            });
                                                        }
                                                    });
                                                });
                                            </script>

                                        </td>
                                    </tr>

                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.modals.retiros.retirar')

    <script>
        $(document).ready(function() {

            $('#retirarmodal').modal();

            var table = $('#tbretirarproductos').DataTable({
                responsive: true, //transforma la tabla en responsiva, cuando cambia el tamaño se agrupan las filas
                language : {
                    "sProcessing":     "Procesando...",
                    "sLengthMenu":     "Lista _MENU_ productos",
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
                    'autoWidth'   : true
                }
            });

            $('#codigoproducto').on('keyup', function () {
                table.search(this.value).draw();
            });

            $('#cierramodalretira').click(function () {
                t.clear();
            });

            @if(session()->has('retiro_exitoso'))
                M.toast({html: '{!! session('retiro_exitoso') !!}', classes: 'rounded'});
            @endif

        });
    </script>

@endsection
