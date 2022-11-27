<?php
include("../../views/partials/header_index.php");
include('../connection.php');
session_start();

$id = $_POST['id_user'];

//eliminar
$query = "DELETE FROM users WHERE id_user= '$id'";

$result_delete = mysqli_query($mysqli, $query);

if ($result_delete) {
    echo '<div class="row">
    <div class="col s4 offset-s4">
        <h5>Usuario eliminado con éxito ✅</h5>
        <div class="progress">
            <div class="indeterminate green"></div>
        </div>
    </div>
</div>';
    header('refresh:2.5;url=../../views/user/profile.php?eliminado');
    mysqli_close($mysqli);
} else {
    echo '<div class="row">
                <div class="col s4 offset-s4">
                    <h5>Error 🛑</h5>
                    <p>No se pudo eliminar el usuario</p>
                    <div class="progress">
                        <div class="indeterminate red"></div>
                    </div>
                </div>
            </div>';
    header('refresh:2.5;url=../../views/user/profile.php?error');
    mysqli_close($mysqli);
}


//include("../../views/partials/footer_index.php");
?>
