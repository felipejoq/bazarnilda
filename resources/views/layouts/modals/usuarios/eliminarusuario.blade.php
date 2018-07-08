<!-- Modal Structure -->
<div id="eliminarusuario" class="modal modal-fixed-footer">
    <form method="POST" id="formusuarioelimina" action="" class="col s12">
        {{ csrf_field() }} {{ method_field('DELETE') }}
        <div class="modal-content">
            <div class="col s12 m12 l8 xl8">
                <h5 class="">¿Quiere eliminar este usuario?</h5>
                <div class="divider"></div>
                <div class="row">
                    <div class="input-field col s12 m12 l12 xl12">
                        <div>
                            <strong>Nombre:</strong> <span id="nombreusuariodel"></span><br />
                            <strong>Email:</strong> <span id="emailusuariodel"></span><br />
                            <strong>Rol:</strong> <span id="rolusuariodel"></span><br />
                        </div>
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
