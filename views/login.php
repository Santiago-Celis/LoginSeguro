<?php
    require("../db.php");
    require("./nav.php");
    session_start();

    if(!empty($_POST['btn'])){
        $user = $_POST['usuario'];
        $contraseña = $_POST['contraseña'];
        $sql = "SELECT * FROM user WHERE nombre = '$user'";
        $query2 = mysqli_query($db, $sql);
        $confirmacion = mysqli_fetch_assoc($query2);
        $hash = $confirmacion['contraseña'];

        if(password_verify($contraseña, $confirmacion['contraseña']) == true){
            $busqueda = "SELECT * FROM user WHERE nombre = '$user' and contraseña = '$hash' ";
            $query2 = mysqli_query($db, $busqueda);
            if(mysqli_num_rows($query2) == 1){
                header("location: ./logued.php");
                $_SESSION['logueado'] = $user;
            }else{
                echo "no has iniciado sesion";
            }
        }else{
            echo "no has iniciado sesion";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<div class="container">

    <div class="caja">
        <h2>Inicio Sesion</h2>
    
        <form method="POST">
            <label for="">Usuario</label>
                <input type="text" placeholder="Ingresa aqui tu usuario" name="usuario" >
            <label for="">Contraseña</label>
                <input type="text" placeholder="ingrese su contraseña" namespace="contraseña" >
                <input type="submit" value="Enviar"  name="btn" class="btn btn-primary">
        </form>
    </div>    

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>