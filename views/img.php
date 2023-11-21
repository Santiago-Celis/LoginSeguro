<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require("../db.php");
    $consulta = mysqli_fetch_array(mysqli_query($db, "SELECT * from productos"));
    ?>
    <img src="data:image/jpeg;base64,<?php echo base64_encode($consulta["imagen"])?>">
</body>
</html>