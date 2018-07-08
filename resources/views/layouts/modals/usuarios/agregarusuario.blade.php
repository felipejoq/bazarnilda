<!-- Modal Structure -->
<div id="agregarusuario" class="modal modal-fixed-footer">
    <form method="POST" action="{{ route('usuarios.store') }}" class="col s12">
        {{ csrf_field() }}
        <div class="modal-content">
            <div class="col s12 m12 l8 xl8">
                <h5 class="">Agregar usuario</h5>
                <div class="divider"></div>
                <div class="input-field col s12 m12 l12 xl12">
                    <div class="row">
                        <div class="input-field col s12 m6 l6 xl6">
                            <input name="nombreusuario" id="nombreusuario" type="text" class="validate">
                            <label for="nombreusuario">Nombre del nuevo usuario:</label>
                        </div>
                        <div class="input-field col s10 m5 l5 xl5">
                            <input name="passwordusuario" placeholder="******" id="passwordusuario" type="password" class="form-control" required>
                            <label for="passwordusuario">Email del nuevo usuario:</label>
                        </div>
                        <div class="col s2 m1 l1 xl1">
                            <button style="height: 55px;" title="Mostrar contraseña ingresada" class="btn btn-default border" type="button" onclick="mostrarPassword()">
                                <i class="material-icons md-18">remove_red_eye</i>
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m6 l6 xl6">
                            <textarea name="emailusuario" id="emailusuario" class="materialize-textarea"></textarea>
                            <label for="emailusuario">Email del nuevo usuario:</label>
                        </div>
                        <div class="input-field col s12 m6 l6 xl6">
                            <select name="rolusuario" id="rolusuario">
                                <option value="" disabled selected>Elija el rol...</option>
                                <option value="administrador">Administrador</option>
                                <option value="vendedor">Vendedor</option>
                                <option value="bodegero">Bodegero</option>
                            </select>
                            <label for="categoria">Rol del nuevo usuario:</label>
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
