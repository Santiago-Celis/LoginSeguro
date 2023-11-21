<?php

$database = 'login';
$username = 'root';
$password = '';
$server = 'localhost';


$db = mysqli_connect($server, $username, $password, $database);

if(!$db){
    echo 'no se ha logrado la conexion';
}

?>