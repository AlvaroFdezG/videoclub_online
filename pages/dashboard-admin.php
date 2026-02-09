<?php
session_start();

if (!isset($_SESSION["rol"]) || $_SESSION["rol"] != 1) {
    header("Location: ./../index.php?error=true");
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Administrador</title>
</head>
<body>
    <h1>Bienvenido administrador <?php echo $_SESSION["userName"] ?></h1>
</body>
</html>