<!-- Modal Structure -->
<div id="eliminarcategoria" class="modal modal-fixed-footer">
    <form method="POST" id="formeliminacategoria" action="" class="col s12">
        {{ csrf_field() }} {{method_field('DELETE')}}
        <div class="modal-content">
            <div class="col s12 m12 l8 xl8">
                <h5 class="">Eliminar esta categoría</h5>
                <div class="divider"></div>
                <div class="row">
                    <div class="input-field col s12 m12 l12 xl12">
                        <h6>Nombre:</h6>
                        <div id="nombrecategoriadel"></div>
                        <p class="divider"></p>
                        <h6>Descripción:</h6>
                        <div id="descripcioncategoriadel"></div>
                        <p class="divider"></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="modal-close waves-effect waves-green btn-flat">Eliminar</button>
            <a href="" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
        </div>
    </form>
</div>
