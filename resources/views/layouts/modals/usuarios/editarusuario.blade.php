<!-- Modal Structure -->
<div id="editarusuario" class="modal modal-fixed-footer">
    <form method="POST" id="formeditausuario" action="" class="col s12">
        {{ csrf_field() }} {{ method_field('PUT') }}
        <div class="modal-content">
            <div class="col s12 m12 l8 xl8">
                <h5 class="">Editar usuario</h5>
                <div class="divider"></div>
                <div class="row">
                    <div class="input-field col s12 m12 l12 xl12">
                        <div class="row">
                            <div class="input-field col s12 m12 l2 xl12">
                                <input name="nombreusuarioe" id="nombreusuarioe" type="text" class="validate">
                                <label for="nombreusuarioe">Nombre del nuevo usuario:</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m6 l6 xl6">
                                <input name="emailusuarioe" id="emailusuarioe" type="email" class="validate">
                                <label for="emailusuario">Email del nuevo usuario:</label>
                            </div>
                            <div class="input-field col s12 m6 l6 xl6">
                                <select name="rolusuarioedita" id="rolusuarioedita">
                                    <option value="" disabled selected>Elija el rol...</option>
                                    <option value="administrador">Administrador</option>
                                    <option value="vendedor">Vendedor</option>
                                    <option value="bodegero">Bodegero</option>
                                </select>
                                <label for="rolusuarioedita">Rol del nuevo usuario:</label>
                            </div>
                        </div>
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
