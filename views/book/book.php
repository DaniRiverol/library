<?php
include('../../controllers/connection.php');
session_start();

if (empty($_SESSION['user'])) {
    header('location: ../../index.php');
}

require_once "../partials/header_index.php";
require_once "../partials/navbar.php";
//require_once "../partials/sidebar.php";

//query editoriales
$query_publisher = "SELECT id_publisher,name FROM publisher";
$result_publisher = mysqli_query($mysqli, $query_publisher);
//query libros
$query_book = "SELECT id_book, name, title,author, isbn ,edition , year, description, image,available FROM `book` INNER JOIN `publisher` ON id_pubisher = id_publisher";
$result_book = mysqli_query($mysqli, $query_book);

$hoy = new DateTime();
$now = new DateTime();
$hasta = $hoy->add(new DateInterval('P7D'));
?>

<div class="row">
    <div class="col m3">
        <div class="row">
            <!-- Titulo según rol -->
            <?php
            if ($_SESSION['role'] != "alumno") {
                echo "<h3>Ingreso de libros</h3>";
            } else {
                echo "<h3>Listado de libros</h3>";
            }
            ?>
        </div>

        <!-- Si el rol es distinto de alumno mostramos el formulario -->
        <?php if ($_SESSION['role'] != "alumno") { ?>
        <div class="row">
            <form class="col s10" action="../../controllers/save/save_book.php" method="POST">
                <div class="row">
                    <div class="input-field col  s6">
                        <input id="titulo" type="text" class="validate" name="title" />
                        <label for="titulo">Título</label>
                    </div>

                    <div class="input-field col s6">
                        <input id="autor" type="text" class="validate" name="author" />
                        <label for="autor">Autor</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="isbn" type="text" class="validate" name="isbn" />
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
                        <input id="edition" type="text" class="validate" name="edition" />
                        <label for="edition">Edición</label>
                    </div>

                    <div class="input-field col s6">
                        <input id="year" type="text" class="validate" name="year" />
                        <label for="year">Año</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="description" class="materialize-textarea" name="description"></textarea>
                        <label for="description">Descripción</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <label for="img">Imagen url</label>
                        <input id="img" type="text" class="validate" name="img" />
                    </div>
                </div>
                <input type="submit" id="btnGuardar" class="btn" value="Guardar" name="btnSave" />
            </form>
        </div>

        <?php } ?>
        <!-- fin del if -->
    </div>

    <div class="col m9 s4 m7" id="contenedor">
        <!-- Cuadro de búsqueda -->
        <div class="row">
            
        </div>
        <!-- tabla -->
        <table class="responsive-table centered striped" id="tabla">
            <thead class="">
                <tr>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>ISBN</th>
                    <th>Editorial</th>

                    <th>Año</th>
                    <th>Descripción</th>
                    <th>Imagen</th>
                    <th>Disponible</th>
                    <th></th>
                </tr>
            </thead>

            <tbody id="table-body">
                <!-- Contenido dinámico -->
                <?php foreach ($result_book as $key => $value) { ?>

                <tr>

                    <td>
                        <?php echo $value['title'] ?>
                    </td>
                    <td>
                        <?php echo $value['author'] ?>
                    </td>
                    <td>
                        <?php echo $value['isbn'] ?>
                    </td>
                    <td>
                        <?php echo $value['name'] ?>
                    </td>

                    <td>
                        <?php echo $value['year'] ?>
                    </td>
                    <td>
                        <?php echo $value['description'] ?>
                    </td>
                    <td>
                        <img src="<?php echo $value['image'] ?>" alt="img" width="110px" />
                    </td>
                    <td>
                        <!--  -->
                        <?php if ($value['available'] == 1) {
                        echo "Si";
                    } else {
                        echo "No";
                    } ?>

                    </td>
                    <!-- Si el rol es distinto de alumno mostramos los botones de editar y eliminar -->
                    <?php
                    if ($_SESSION['role'] != "alumno") { ?>
                    <td>
                        <a href="#modalEdit<?php echo $value['id_book']; ?>" id=<?php echo $value['id_book'] ?>
                            class="btn btn-small yellow lighten-1 modal-trigger" name="btnEditar">
                            <i class="material-icons">edit</i>
                        </a>
                    </td>
                    <td>
                        <a href="#modalDelete<?php echo $value['id_book']; ?>" id=<?php echo $value['id_book'] ?>
                            class="btn btn-small red lighten-2 modal-trigger" name="btnEliminar">
                            <i class="material-icons">delete</i>
                        </a>
                    </td>
                    <!-- incluimos los modales -->
                    <?php include('modals/modal_edit.php'); ?>
                    <?php include('modals/modal_delete.php'); ?>

                </tr>

                <!-- Si está disponible habilito el botón -->
                <?php } else {

                        if ($value['available'] == 1) { ?>

                <td>
                    <a href="#modalLoan<?php echo $value['id_book']; ?>"
                        class="btn btn-small blue lighten-2 modal-trigger" name="btnSolicitar">
                        Solicitar
                    </a>
                </td>
                <?php include('modals/modal_loan.php'); ?>
                <!-- Si no disponible lo deshabilitamos -->
                <?php } else { ?>
                <td>
                    <a href="" class="btn btn-small red lighten-2 disabled" name="btnSolicitar">
                        Solicitar
                    </a>
                </td>
                <?php }
                    }
                ?>
                <?php } ?>
                <tfooter class="">
                    <tr>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>ISBN</th>
                        <th>Editorial</th>

                        <th>Año</th>
                        <th>Descripción</th>
                        <th>Imagen</th>
                        <th>Disponible</th>
                        <th></th>
                    </tr>
                </tfooter>

            </tbody>
        </table>

    </div>
</div>
<!-- modal -->
<div class="modal" id="modalEdit">
    <?php
    $query_publisher = "SELECT id_publisher, name FROM publisher";
    $result_publisher = mysqli_query($mysqli, $query_publisher);
    ?>
    <form class="col s10" action="../../controllers/save_book.php" method="POST">
        <div class="row">
            <div class="input-field col  s6">
                <input id="titulo" type="text" class="validate" name="title" />
                <label for="titulo">Título</label>
            </div>

            <div class="input-field col s6">
                <input id="autor" type="text" class="validate" name="author" />
                <label for="autor">Autor</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="isbn" type="text" class="validate" name="isbn" />
                <label for="isbn">ISBN</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <select name="publisher" id="publisher">
                    <option value="" disabled selected>Selecciona una Editorial</option>
                    <?php while ($publisher = $result_publisher->fetch_array(MYSQLI_BOTH)) {
                        echo "<option value=$publisher[id_publisher]>$publisher[name]</option>";
                    } ?>
                </select>
                <label for="publisher">Editorial</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <input id="edition" type="text" class="validate" name="edition" />
                <label for="edition">Edición</label>
            </div>

            <div class="input-field col s6">
                <input id="year" type="text" class="validate" name="year" />
                <label for="year">Año</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <textarea id="description" class="materialize-textarea" name="description"></textarea>
                <label for="description">Descripción</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <label for="img">Imagen url</label>
                <input id="img" type="text" class="validate" name="img" />
            </div>
        </div>
        <input type="submit" id="btnGuardar" class="btn" value="Guardar" name="btnSave" />
    </form>
</div>
<?php
require_once "../partials/footer_index.php";
?>