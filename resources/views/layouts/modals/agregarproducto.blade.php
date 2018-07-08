<!-- Modal Structure -->
<div id="agregarproducto" class="modal modal-fixed-footer">
    <form method="POST" action="{{route('productos.store')}}" class="col s12">
        {{ csrf_field() }}
        <div class="modal-content">
            <div class="col s12 m12 l8 xl8">
                <h6 class="">Agregar producto</h6>
                <div class="divider"></div>
                <div class="row">
                    <div class="input-field col s12 m12 l12 xl12">
                        <input name="nombre" id="nombre" type="text" class="validate">
                        <label for="nombre">Nombre del producto</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6 l2 xl2">
                        <input name="talla" id="talla" type="text" class="validate">
                        <label for="talla">Talla</label>
                    </div>
                    <div class="input-field col s12 m6 l2 xl2">
                        <input name="cantidad" id="cantidad" type="number" class="validate">
                        <label for="cantidad">Cantidad</label>
                    </div>
                    <div class="input-field col s12 m6 l2 xl2">
                        <input name="minimo" id="minimo" type="number" class="validate">
                        <label for="minimo">Mínimo</label>
                    </div>
                    <div class="input-field col s12 m12 l3 xl3">
                        <select name="categoria" id="categoria">
                            <option value="" disabled selected>Categorías...</option>
                            @foreach($listacategorias as $categoria)
                                <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                            @endforeach
                        </select>
                        <label for="categoria">Categoría</label>
                    </div>
                    <div class="input-field col s12 m12 l3 xl3">
                        <select name="bodega" id="bodega">
                            <option value="" disabled selected>Bodegas...</option>
                            @foreach($listabodegas as $bodega)
                                <option value="{{$bodega->id}}">{{$bodega->nombre}}</option>
                            @endforeach
                        </select>
                        <label for="categoria">Bodega</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <textarea name="descripcion" class="materialize-textarea"></textarea>
                        <label for="detalle">Detalles del producto</label>
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


