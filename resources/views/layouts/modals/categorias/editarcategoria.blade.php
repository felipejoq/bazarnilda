<!-- Modal Structure -->
<div id="editarcategoria" class="modal modal-fixed-footer">
    <form method="POST" id="formeditacategoria" action="" class="col s12">
        {{ csrf_field() }} {{ method_field('PUT') }}
        <div class="modal-content">
            <div class="col s12 m12 l8 xl8">
                <h5 class="">Editar esta categoría</h5>
                <div class="divider"></div>
                <div class="row">
                    <div class="input-field col s12 m12 l12 xl12">
                        <input name="nombrecategoriae" id="nombrecategoriae" type="text" class="validate">
                        <label for="nombrecategoriae">Nombre de la categoría</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m12 l12 xl12">
                        <textarea name="descripcioncategoriae" id="descripcioncategoriae" class="materialize-textarea"></textarea>
                        <label for="descripcioncategoriaee">Descripción de la categoría</label>
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
