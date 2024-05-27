<!-- Modal de Editar Usuario -->
<div class="modal" id="editSelfUsers" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Usuario</h5>
            </div>
            <div class="modal-body">
                <x-input label="Usuario" name="user" type="text" text="Agregar nombre de usuario" id="su_input-usuario" size="3" placeh="Nombre de usuario"></x-input>
                <x-input label="Email" name="email" type="email" text="No dejar campo vacío" id="su_input-email" size="3" placeh="correo@email.com"></x-input>
                <div class="form-check">
                    <label class="form-check-label" for="flexCheckDefault" style="font-size: medium; font-weight: 500; margin-bottom: 3%;">
                        Cambiar contraseña
                    </label>
                    <input class="form-check-input" onclick="changePass()" type="checkbox" value="" id="cambiarPass">
                </div>
                <x-input label="Contraseña" name="password" type="password" text="Ingrese una contraseña valida" id="su_input-pass" size="3" placeh="password"></x-input>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="saveUpdateUser()" class="btn btn-primary">Guardar cambios</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>