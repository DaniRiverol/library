<?php
include('../../controllers/connection.php');
session_start();
$id = $_SESSION["id_user"];
if (empty($_SESSION['user'])) {
    header('location: ../../index.php');
}
if($_SESSION['role']=="alumno")header('location: ../book/book.php');
require_once "../partials/header_index.php";
require_once "../partials/navbar.php";

//Query User
$query_user = "SELECT * FROM users WHERE id_user = $id";
$result_user = mysqli_query($mysqli, $query_user);

$user = $result_user->fetch_object();

//Query Users
$query_users = "SELECT * FROM users";
$result_users = mysqli_query($mysqli, $query_users);

?>

<?php
if ($_SESSION['role'] != "alumno") { ?>
<div class="row">
    <div class="col m3">
        <div class="row">
            <h3>Ingresar Usuario</h3>
        </div>

        <div class="row">
            <form class="col s12" action="../../controllers/save/save_user.php" method="POST">
                <div class="row">
                    <div class="input-field col s6">
                        <input id="nombreCompleto" type="text" class="validate" name="full_name" />
                        <label for="nombreCompleto">Nombre Completo</label>
                    </div>

                    <div class="input-field col s6">
                        <input id="dni" type="text" class="validate" name="id_dni" />
                        <label for="dni">DNI</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="address" type="text" class="validate" name="address" />
                        <label for="address">Dirección</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="phone" type="text" class="validate" name="phone" />
                        <label for="phone">Teléfono</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input id="grade" type="text" class="validate" name="grade" />
                        <label for="grade">Grado</label>
                    </div>
                    <div class="input-field col s6">
                        <label for="shift">Turno</label>
                        <input id="shift" type="text" class="validate" name="shift" />
                    </div>
                </div>
                <div class="row">
                    <!-- si el rol es Admin se habilita el campo ROL -->
                    <?php if ($_SESSION['role'] === "admin") { ?>
                    <div class="input-field col s12">
                        <label for="role">Rol</label>
                        <input id="role" type="text" class="validate" name="role" />
                    </div>

                    <?php } ?>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <label for="user">Usuario</label>
                        <input id="user" type="text" class="validate" name="user" />
                    </div>
                    <div class="input-field col s6">
                        <label for="password">Password</label>
                        <input id="password" type="password" class="validate" name="password" />
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
        <table class="responsive-table centered" id="tabla">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>DNI</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Grado</th>
                    <th>Turno</th>
                    <th></th>
                </tr>
            </thead>

            <tbody id="table-body">
                <!-- Contenido dinámico -->
                <?php foreach ($result_users as $key => $value) { ?>

                <tr>
                    <td>
                        <?php echo $value['full_name'] ?>
                    </td>
                    <td>
                        <?php echo $value['identification_document'] ?>
                    </td>

                    <td>
                        <?php echo $value['address'] ?>
                    </td>
                    <td>
                        <?php echo $value['phone'] ?>
                    </td>
                    <td>
                        <?php echo $value['grade'] ?>
                    </td>

                    <td>
                        <?php echo $value['shift'] ?>
                    </td>
                    <!-- Verifica que la sesion no sea alumno y muestra los botones de eliminación y edición -->
                    <?php if ($_SESSION['role'] != "alumno") { ?>
                    <td>
                        <a href="#modalEdit<?php echo $value['id_user']; ?>" id=<?php echo $value['id_user'] ?>
                            class="btn btn-small yellow lighten-1 modal-trigger" name="btnEditar">
                            <i class="material-icons">edit</i>
                        </a>
                    </td>
                    <?php if ($_SESSION['role'] === "admin") { ?>
                    <td>
                        <a href="#modalDelete<?php echo $value['id_user']; ?>" id=<?php echo $value['id_user']; ?>
                            class="btn btn-small red lighten-2 modal-trigger" name="btnEliminar">
                            <i class="material-icons">delete</i>
                        </a>
                    </td>
                    <?php } ?>
                    <?php } ?>
                </tr>
                <!-- incluimos los modales -->
                <?php include('modals/modal_edit.php'); ?>
                <?php include('modals/modal_delete.php'); ?>
                <?php } ?>
            </tbody>
        </table>

    </div>
</div>
</div>
<?php } ?>
<?php
require_once "../partials/footer_index.php";
?>
