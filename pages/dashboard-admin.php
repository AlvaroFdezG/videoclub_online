<?php
require("./../scripts/bbdd.php");
require("./../scripts/funciones.php");
require_once("./../classes/Actor.php");
require_once("./../classes/Peliculas.php");
session_start();

if (!isset($_SESSION["rol"]) || $_SESSION["rol"] != 1) {
    header("Location: ./../index.php?error=true");
}


$listaPelis = getPelis();
$listaPelisObj = crearPelis($listaPelis);

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Administrador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="./../css/style.css">
    <link rel="stylesheet" href="./../css/dashboard.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary position-fixed w-100 p-2 header">
        <h1 class="navbar-brand m-0 mx-3"> <i class="fa-solid fa-film"></i> Videoclub online</h1>
    </nav>
    <div class="container-xl contenedor">

        <h3>Bienvenido administrador <?php echo $_SESSION["userName"] ?></h3>
        <br>
        <section class="pelis">
            <?php foreach ($listaPelisObj as $peli) {?>
                <article class="pelis__peli">
                    <img src="<?php echo $peli->getCartel() ?>" class="pelis__img" alt="">
                    <div class="pelis__datos">
                        <p class="pelis__title"><strong><?php echo $peli->gettitulo() ?></strong></p>
                        <p class="pelis__genero"><?php echo $peli->getgenero() ?></p>
                        <p class="pelis__pais"><?php echo $peli->getpais() ?></p>
                        <p class="pelis__anyo"><?php echo $peli->getAnyo() ?></p>
                    </div>
                    <div class="pelis__botones">
                        <a href="./editar.php?id_peli=<?php echo $peli->getId()?>">Editar</a>
                        <a href="./borrar.php?id_peli=<?php echo $peli->getId()?>">Borrar</a>
                    </div>
                </article>
            <?php } ?>
        </section>
    </div>

</body>

</html>