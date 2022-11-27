<div id="modalEdit<?php echo $value['id_publisher'] ?>" class="modal">
    <div class="modal-content">
        <div class="card">
            <div class="card-content">
                <h4 class="card-title">Editar Editorial</h4>
                <form class="col s12" action="../../controllers/edit/edit_publisher.php" method="POST">
                    <div class="row">
                        <input type="text" name="id_publisher" value="<?php echo $value['id_publisher']; ?>"
                            class="disabled" />
                        <div class="input-field col s6">
                            <input id="name" type="text" class="validate" name="name"
                                value="<?php echo $value['name']; ?>" />
                            <label for="name">Nombre</label>
                        </div>

                        <div class="input-field col s6">
                            <input id="url" type="text" class="validate" name="url"
                                value="<?php echo $value['url']; ?>" />
                            <label for="url">Sitio Web</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="email" type="text" class="validate" name="email"
                                value="<?php echo $value['email']; ?>" />
                            <label for="email">Email</label>
                        </div>

                        <input type="submit" class="btn" value="Guardar" name="btnEditar" />
                        <input type="reset" class="btn red modal-close" value="Cancelar" />
                </form>

            </div>
        </div>
    </div>
</div>