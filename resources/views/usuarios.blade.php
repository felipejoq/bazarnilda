@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row card-panel z-depth-0 white">
            <div class="hide-on-small-only">
                @include('layouts.opciones')
            </div>
            <div class="col s12 m12 l9 xl9 card-body">
                <h6>Lista de usuarios</h6>
                <div class="tabla-productos">

                    <table class="display" id="tbusuarios">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Opciones</th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach($listausuarios as $usuario)
                            <tr>
                                <td>{{ $usuario->name }}</td>
                                <td>{{ $usuario->email }}</td>
                                <td>{{ $usuario->rol }}</td>
                                <td>
                                    <a class="modal-trigger black-text" id="veru-{!! $usuario->id !!}" href="#verusuario">
                                        <i class="material-icons tiny">remove_red_eye</i>
                                    </a> /

                                    <script>
                                        $('table').on('click', "#veru-{!! $usuario->id !!}", function() {
                                            $.ajax({
                                                url: "{{route('usuarios.show',compact('usuario'))}}",
                                                error: function () {
                                                    console.log('hubo un error');
                                                },
                                                success: function (objeto) {
                                                    console.log(objeto);
                                                    $('#nombreusuarioe').html(objeto.name);
                                                    $('#emailusuariover').html(objeto.email);
                                                    $('#rolusuariover').html(objeto.rol);
                                                }
                                            });
                                        });
                                    </script>

                                    <a class="modal-trigger black-text" id="editu-{!! $usuario->id !!}" href="#editarusuario">
                                        <i class="material-icons tiny">create</i>
                                    </a> /

                                    <script>
                                        $('table').on('click', "#editu-{!! $usuario->id !!}", function() {
                                            $.ajax({
                                                url: "{{route('usuarios.show',compact('usuario'))}}",
                                                error: function () {
                                                    console.log('hubo un error');
                                                },
                                                success: function (objeto) {

                                                    $('#rolusuarioedita').formSelect();

                                                    $('#nombreusuarioe').val(objeto.name);
                                                    $('#emailusuarioe').val(objeto.email);
                                                    $('#rolusuarioedita').val(objeto.rol);

                                                    M.updateTextFields();

                                                    $('#formeditausuario').attr('action', 'usuarios/'+objeto.id);


                                                }
                                            });
                                        });
                                    </script>

                                    <a class="modal-trigger black-text" id="delu-{!! $usuario->id !!}" href="#eliminarusuario">
                                        <i class="material-icons tiny">delete</i>
                                    </a>

                                    <script>
                                        $('table').on('click', "#delu-{!! $usuario->id !!}", function() {
                                            $.ajax({
                                                url: "{{route('usuarios.show',compact('usuario'))}}",
                                                error: function () {
                                                    console.log('hubo un error');
                                                },
                                                success: function (objeto) {

                                                    $('#nombreusuariodel').html(objeto.name);
                                                    $('#emailusuariodel').html(objeto.email);
                                                    $('#rolusuariodel').html(objeto.rol);

                                                    $('#formusuarioelimina').attr('action', 'usuarios/'+objeto.id);
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
                        <a class="btn-floating btn-large waves-effect waves-light red modal-trigger btn-flat" href="#agregarusuario">
                            <i class="material-icons">add</i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.modals.usuarios.agregarusuario')
    @include('layouts.modals.usuarios.verusuario')
    @include('layouts.modals.usuarios.editarusuario')
    @include('layouts.modals.usuarios.eliminarusuario')

    <script>

        function mostrarPassword() {
            var x = document.getElementById("passwordusuario");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        $(document).ready(function(){
            $('#agregarusuario').modal();
            $('#verusuario').modal();
            $('#editarusuario').modal();
            $('#eliminarusuario').modal();

            $('#tbusuarios').DataTable({
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

            @if(session()->has('usuario_creado'))
                M.toast({html: '{!! session('usuario_creado') !!}', classes: 'rounded'});
            @endif

            @if(session()->has('usuario_eliminado'))
                M.toast({html: '{!! session('usuario_eliminado') !!}', classes: 'rounded'});
            @endif

            @if(session()->has('usuario_editado'))
                M.toast({html: '{!! session('usuario_editado') !!}', classes: 'rounded'});
            @endif

        });

    </script>
@endsection
