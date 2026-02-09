<?php
require("./scripts/bbdd.php");

createDB();
createTables();

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login de usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary position-fixed w-100 p-2 header">
        <h1 class="navbar-brand m-0 mx-3"> <i class="fa-solid fa-film"></i> Videoclub online</h1>
    </nav>
    <div class="container-md m-auto login-container d-flex align-items-center justify-content-center w-100 contenedor">
        <form action="./pages/login.php" method="post" class="w-75">
            <fieldset class="form__fieldset">
                <p class="form__icon"><i class="fa-solid fa-film"></i></p>
                <p>Videoclub Online</p>
                <div class="mb-3 w-75">
                    <label for="userName" class="form-label">Nombre de usuario</label>
                    <input required type="userName" class="form-control" name="userName" id="userName" aria-describedby="emailHelp" placeholder="Tu nombre">
                </div>
                <div class="mb-3 w-75">
                    <label for="pass" class="form-label">Contraseña</label>
                    <input required type="password" class="form-control" id="pass" name="pass" placeholder="Tu contraseña">
                </div>
                <?php
                if (isset($_GET["error"]) && $_GET["error"] == true) {
                    echo "<p class='error-message'>El usuario o la contraseña no existen</p>";
                }
                ?>
                <button type="submit" class="btn btn-primary w-75">Acceder</button>
            </fieldset>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>