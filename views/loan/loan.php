<?php
include('../../controllers/connection.php');
session_start();
$id = $_SESSION["id_user"];
if (empty($_SESSION['user'])) {
    header('location: ../../index.php');
}
require_once "../partials/header_index.php";
require_once "../partials/navbar.php";

//query Loan
if ($_SESSION['role'] != "alumno") {
    //si no es alumno trae todos los registros 

    $query = "SELECT id_rental, title, description, from_date, until_date, full_name, shift, grade, book.id_book FROM book_rental BR INNER JOIN book ON BR.id_book = book.id_book INNER JOIN users U ON BR.id_user = U.id_user";

} else {
    //si es alumno solo muestra los registros del alumno
    $query = "SELECT id_rental, title, description, from_date, until_date, full_name, shift, grade, available, book.id_book FROM book_rental BR INNER JOIN book ON BR.id_book = book.id_book INNER JOIN users U ON BR.id_user = U.id_user WHERE BR.id_user = '$id'";
}
$result_loan = mysqli_query($mysqli, $query);
?>

<div class="row">
    <div class="col s12">

        <div class="col m1"></div>
        <div class="col s10" id="contenedor">
            <!-- Cuadro de búsqueda -->
            <div class="row">

            </div>
            <?php
                    if ($result_loan->fetch_array()< 1) {
                        echo "<tr>
                                <td>
                                    <h5>No solicitaste libros todavía</h5> 
                                </td> 
                            </tr>";
                     ?>
                    <?php }else { ?>
            <table class="responsive-table centered striped" id="tabla">
                <thead>
                    <tr>
                        <th>Libro</th>
                        <th>Descripción</th>
                        <th>Fecha de préstamo</th>
                        <th>Fecha de devolución</th>
                        <th>Nombre Alumno</th>
                        <th>Grado</th>
                        <th>Turno</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody id="table-body">
                    <!-- Contenido dinámico -->
                   
                        
                      <?php  foreach ($result_loan as $key => $value) { ?>

                    <tr>
                        <td>
                            <?php echo $value['title'] ?>
                        </td>
                        <td>
                            <?php echo $value['description'] ?>
                        </td>
                        <td>
                            <?php echo $value['from_date'] ?>
                        </td>

                        <td>
                            <?php echo $value['until_date'] ?>
                        </td>
                        <td>
                            <?php echo $value['full_name'] ?>
                        </td>
                        <td>
                            <?php echo $value['grade'] ?>
                        </td>

                        <td>
                            <?php echo $value['shift'] ?>
                        </td>

                        <!-- Si el libro no esta disponible entonces muestra el botón devolver libro   -->
                        <?php if ($_SESSION['role'] == "alumno") {
                                if ($value['available'] != 1) { ?>
                        <td>
                            <a href="#modalDevolver<?php echo $value['id_rental']; ?>" id=<?php echo
                                $value['id_rental']; ?>
                                class="btn btn-small green lighten-1 modal-trigger" name="btnDevolver">
                                Devolver
                            </a>
                        </td>
                        <?php } else { ?>
                        <td>
                            <a href="#" class="btn btn-small green lighten-1" disabled>
                                Devuelto
                            </a>
                        </td>

                        <?php }
                            } ?>
                    </tr>
                    <!-- incluimos los modales -->
                    <?php include('modals/modal_devolver.php'); ?>
                    <?php }
                    } ?>

                </tbody>
            </table>

        </div>
    </div>
</div>

<?php
require_once "../partials/footer_index.php";
?>