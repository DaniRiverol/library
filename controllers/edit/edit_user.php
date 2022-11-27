<?php
include("../../views/partials/header_index.php");
include("../connection.php");

session_start();
if (!empty('btnEditar')) {
    if (!empty('full_name') && !empty('id_dni') && !empty('address') && !empty('phone') && !empty('shift') && !empty('user')) {

        $id_user = $_POST['id_user'];
        $name = $_POST['full_name'];
        $dni = $_POST['id_dni'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $grade = $_POST['grade'];
        $shift = $_POST['shift'];
        $user = $_POST['user'];
        $password= $_POST['password'];
        if (!empty($_POST['role'])) {
            $role = $_POST['role'];
        } else {
            $role = "alumno";
        }
        if (!empty($_POST['password'])) {
            $passHash = password_hash($password, PASSWORD_DEFAULT);
        }

        //REVISAR
       
        $query_update = "UPDATE users SET full_name='$name',identification_document='$dni',address='$address',phone='$phone',grade='$grade',shift='$shift',role='$role',user='$user',password='$passHash' WHERE id_user= '$id_user'";

        $result_update = mysqli_query($mysqli, $query_update);

        if ($result_update) {
            echo '<div class="row">
            <div class="col s4 offset-s4">
                <h5>Usuario actualizado con éxito ✅</h5>
                <div class="progress">
                    <div class="indeterminate green"></div>
                </div>
            </div>
        </div>';
            header('refresh:2.5;url=../../views/user/profile.php?actualizado');

        } else {
            echo '<div class="row">
            <div class="col s4 offset-s4">
                <h5>Error 🛑</h5>
                <p>No se pudo actualizar el usuario</p>
                <div class="progress">
                    <div class="indeterminate red"></div>
                </div>
            </div>
        </div>';
            header('refresh:2.5;url=../../views/user/profile.php?error');
        }
    }
}
//include("../../views/partials/footer_index.php");
?>
