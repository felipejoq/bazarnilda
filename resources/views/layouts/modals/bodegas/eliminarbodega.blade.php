<!-- Modal Structure -->
<div id="eliminarbodega" class="modal modal-fixed-footer">
    <form method="POST" id="formeliminabodega" action="" class="col s12">
        {{ csrf_field() }} {{ method_field('DELETE') }}
        <div class="modal-content">
            <div class="col s12 m12 l8 xl8">
                <h5 class="">¿Quiere eliminar esta bodega?</h5>
                <div class="divider"></div>
                <div class="row">

                    <div class="col s12">
                        <div class="card red darken-1">
                            <div class="card-body">
                                <div class="white-text card-content text-uppercase">
                                    <i class="material-icons tiny">warning</i>
                                    Si elimina esta bodega se eliminarán todos los productos asociados.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="input-field col s12 m12 l12 xl12">
                        <h6>Nombre:</h6>
                        <div id="nombrebodegadel"></div>
                        <p class="divider"></p>
                        <h6>Numero:</h6>
                        <div id="numerobodegadel"></div>
                        <p class="divider"></p>
                        <h6>Descripción:</h6>
                        <div id="descripcionbodegadel"></div>
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
