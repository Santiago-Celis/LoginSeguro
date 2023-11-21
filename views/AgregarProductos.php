<?php require("./nav.php") ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>


    <div class="container ">
        <div class="col mt-5">
            <div class="row offset">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="" class="form-label">Nombre del producto</label>
                        <input name="nombre" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Descripcion</label>
                            <textarea class="form-control" id="" name="descripcion" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">precio</label>
                            <input type="number" id="" class="form-control" aria-describedby="" name="precio">
                        </div>
                        <div class="mb-3">
                            <label for="">Imagen</label>
                            <input type="file" name="imagen">
                        </div>

                        <button type="submit" class="btn btn-success" name="enviar"> Agregar </button>

                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>

<?php
require("../db.php");

if (isset($_POST['enviar'])) {
    $nomProd = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $img = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
    if ($_FILES['imagen']['type'] = "jpeg" or $_FILES['imagen']['type'] = "jpg" or $_FILES['imagen']['type'] = "png" or $_FILES['imagen']['type'] = "webp") {
        $sql = "INSERT INTO productos(nombre,descripcion,precio,imagen)
                values('$nomProd','$descripcion','$precio','$img')";
        $resultado = mysqli_query($db, $sql);
        if ($resultado) {
            echo "<script languaje='JavaScript'>
                    alert('El producto se ingreso correctamente');
                    location.assign('AgregarProductos.php');
                    </script> ";
        } else {
            echo "<script languaje='JavaScript'>
                    alert('El producto NO se logro ingresar correctamente');
                    location.assign('AgregarProductos.php');
                    </script> ";
        }
    } else {
        echo "<script languaje='JavaScript'>
            alert('SOLO SE ADMITEN ARCHIVOS JPG, JPEG, PNG O WEBP');
            location.assign('AgregarProductos.php');
            </script> ";
    }
}


?>