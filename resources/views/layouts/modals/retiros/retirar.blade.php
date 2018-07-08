<!-- Modal Structure -->
<div id="retirarmodal" class="modal modal-fixed-footer">
    <div class="modal-content">
        <div class="col s12 m12 l8 xl8">
            <h5 class="">Retirar producto</h5>
            <div class="divider"></div>
            <div class="row">
                <form method="POST" action="{{ route('retirarproductos.store') }}" class="col s12">
                    {{ csrf_field() }}

                    <input type="text" name="productoid" id="productoid" hidden>
                    <input type="text" value="retiro" name="accion" id="productoid" hidden>
                    <input type="text" value="{!! auth()->user()->id !!}" name="user_id" id="user_id" hidden>

                    <div class="input-field col s12 m8 l8 xl8">
                        <input name="cantidadretira" id="cantidadretira" type="number" class="validate" required>
                        <label for="cantidadretira">¿Cuantos productos quiere retirar?</label>
                    </div>
                    <div class="input-field col s12 m4 l4 xl4">
                        <button class="btn" style="width: 100%;height: 45px;">Retirar</button>
                    </div>
                </form>


                <div class="col s12 m12 l12 xl12">
                    <h6>Historial de retiros del producto:</h6>
                    <table class="display" id="tbdetallep">
                        <thead>
                        <tr>
                            <th>Usuario</th>
                            <th>Acción</th>
                            <th>Cantidad</th>
                            <th>Producto</th>
                            <th>Fecha</th>
                        </tr>
                        </thead>

                        <tbody>
                        <!--<tr>
                            <td>Uno</td>
                            <td>Dos</td>
                        </tr>-->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#" class="modal-close waves-effect waves-green btn-flat" id="cierramodalretira">Aceptar</a>
        <a href="#" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
    </div>
</div>
