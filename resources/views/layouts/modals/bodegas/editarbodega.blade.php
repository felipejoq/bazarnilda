<!-- Modal Structure -->
<div id="editarbodega" class="modal modal-fixed-footer">
    <form method="POST" id="formeditabodega" action="" class="col s12">

        {{ csrf_field() }} {{ method_field('PUT') }}

        <div class="modal-content">
            <div class="col s12 m12 l8 xl8">
                <h5 class="">Agregar una bodega</h5>
                <div class="divider"></div>
                <div class="row">
                    <div class="input-field col s12 m6 l6 xl6">
                        <input name="nombrebodegae" id="nombrebodegae" type="text" class="validate">
                        <label for="nombrebodegae">Nombre de la bodega</label>
                    </div>
                    <div class="input-field col s12 m6 l6 xl6">
                        <input name="numerobodegae" id="numerobodegae" type="text" class="validate">
                        <label for="numerobodegae">Número de la bodega</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12 m12 l12 xl12">
                        <textarea name="descripcionbodegae" id="descripcionbodegae" class="materialize-textarea"></textarea>
                        <label for="descripcionbodegae">Detalles de la bodega</label>
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
