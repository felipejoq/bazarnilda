<!-- Modal Structure -->
<div id="eliminarproducto" class="verproductos modal modal-fixed-footer">
    <form method="POST" id="formeliminaproducto" action="" class="col s12">
        {{csrf_field()}} {{ method_field('DELETE') }}
        <div class="modal-content">
            <div class="col s12 m12 l8 xl8">
                <h6 class="">¿Quiere eliminar este producto?</h6>
                <div class="divider"></div>
                <div class="row">
                    <div class="input-field col s12 m8 l8 xl8">
                        <strong style="font-size: 20px;">Nombre del producto:</strong>
                        <div id="nombre_productodel" style="font-size: 20px;" ></div>
                    </div>
                    <div class="input-field col s12 m4 l4 xl4 text-center">
                        <div class="row">
                            <div class="col s12 m12 l12 xl12 center-align">
                                <div class="codigobarras" id="codigobarras">
                                    <img id="barcode" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6 l2 xl2">
                        <strong style="font-size: 20px;">Talla:</strong>
                        <div id="talla_productodel" style="font-size: 15px;" ></div>
                    </div>
                    <div class="input-field col s12 m6 l2 xl2">
                        <strong style="font-size: 20px;">Stock:</strong>
                        <div id="cantidad_productodel" style="font-size: 15px;" ></div>
                    </div>
                    <div class="input-field col s12 m6 l2 xl2">
                        <strong style="font-size: 20px;">Mínimo:</strong>
                        <div id="minimo_productodel" style="font-size: 15px;" ></div>
                    </div>
                    <div class="input-field col s12 m12 l3 xl3">
                        <strong style="font-size: 20px;">Categoria:</strong>
                        <div id="categoria_productodel" style="font-size: 15px;" ></div>
                    </div>
                    <div class="input-field col s12 m12 l3 xl3">
                        <strong style="font-size: 20px;">Bodega:</strong>
                        <div id="bodega_productodel" style="font-size: 15px;" ></div>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <strong style="font-size: 20px;">Descripción:</strong>
                        <div id="detalle_productodel" style="font-size: 15px;" ></div>
                    </div>
                </div>


            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="modal-close waves-effect waves-green btn-flat">Eliminar</button>
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
        </div>
    </form>
</div>


