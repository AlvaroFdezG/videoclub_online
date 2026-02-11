<?php
require("./../scripts/bbdd.php");
require("./../scripts/funciones.php");

$listaActores = allActores();
$_SESSION["peli-name"] = $_GET["peli-name"];
$_SESSION["peli-genero"] = $_GET["peli-genero"];
$_SESSION["peli-pais"] = $_GET["peli-pais"];
$_SESSION["peli-year"] = $_GET["peli-year"];
$_SESSION["peli-img"] = $_GET["peli-img"];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear película | actores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="./../css/style.css">
    <link rel="stylesheet" href="./../css/peli-create.css">
    <link rel="stylesheet" href="./../css/dashboard.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary position-fixed w-100 p-2 header">
        <h1 class="navbar-brand m-0 mx-3"> <i class="fa-solid fa-film"></i> Videoclub online</h1>
    </nav>
    <div class="container-md m-auto login-container d-flex align-items-center justify-content-center w-100 contenedor create-container">
        <form action="./../scripts/peli-create-script.php" method="post" class="w-75">
            <fieldset class="listado-actores">
                <?php foreach ($listaActores as $actor) { ?>

                    <div class="reparto__card">
                        <img class="reparto__img" src="<?php echo $actor["fotografia"] ?>" alt="">
                        <p class="pelis__nombre-actor"><?php echo $actor["nombre"] ?></p>
                        <p><?php echo $actor["apellidos"] ?></p>
                        <input type="checkbox" name="actores[]" id="<?php echo $actor["id"] ?>" value="<?php echo $actor["id"] ?>">
                    </div>
                <?php } ?>
                <button type="submit" class="mt-5 btn btn-primary w-75">Acceder</button>
            </fieldset>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>