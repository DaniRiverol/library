<?php
include('../connection.php');
include("../../views/partials/header_index.php");

if (!empty($_POST['btnEditar'])) {
    if (!empty($_POST['name'])) {
        $id = $_POST['id_publisher'];
        $name = $_POST['name'];
        $url = $_POST['url'];
        $email = $_POST['email'];

        $query = "UPDATE publisher SET name='$name',url='$url',email='$email' WHERE id_publisher = '$id'";

        $update_publisher = mysqli_query($mysqli, $query);

        if ($update_publisher) {
            echo '
        <div class="row">
            <div class="col s4 offset-s4">
                <h5>Editorial guardada con éxito ✅</h5>
                <div class="progress">
                    <div class="indeterminate green"></div>
                </div>
            </div>
        </div>';
            header('refresh:2.5;url=../../views/publisher/publisher.php?guardado');

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
            header('refresh:2.5;url=../../views/publisher/publisher.php?error');
        }
    }
}
//include("../../views/partials/footer_index.php");