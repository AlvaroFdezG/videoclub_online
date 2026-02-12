<?php
require("./../scripts/bbdd.php");
require("./../scripts/funciones.php");
session_start();
// me guardo el id de la pelicula para actualizarla luego
$_SESSION["id-edit-peli"] = $_GET["id_peli"];
$dataPeli = getOnePeli($_GET["id_peli"]);
// la añado a un array para aprovechar la función de crear objetos de todas las películas aunque solo sea una
$listaPelis[] = $dataPeli;
$listaPelisObj = crearPelis($listaPelis);
$allActores = allActores();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar película</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="./../css/style.css">
    <link rel="stylesheet" href="./../css/peli-create.css">
    <link rel="stylesheet" href="./../css/dashboard.css">
    <link rel="stylesheet" href="./../css/pelis-edit.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary position-fixed w-100 p-2 header">
        <h1 class="navbar-brand m-0 mx-3"> <i class="fa-solid fa-film"></i> Videoclub online</h1>
    </nav>
    <div class="container-edit">
        <form action="./../scripts/peli-edit-script.php" method="post" class="w-75 form-edit">
            <fieldset class="fieldet-edit">
                <div class="mb-3 w-75">
                    <label for="peli-name" class="form-label">Título</label>
                    <input required class="form-control" name="peli-name" id="peli-name" placeholder="Título de la película" value="<?php echo $listaPelisObj[0]->gettitulo() ?>">
                </div>
                <div class="mb-3 w-75">
                    <label for="peli-genero" class="form-label">Género</label>
                    <input required class="form-control" name="peli-genero" id="peli-genero" placeholder="Comedia, drama, acción..." value="<?php echo $listaPelisObj[0]->getgenero() ?>">
                </div>
                <div class="mb-3 w-75">
                    <label for="peli-pais" class="form-label">País</label>
                    <input required class="form-control" name="peli-pais" id="peli-pais" placeholder="Dónde se hizo" value="<?php echo $listaPelisObj[0]->getpais() ?>">
                </div>
                <div class="mb-3 w-75">
                    <label for="peli-year" class="form-label">Año</label>
                    <input required class="form-control" name="peli-year" id="peli-year" placeholder="Año de estreno" value="<?php echo $listaPelisObj[0]->getAnyo() ?>">
                </div>
                <div class="mb-3 w-75">
                    <label for="peli-img" class="form-label">Enlace del cartel</label>
                    <input required class="form-control" name="peli-img" id="peli-img" placeholder="Pega aquí la url de la imagen" value="<?php echo $listaPelisObj[0]->getCartel() ?>">
                </div>
                <h4 class="mt-3 mb-3">Reparto actual</h4>
                <div class="pelis__reparto-edit d-flex justify-content-center">
                    <?php foreach ($listaPelisObj[0]->getReparto() as $actor) { ?>
                        <div class="d-flex flex-column align-middle justify-content-between">
                            <div class="reparto__card">
                                <img class="reparto__img" src="<?php echo $actor->getfotografia() ?>" alt="">
                                <p class="pelis__nombre-actor"><?php echo $actor->getnombre() ?></p>
                                <p><?php echo $actor->getapellidos() ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <h4 class="mt-5 mb-3">Nuevo reparto</h4>
                <div class="pelis__reparto-edit">
                    <?php foreach ($allActores as $actor) { ?>
                        <div class="d-flex flex-column align-middle justify-content-between">
                            <input class="mb-3" type="checkbox" name="actores[]" id="<?php echo $actor["id"] ?>" value="<?php echo $actor["id"] ?>">
                            <div class="reparto__card">
                                <img class="reparto__img" src="<?php echo $actor["fotografia"] ?>" alt="">
                                <p class="pelis__nombre-actor"><?php echo $actor["nombre"] ?></p>
                                <p><?php echo $actor["apellidos"] ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="d-flex align-middle justify-content-evenly w-100 mt-5">
                    <a href="./dashboard.php" class="btn btn-primary w-25">Volver</a>
                    <button type="submit" class="btn btn-primary w-25">Aceptar</button>
                </div>
            </fieldset>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>