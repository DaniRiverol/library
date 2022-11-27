<?php
include('../connection.php');
include("../../views/partials/header_index.php");


if (!empty($_POST['btnSave'])) {
    if (!empty($_POST['title']) && !empty($_POST['author']) && !empty($_POST['publisher']) && !empty($_POST['isbn']) && !empty($_POST['edition']) && !empty($_POST['description']) && !empty($_POST['year'])) {

        $title = $_POST['title'];
        $author = $_POST['author'];
        $publisher = $_POST['publisher'];
        $isbn = $_POST['isbn'];
        $edition = $_POST['edition'];
        $description = $_POST['description'];
        $year = $_POST['year'];
        if (!empty($_POST['img'])) {
            $image = $_POST['img'];

        } else {
            $image = "https://via.placeholder.com/110";
        }

        $query = "INSERT INTO book (
        id_pubisher, 
        title, 
        author, 
        isbn, 
        edition, 
        year, 
        description, 
        image) VALUES (
            '$publisher',
            '$title',
            '$author',
            '$isbn',
            '$edition',
            '$year',
            '$description',
            '$image')";

        $save_book = mysqli_query($mysqli, $query);

        if ($save_book) {
            echo '<div class="row">
            <div class="col s4 offset-s4">
                <h5>Libro actualizado con éxito ✅</h5>
                <div class="progress">
                    <div class="indeterminate green"></div>
                </div>
            </div>
        </div>';
            header('refresh:1;url=../../views/book/book.php?registrado');
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
            header('refresh:1;url=../../views/book/book.php?error');
            mysqli_close($mysqli);
        }
    }
}
//include("../../views/partials/footer_index.php");