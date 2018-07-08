<!-- Modal Structure -->
<div id="agregarbodega" class="modal modal-fixed-footer">
    <form method="POST" action="{{ route('bodegas.store') }}" class="col s12">
        {{ csrf_field() }}
        <div class="modal-content">
            <div class="col s12 m12 l8 xl8">
                <h5 class="">Agregar una bodega</h5>
                <div class="divider"></div>
                <div class="row">
                    <div class="input-field col s12 m6 l6 xl6">
                        <input name="nombrebodega" id="nombrebodega" type="text" class="validate">
                        <label for="nombrebodega">Nombre de la bodega</label>
                    </div>
                    <div class="input-field col s12 m6 l6 xl6">
                        <input name="numerobodega" id="numerobodega" type="text" class="validate">
                        <label for="numerobodega">Número de la bodega</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12 m12 l12 xl12">
                        <textarea name="descripcionbodega" id="descripcionbodega" class="materialize-textarea"></textarea>
                        <label for="descripcionbodega">Detalles de la bodega</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="modal-close waves-effect waves-green btn-flat">Guardar</button>
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
        </div>
    </form>
</div>
