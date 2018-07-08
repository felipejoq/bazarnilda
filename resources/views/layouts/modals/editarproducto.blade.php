<!-- Modal Structure -->
<div id="editarproducto" class="modal modal-fixed-footer">
    <form method="POST" id="formeditaproducto" action="" class="col s12">
        {{ csrf_field() }} {{ method_field('PUT') }}
        <div class="modal-content">
            <div class="col s12 m12 l8 xl8">
                <h6 class="">Editar este producto</h6>
                <div class="divider"></div>
                <div class="row">
                    <div class="input-field col s12 m12 l12 xl12">
                        <input name="nombre_productoe" id="nombre_productoe" type="text" class="validate">
                        <label for="nombre_productoe">Nombre del producto</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6 l2 xl2">
                        <input name="talla_productoe" id="talla_productoe" type="text" class="validate">
                        <label for="talla_productoe">Talla</label>
                    </div>
                    <div class="input-field col s12 m6 l2 xl2">
                        <input name="cantidad_productoe" id="cantidad_productoe" type="number" class="validate">
                        <label for="cantidad_productoe">Cantidad</label>
                    </div>
                    <div class="input-field col s12 m6 l2 xl2">
                        <input name="minimo_productoe" id="minimo_productoe" type="number" class="validate">
                        <label for="minimo_productoe">Mínimo</label>
                    </div>
                    <div class="input-field col s12 m12 l3 xl3">
                        <select name="categoria_productoe" id="categoria_productoe">
                            <option value="" disabled selected>Categorías...</option>
                            @foreach($listacategorias as $categoria)
                                <option value="{{$categoria->id}}">{{ $categoria->nombre }}</option>
                            @endforeach
                        </select>
                        <label for="categoria">Categoría</label>
                    </div>
                    <div class="input-field col s12 m12 l3 xl3">
                        <select name="bodega_productoe" id="bodega_productoe">
                            <option value="" disabled selected>Bodegas...</option>
                            @foreach($listabodegas as $bodega)
                                <option value="{{$bodega->id}}">{{ $bodega->nombre }}</option>
                            @endforeach
                        </select>
                        <label for="categoria">Bodega</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <textarea name="descripcion_productoe" rows="10" id="detalle_productoe" class="materialize-textarea"></textarea>
                        <label for="detalle_productoe">Detalles del producto</label>
                    </div>
                </div>


            </div>
        </div>
        <div class="modal-footer">
            <button type="" class="modal-close waves-effect waves-green btn-flat">Guardar</button>
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
        </div>
    </form>
</div>


