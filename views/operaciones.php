<?php
include('../db.php');

if (isset($_POST['actualizar'])) {

    $idProducto = $_POST['idProducto'];
    $nomProd = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $img = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

    if ($_FILES['imagen']['type'] = "jpeg" or $_FILES['imagen']['type'] = "jpg" or $_FILES['imagen']['type'] = "png" or $_FILES['imagen']['type'] = "webp") {
        $sql = "INSERT INTO productos(nombre,descripcion,precio,imagen)
                values('$nomProd','$descripcion','$precio','$img')";
        $sql = "UPDATE productos set nombre = '$nomProd', descripcion = '$descripcion',
                precio = '$precio' ,imagen = '$img' where id = $idProducto";
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


if (isset($_POST['editar'])) {
    $id = $_POST['idProducto'];

    $sql = "SELECT * FROM productos where id = $id;";
    $resultado = mysqli_query($db, $sql);

    $producto = mysqli_fetch_assoc($resultado);
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>

    <body>
        <div class="container ">
            <div class="col mt-5">
                <div class="row offset">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="" class="form-label">Nombre del producto</label>
                            <input name="nombre" type="text" class="form-control" value="<?php print($producto['nombre']); ?>" aria-describedby="emailHelp">
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Descripcion</label>
                                <textarea class="form-control" id="" name="descripcion" rows="3"><?php print($producto['descripcion']); ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">precio</label>
                                <input type="number" id="" value="<?php print($producto['precio']); ?>" class="form-control" aria-describedby="" name="precio">
                            </div>
                            <img style="width: 200px;" src="data:image/jpeg;base64,<?php echo base64_encode($producto["imagen"]); ?>" class="card-img-top">
                            <br>
                            <input type="number" hidden name="idProducto" value="<?php print($id); ?>">
                            <div class="mb-3">
                                <label for="">Imagen</label>
                                <input type="file" required name="imagen">
                            </div>

                            <a class="btn btn-secondary" href="./mostrarProductos.php">Cancelar</a>
                            <button type="submit" class="btn btn-primary" name="actualizar"> Actualizar</button>

                    </form>
                </div>
            </div>
        </div>
    </body>

    </html>

<?php
}

if (isset($_POST['eliminar'])) {

    $id = $_POST['idProducto'];
    $sql = "DELETE FROM productos where id = $id;";
    $resultado = mysqli_query($db, $sql);
    if ($resultado) {
        echo "<script languaje='JavaScript'>
                alert('El producto se elimino correctamente');
                location.assign('mostrarProductos.php');
                </script> ";
    } else {
        echo "<script languaje='JavaScript'>
                alert('El producto NO se logro eliminar');
                location.assign('mostrarProductos.php');
                </script> ";
    }
}

?>