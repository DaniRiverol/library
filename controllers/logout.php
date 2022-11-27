<?php
include("../views/partials/header_index.php");
require_once '../controllers/connection.php';
session_start();
session_destroy();
header("refresh:1.5;url=../index.php");

?>
<div class="row">
    <div class="col s4 offset-s4">
        <h5>Cerrando Sesión</h5>
        <div class="progress">
            <div class="indeterminate blue"></div>
        </div>
    </div>
</div>

<?php
//include("../views/partials/footer_index.php");
die();