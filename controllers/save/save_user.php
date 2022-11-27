<?php
include('../connection.php');
include("../../views/partials/header_index.php");

if (!empty('btnSave')) {
    if (!empty('full_name') && !empty('id_dni') && !empty('address') && !empty('phone') && !empty('shift') && !empty('user') && !empty('password')) {

        $nombre = $_POST['full_name'];
        $dni = $_POST['id_dni'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $grade = $_POST['grade'];
        $shift = $_POST['shift'];
        $user = $_POST['user'];

        if (!empty($_POST['role'])) {
            $role = $_POST['role'];
        } else {
            $role = "alumno";
        }
        $password = $_POST['password'];
        $passHash = password_hash($password, PASSWORD_DEFAULT);
        echo $password . " " . $passHash;

        $save_user = "INSERT INTO users(full_name, identification_document, address, phone, grade, shift, role,user, password) VALUES ('$nombre','$dni','$address','$phone','$grade','$shift','$role','$user','$passHash')";
        $result_save = mysqli_query($mysqli, $save_user);
        if ($result_save) {
            echo '<div class="row">
            <div class="col s4 offset-s4">
                <h5>Usuario guardado con éxito ✅</h5>
                <div class="progress">
                    <div class="indeterminate green"></div>
                </div>
            </div>
        </div>';
            header('refresh:2.5;url=../../views/user/profile.php?registrado');
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
            header('refresh:2.5;url=../../views/user/profile.php?error');
            mysqli_close($mysqli);
        }
    }
}
//include("../../views/partials/header_index.php");