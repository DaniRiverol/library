<?php
include('../connection.php');
include("../../views/partials/header_index.php");

if (!empty($_POST['btnSave'])) {
    if (!empty($_POST['name']) && !empty($_POST['url']) && !empty($_POST['email'])) {

        $name = $_POST['name'];
        $url = $_POST['url'];
        $email = $_POST['email'];

        $query = "INSERT INTO publisher (
        name,url,email 
        ) VALUES (
            '$name',
            '$url',
            '$email')";

        $save_publisher = mysqli_query($mysqli, $query);

        if ($save_publisher) {
            echo '<div class="row">
            <div class="col s4 offset-s4">
                <h5>Editorial guardada con éxito ✅</h5>
                <div class="progress">
                    <div class="indeterminate green"></div>
                </div>
            </div>
        </div>';
            header('refresh:10;url=../../views/publisher/publisher.php?guardado');
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
            header('refresh:10;url=../../views/publisher/publisher.php?error');
            mysqli_close($mysqli);
        }
    }
}
//include("../../views/partials/footer_index.php");