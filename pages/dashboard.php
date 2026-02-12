<?php
require("./../scripts/bbdd.php");
require("./../scripts/funciones.php");
require_once("./../classes/Actor.php");
require_once("./../classes/Peliculas.php");
session_start();

if (!isset($_SESSION["rol"])) {
    header("Location: ./../index.php?error=true");
}

// obtengo el total de las películas
$listaPelis = getPelis();
// le paso a la función el array y las convierto a objetos, en esta función también se añade la lista de objetos de los actores a los objetos de películas
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
    <nav class="navbar navbar-expand-lg bg-body-tertiary position-fixed w-100 p-2 header d-flex justify-content-between pe-md-3">
        <h1 class="navbar-brand m-0 mx-3"><i class="fa-solid fa-film"></i> Videoclub online</h1>
        <a href="./confirm-logout.php" class="text-decoration-none text-danger logout">Cerrar sesión <i class="fa-solid fa-right-from-bracket"></i></a>
    </nav>
    <div class="container-xl contenedor">

        <div class="d-flex justify-content-between">
            <div>
                <h3>Bienvenido <?php echo $_SESSION["userName"] ?></h3>
                <?php if (isset($_COOKIE["last_activity"])) { ?>
                    <p>Última conexión anterior: <?php echo $_COOKIE["last_activity"] ?></p>
                <?php } ?>
            </div>
            <a class="boton-crear" href="./peli-create.php">Crear película +</a>
        </div>
        <section class="pelis">
            <!-- recorro el array de objetos y voy creando un article para cada uno con los datos correspondientes -->
            <?php foreach ($listaPelisObj as $peli) { ?>
                <article class="pelis__peli">
                    <img src="<?php echo $peli->getCartel() ?>" class="pelis__img" alt="">
                    <div class="pelis__info">
                        <div class="pelis__datos">
                            <p class="pelis__title"><strong><?php echo $peli->gettitulo() ?></strong></p>
                            <p class="pelis__genero"><?php echo $peli->getgenero() ?></p>
                            <p class="pelis__pais"><?php echo $peli->getpais() ?></p>
                            <p class="pelis__anyo"><?php echo $peli->getAnyo() ?></p>
                        </div>

                        <div class="pelis__reparto">
                            <!-- recorro el array del reparto y voy creando las tarjetas de los actores -->
                            <?php foreach ($peli->getReparto() as $actor) { ?>
                                <div class="reparto__card">
                                    <img class="reparto__img" src="<?php echo $actor->getfotografia() ?>" alt="">
                                    <p class="pelis__nombre-actor"><?php echo $actor->getnombre() ?></p>
                                    <p><?php echo $actor->getapellidos() ?></p>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                    <!-- solo muestro los botones de editar y borrar si el usuario es admin -->
                    <?php if ($_SESSION["rol"] == 1) { ?>

                        <!-- a los enlaces les creo una variable que paso por get con el id de la película que se está iterando -->
                        <div class="pelis__botones">
                            <a class="pelis__enlace" href="./editar.php?id_peli=<?php echo $peli->getId() ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a class="pelis__enlace --borrar" href="./confirm-delete.php?id_peli=<?php echo $peli->getId() ?>"><i class="fa-solid fa-trash-can"></i></a>
                        </div>

                    <?php } ?>
                </article>
            <?php } ?>
        </section>
    </div>

</body>

</html>