<div id="modalEdit<?php echo $value['id_book'] ?>" class="modal">
    <?php
    $query_publisher = "SELECT id_publisher, name FROM publisher";
    $result_publisher = mysqli_query($mysqli, $query_publisher);
    ?>
    <div class="modal-content">
        <div class="card">
            <div class="card-content">
                <h4 class="card-title">Editar usuario</h4>
                <form class="col s12" action="../../controllers/edit/edit_book.php" method="POST">
                    <div class="row">
                        <input type="text" name="id_book" value="<?php echo $value['id_book']; ?>" class="disabled" />
                        <div class="input-field col  s6">
                            <input id="titulo" type="text" class="validate" name="title" value="<?php echo
                                $value['title']; ?>" />
                            <label for="titulo">Título</label>
                        </div>

                        <div class="input-field col s6">
                            <input id="autor" type="text" class="validate" name="author" value="<?php echo
                                $value['author']; ?>"/>
                            <label for="autor">Autor</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="isbn" type="text" class="validate" name="isbn" value="<?php echo $value['isbn'];
                                ?>"/>
                            <label for="isbn">ISBN</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <select name="publisher" id="publisher">
                                <option value="" disabled selected>Selecciona una Editorial</option>
                                <!-- Pintamos las editoriales -->
                                <?php while ($publisher = $result_publisher->fetch_array(MYSQLI_BOTH)) {
                                    echo "<option value=$publisher[id_publisher]>$publisher[name]</option>";
                                } ?>
                            </select>
                            <label for="publisher">Editorial</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="edition" type="text" class="validate" name="edition" value="<?php echo
                                $value['edition']; ?>"/>
                            <label for="edition">Edición</label>
                        </div>

                        <div class="input-field col s6">
                            <input id="year" type="text" class="validate" name="year" value="<?php echo $value['year'];
                                ?>" />
                            <label for="year">Año</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea id="description" class="materialize-textarea" name="description" value="<?php echo
                                $value['description']; ?>"></textarea>
                            <label for="description">Descripción</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <label for="img">Imagen url</label>
                            <input id="img" type="text" class="validate" name="img" value=<?php echo $value['image'];?>/>
                        </div>
                    </div>

                    <input type="submit" id="btnGuardar" class="btn" value="Guardar" name="btnEditar" />
                    <input type="reset" class="btn red modal-close" value="Cancelar" />
                </form>
            </div>
        </div>
    </div>
</div>