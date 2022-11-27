<?php
include('../../controllers/connection.php');
session_start();

if (empty($_SESSION['user'])) {
    header('location: ../../index.php');
}

require_once "../partials/header_index.php";
require_once "../partials/navbar.php";
/* require_once "../partials/sidebar.php"; */


//Query_publisher
$query_publishers = "SELECT * FROM publisher";
$result_publishers = mysqli_query($mysqli, $query_publishers);

?>

<div class="row">
    <div class="col m3">
        <div class="row">
            <h3>Editorial</h3>
        </div>
        <div class="row">
            <form class="col s12" action="../../controllers/save/save_publisher.php" method="POST">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="name" type="text" class="validate" name="name" />
                        <label for="name">Nombre</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="url" type="text" class="validate" name="url" />
                        <label for="url">Sitio Web</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="email" type="text" class="validate" name="email" />
                        <label for="email">Email</label>
                    </div>
                </div>

                <input type="submit" id="btnGuardar" class="btn" value="Guardar" name="btnSave" />
            </form>
        </div>

    </div>
    <div class="col m1"></div>
    <div class="col m8 s4 m7" id="contenedor">
        <!-- Cuadro de búsqueda -->
        <div class="row"></div>
        <table class="responsive-table striped" id="tabla">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Sitio Web</th>
                    <th>Email</th>
                    <th></th>
                </tr>
            </thead>

            <tbody id="table-body">
                <!-- Contenido dinámico -->
                <?php foreach ($result_publishers as $key => $value) { ?>

                <tr>
                    <td>
                        <?php echo $value['name'] ?>
                    </td>
                    <td>
                        <?php echo $value['url'] ?>
                    </td>

                    <td>
                        <?php echo $value['email'] ?>
                    </td>
                   
                    <td>
                        <a href="#modalEdit<?php echo $value['id_publisher']; ?>" id=<?php echo $value['id_publisher']; ?>
                            class="btn btn-small yellow lighten-1 modal-trigger" name="btnEditar">
                            <i class="material-icons">edit</i>
                        </a>
                    </td>
                    <td>
                        <a href="#modalDelete<?php echo $value['id_publisher']; ?>" id=<?php echo $value['id_publisher']; ?>
                            class="btn btn-small red lighten-2 modal-trigger" name="btnEliminar">
                            <i class="material-icons">delete</i>
                        </a>
                    </td>
                </tr>
                <!-- incluimos los modales -->
                <?php include('modals/modal_edit.php'); ?>
                <?php include('modals/modal_delete.php'); ?>

                <?php 
                } ?>
            </tbody>
        </table>

    </div>
</div>


<?php
require_once "../partials/footer_index.php";
?>