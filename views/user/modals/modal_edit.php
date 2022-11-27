<div id="modalEdit<?php echo $value['id_user'] ?>" 
class="modal">
    <div class="modal-content">
        <div class="card">
            <div class="card-content">
                <h4 class="card-title">Editar usuario</h4>
                <form class="col s12" action="../../controllers/edit/edit_user.php" method="POST">
                    <div class="row">
                        <input type="text" name="id_user" value="<?php echo $value['id_user']; ?>" class="disabled"/>
                        <div class="input-field col s6">
                            <input id="nombreCompleto" type="text" class="validate" name="full_name"
                                value="<?php echo $value['full_name']; ?>" />
                            <label for="nombreCompleto">Nombre Completo</label>
                        </div>

                        <div class="input-field col s6">
                            <input id="dni" type="text" class="validate" name="id_dni"
                                value="<?php echo $value['identification_document']; ?>" />
                            <label for="dni">DNI</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="address" type="text" class="validate" name="address"
                                value="<?php echo $value['address']; ?>" />
                            <label for="address">Dirección</label>
                        </div>

                        <div class="input-field col s6">
                            <input id="phone" type="text" class="validate" name="phone" value=<?php echo $value['phone'];
                                ?> />
                            <label for="phone">Teléfono</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="grade" type="text" class="validate" name="grade" value=<?php echo $value['grade'];
                                ?> />
                            <label for="grade">Grado</label>
                        </div>
                        <div class="input-field col s6">
                            <label for="shift">Turno</label>
                            <input id="shift" type="text" class="validate" name="shift" value=<?php echo $value['shift'];
                                ?> />
                        </div>
                    </div>
                    <div class="row">
                        <!-- si el rol es Admin se habilita el campo ROL -->
                        <?php if ($_SESSION['role'] === "admin") { ?>
                        <div class="input-field col s10">
                            <label for="role">Rol</label>
                            <input id="role" type="text" class="validate" name="role"
                            value="<?php echo $value['role'] ?>" />
                        </div>
                        <?php } ?>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <label for="user">Usuario</label>
                            <input id="user" type="text" class="validate" name="user"
                                value="<?php echo $value['user'] ?>" />
                        </div>
                        <div class="input-field col s6">
                            <label for="password">Password</label>
                            <input id="password" type="password" class="validate" name="password"
                                />
                        </div>
                    </div>
                    <input type="submit" id="btnGuardar" class="btn" value="Guardar" name="btnEditar" />
                    <input type="reset" class="btn red modal-close" value="Cancelar" />
                </form>

            </div>
        </div>
    </div>
</div>