<?php

include('../connection.php');
include("../../views/partials/header_index.php");
session_start();
//guardar
if (!empty($_POST['btnSave'])) {

    $id_user = $_SESSION['id_user'];
    $id_book = $_POST['id_book'];
    $desde = $_POST['desde'];
    $hasta = $_POST['hasta'];

    $query = "INSERT INTO book_rental(from_date, until_date, id_book, id_user) VALUES ('$desde','$hasta','$id_book','$id_user')";

    $query_update_available = "UPDATE book SET available= '0' WHERE id_book='$id_book'";

    $save_rental = mysqli_query($mysqli, $query);
    $update_book = mysqli_query($mysqli, $query_update_available);
    if ($save_rental) {
        echo '<div class="row">
                <div class="col s4 offset-s4">
                    <h5>Libro solicitado con éxito ✅</h5>
                    <div class="progress">
                        <div class="indeterminate green"></div>
                    </div>
                </div>
            </div>';
        header('refresh:1.5;url=../../views/book/book.php?registrado');
        mysqli_close($mysqli);
    } else {
        echo '<div class="row">
                <div class="col s4 offset-s4">
                    <h5>Error 🛑</h5>
                    <p>No se pudo guardar el registro</p>
                    <div class="progress">
                        <div class="indeterminate red"></div>
                    </div>
                </div>
            </div>';
        header('refresh:1.5;url=../../views/book/book.php?error');
        mysqli_close($mysqli);
    }

} else {
    echo '<div class="row">
            <div class="col s4 offset-s4">
                <h5>Error 🛑</h5>
                <p>No se pudo guardar el registro</p>
                <div class="progress">
                    <div class="indeterminate red"></div>
                </div>
            </div>
        </div>';
    header('refresh:1.5;url=../../views/book/book.php?error');
    mysqli_close($mysqli);
}

//include("../../views/partials/footer_index.php");