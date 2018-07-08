<!-- Modal Structure -->
<div id="agregarcategoria" class="modal modal-fixed-footer">
    <form method="POST" action="{{route('categorias.store')}}" class="col s12">
        {{ csrf_field() }}
        <div class="modal-content">
            <div class="col s12 m12 l8 xl8">
                <h5 class="">Agregar categoría</h5>
                <div class="divider"></div>
                <div class="row">
                    <div class="input-field col s12 m12 l12 xl12">
                        <div class="row">
                            <div class="input-field col s12 m12 l12 xl12">
                                <input name="nombrecategoria" id="nombrecategoria" type="text" class="validate">
                                <label for="nombrecategoria">Nombre de la categoría</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12 xl12">
                                <textarea name="descripcioncategoria" id="descripcioncategoria" class="materialize-textarea"></textarea>
                                <label for="descripcioncategoria">Descripción de la categoría</label>
                            </div>
                        </div>
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
