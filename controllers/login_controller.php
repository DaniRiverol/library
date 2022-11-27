<?php
include("../views/partials/header_index.php");
include('connection.php');
session_start();

if (!empty($_POST["btnIngresar"])) {

    if (!empty($_POST['user']) && !empty($_POST['password'])) {
        $usuario = $_POST['user'];
        $pass = $_POST['password'];

        $query = "SELECT * FROM users WHERE user = '$usuario'";
        $resultado = mysqli_query($mysqli, $query);

        if ($data = $resultado->fetch_object()) {
            if (password_verify($pass, $data->password)) {
                echo '<div class="row">
                <div class="col s4 offset-s4">
                    <h5>Ingresando ✅</h5>
                    <div class="progress">
                        <div class="indeterminate green"></div>
                    </div>
                </div>
            </div>';
                $_SESSION['id_user'] = $data->id_user;
                $_SESSION['user'] = $data->user;
                $_SESSION['full_name'] = $data->full_name;
                $_SESSION['role'] = $data->role;


                header('refresh:2.5; url=../views/book/book.php');
            } else {
                echo '<div class="row">
                <div class="col s4 offset-s4">
                    <h5>Error 🛑</h5>
                    <p>Usuario o Contraseña incorrectos</p>
                    <div class="progress">
                        <div class="indeterminate red"></div>
                    </div>
                </div>
            </div>';
                header('refresh:1; url=../index.php');
            }
        } else {
            echo '<div class="row">
                <div class="col s4 offset-s4">
                    <h5>Error 🛑</h5>
                    <p>Usuario o Contraseña incorrectos</p>
                    <div class="progress">
                        <div class="indeterminate red"></div>
                    </div>
                </div>
            </div>';
            header('refresh:2; url=../index.php');

            mysqli_close($mysqli);
        }
    }

} 

//include("../views/partials/footer_index.php");
?>


