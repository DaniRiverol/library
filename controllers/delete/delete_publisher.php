<?php
include("../../views/partials/header_index.php");
include('../connection.php');
session_start();

$id = $_POST['id_publisher'];

//eliminar
$query = "DELETE FROM publisher WHERE id_publisher= '$id'";

$result_delete = mysqli_query($mysqli, $query);

if ($result_delete) {
    echo '<div class="row">
    <div class="col s4 offset-s4">
        <h5>Eliminando</h5>
        <div class="progress">
            <div class="indeterminate red"></div>
        </div>
    </div>
</div>';
    header('refresh:2.5;url=../../views/publisher/publisher.php?eliminado');

} else {
    echo '<div class="row">
    <div class="col s4 offset-s4">
        <h5>Error 🛑</h5>
        <p>No se pudo eliminar la editorial</p>
        <div class="progress">
            <div class="indeterminate red"></div>
        </div>
    </div>
</div>';
    header('refresh:2.5;url=../../views/publisher/publisher.php?error');
    mysqli_close($mysqli);
}


//include("../../views/partials/footer_index.php");
?>
