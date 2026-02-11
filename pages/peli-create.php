<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear película</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="./../css/style.css">
    <link rel="stylesheet" href="./../css/peli-create.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary position-fixed w-100 p-2 header">
        <h1 class="navbar-brand m-0 mx-3"> <i class="fa-solid fa-film"></i> Videoclub online</h1>
    </nav>
    <div class="container-md m-auto login-container d-flex align-items-center justify-content-center w-100 contenedor create-container">
        <form action="./../scripts/peli-create-script.php" method="post" class="w-75">
            <fieldset class="form__fieldset">
                <div class="mb-3 w-75">
                    <label for="peli-name" class="form-label">Título</label>
                    <input required class="form-control" name="peli-name" id="peli-name" placeholder="Título de la película">
                </div>
                <div class="mb-3 w-75">
                    <label for="peli-genero" class="form-label">Género</label>
                    <input required class="form-control" name="peli-genero" id="peli-genero" placeholder="Comedia, drama, acción...">
                </div>
                <div class="mb-3 w-75">
                    <label for="peli-year" class="form-label">Año</label>
                    <input required class="form-control" name="peli-year" id="peli-year" placeholder="Año de estreno">
                </div>
                <div class="mb-3 w-75">
                    <label for="peli-img" class="form-label">Enlace del cartel</label>
                    <input required class="form-control" name="peli-img" id="peli-img" placeholder="Pega aquí la url de la imagen">
                </div>
                <div class="d-flex align-middle justify-content-evenly w-100 mt-5">
                    <a href="./dashboard.php" class="btn btn-primary w-25">Volver</a>
                    <button type="submit" class="btn btn-primary w-25">Crear</button>
                </div>
            </fieldset>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>