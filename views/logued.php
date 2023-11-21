<?php
    require("./nav.php");

session_start();

if(!empty($_SESSION['logueado'])){
    $sesion = $_SESSION['logueado'];
}else{
    header('location: ./login.php');
}


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/nav.css">
</head>
<body>
    <h1>HOLA MUNDO</h1>

    <a href="./cerrar.php">Cerrar Sesion</a>

</body>
</html>

