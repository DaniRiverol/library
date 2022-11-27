<?php
$db_host = 'localhost';//Servidor DB
$db_user = 'root'; //Usuario DB
$db_password = 'root'; //Pass XAMPP $db_password= '';|MAMP $db_password= 'root'; 
$db_db = 'library-mvc';//DB name
$db_port = 3306; //Puerto servidor
$db_socket = '/Applications/MAMP/tmp/mysql/mysql.sock'; //Socket SOLO para MAMP

$mysqli = mysqli_connect($db_host, $db_user, $db_password, $db_db, $db_port, $db_socket);
//SI NO SE UTILIZA MAMP BORRAR LA VARIABLE $db_socket DE LA CONEXIÓN