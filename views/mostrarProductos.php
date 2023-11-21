<?php
require("../db.php");
require("./nav.php");



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
    <div style="display: flex; flex-wrap: wrap;">

        <?php
        $sql = "SELECT * FROM productos";
        $resultado = mysqli_query($db, $sql);

        while ($cartas = mysqli_fetch_assoc($resultado)) {
        ?>
            <div class="card">
                <img src="data:image/jpeg;base64,<?php echo base64_encode($cartas["imagen"]) ?>" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $cartas['nombre'] ?></h5>
                    <p class="card-text"><?php echo $cartas['descripcion'] ?></p>
                    <p class="card-text">precio: <?php echo $cartas['precio'] ?></p>
                    <form action="./operaciones.php" method="post">
                        <input type="number" hidden name="idProducto" value="<?php print($cartas['id']); ?>">
                        <button type="submit" name="editar" class="btn btn-success">Editar</button>
                        <button type="submit" name="eliminar" class="btn btn-danger">Eliminar</button>
                    </form>
                </div>
            <?php } ?>
            </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>