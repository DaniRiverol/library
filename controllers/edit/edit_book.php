<?php
include("../../views/partials/header_index.php");
include('../connection.php');
session_start();

if (!empty($_POST['btnEditar'])) {
    if (!empty($_POST['title']) && !empty($_POST['author']) && !empty($_POST['isbn']) && !empty($_POST['edition']) && !empty($_POST['description']) && !empty($_POST['year'])) {

        $id = $_POST["id_book"];
        $title = $_POST['title'];
        $author = $_POST['author'];
        //$publisher = $_POST['publisher'];No lo toma y no se porque
        $isbn = $_POST['isbn'];
        $edition = $_POST['edition'];
        $description = $_POST['description'];
        $year = $_POST['year'];
        if (!empty($_POST['img'])) {
            $image = $_POST['img'];

        } else {
            $image = "https://via.placeholder.com/110";
        }

        $query_update = "UPDATE book SET title='$title',author='$author',isbn='$isbn',edition='$edition',year='$year',description='$description',image='$image' WHERE id_book='$id'";
        $result_update = mysqli_query($mysqli, $query_update);
        if ($result_update) {
            echo '<div class="row">
            <div class="col s4 offset-s4">
                <h5>Libro actualizado con éxito ✅</h5>
                <div class="progress">
                    <div class="indeterminate green"></div>
                </div>
            </div>
        </div>';
            header('refresh:2.5;url=../../views/book/book.php?actualizado');
            mysqli_close($mysqli);

        } else {
            echo '<div class="row">
            <div class="col s4 offset-s4">
                <h5>Error 🛑</h5>
                <p>No se pudo actualizar el Libro</p>
                <div class="progress">
                    <div class="indeterminate red"></div>
                </div>
            </div>
        </div>';
            header('refresh:2.5;url=../../views/book/book.php?error');
            mysqli_close($mysqli);
        }
    } else {
        echo '<div class="row">
        <div class="col s4 offset-s4">
            <h5>Error 🛑</h5>
            <p>No se pudo actualizar el Libro</p>
            <p>Todos los campos son requeridos</p>
            <div class="progress">
                <div class="indeterminate red"></div>
            </div>
        </div>
    </div>';
        header('refresh:2.5;url=../../views/book/book.php?error');
        mysqli_close($mysqli);
    }

}
//devolver
if (!empty($_POST['btnDevolver'])) {
    $id_book = $_POST["id_book"];
    echo "ID BOOK" . $id_book;
    $query = "UPDATE book SET available='1' WHERE id_book = '$id_book'";

    $result_update = mysqli_query($mysqli, $query);

    if ($result_update) {
        echo '<div class="row">
        <div class="col s4 offset-s4">
            <h5>Libro devuelto con éxito ✅</h5>
            <div class="progress">
                <div class="indeterminate green"></div>
            </div>
        </div>
    </div>';
        header('refresh:2.5;url=../../views/book/book.php?devuelto');
        mysqli_close($mysqli);
    } else {
        echo '<div class="row">
        <div class="col s4 offset-s4">
            <h5>Error 🛑</h5>
            <p>No se pudo devolver el Libro</p>
            <div class="progress">
                <div class="indeterminate red"></div>
            </div>
        </div>
    </div>';
        header('refresh:2.5;url=../../views/book/book.php?error');
        mysqli_close($mysqli);
    }


}

//include("../../views/partials/footer_index.php");
?>