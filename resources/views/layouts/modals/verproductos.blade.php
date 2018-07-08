<!-- Modal Structure -->
<div id="verproductos" class="verproductos modal modal-fixed-footer">
    <form method="POST" action="" class="col s12">
        <div class="modal-content">
            <div class="col s12 m12 l8 xl8">
                <h6 class="">Detalles del producto</h6>
                <div class="divider"></div>
                <div class="row">
                    <div class="input-field col s12 m8 l8 xl8">
                        <strong style="font-size: 20px;">Nombre producto:</strong>
                        <div id="nombre_producto" style="font-size: 20px;" ></div>
                    </div>
                    <div class="input-field col s12 m4 l4 xl4 text-center">
                        <div class="row">
                            <div class="col s12 m12 l12 xl12 center-align">
                                <div class="codigobarras" id="codigobarras">
                                    <img id="barcode" />
                                </div>
                                <p></p>
                                <button id="btnbarcode" class="btn" type="button" style="width: 100%;">Imprimir</button>

                                <script>
                                    $('#btnbarcode').click(function(){
                                        $(".codigobarras").print();
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6 l2 xl2">
                        <strong style="font-size: 20px;">Talla:</strong>
                        <div id="talla_producto" style="font-size: 15px;" ></div>
                    </div>
                    <div class="input-field col s12 m6 l2 xl2">
                        <strong style="font-size: 20px;">Stock:</strong>
                        <div id="cantidad_producto" style="font-size: 15px;" ></div>
                    </div>
                    <div class="input-field col s12 m6 l2 xl2">
                        <strong style="font-size: 20px;">Mínimo:</strong>
                        <div id="minimo_producto" style="font-size: 15px;" ></div>
                    </div>
                    <div class="input-field col s12 m12 l3 xl3">
                        <strong style="font-size: 20px;">Categoria:</strong>
                        <div id="categoria_producto" style="font-size: 15px;" ></div>
                    </div>
                    <div class="input-field col s12 m12 l3 xl3">
                        <strong style="font-size: 20px;">Bodega:</strong>
                        <div id="bodega_producto" style="font-size: 15px;" ></div>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <strong style="font-size: 20px;">Descripción:</strong>
                        <div id="detalle_producto" style="font-size: 15px;" ></div>
                    </div>
                </div>


            </div>
        </div>
        <div class="modal-footer">
            <a class="modal-close waves-effect waves-green btn-flat">Aceptar</a>
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
        </div>
    </form>
</div>


