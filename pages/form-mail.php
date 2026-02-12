<?php
require("./../scripts/bbdd.php");
session_start();
$arrayAdmins = getAdmins();

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar mail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="./../css/style.css">
    <link rel="stylesheet" href="./../css/peli-create.css">
    <link rel="stylesheet" href="./../css/form-mail.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary position-fixed w-100 p-2 header">
        <h1 class="navbar-brand m-0 mx-3"> <i class="fa-solid fa-film"></i> Videoclub online</h1>
    </nav>
    <div class="container-md m-auto login-container d-flex align-items-center justify-content-center w-100 contenedor create-container">
        <form action="./../scripts/send-mail.php" method="post" class="w-75">
            <fieldset class="form__fieldset fielsdet-mail">
                <div class="mb-3 w-75">
                    <label for="user-mail" class="form-label">Tu correo</label>
                    <input type="email" required class="form-control" name="user-mail" id="user-mail" placeholder="tucorreo@ejemplo.com">
                </div>
                <div class="mb-3 w-75">
                    <label for="user-mail" class="form-label">Elige administrador</label>
                    <select name="admin" id="admin" class="w-100" required>
                        <option value="" selected disabled>Administradores</option>
                        <?php foreach ($arrayAdmins as $admin) { ?>
                            <option value="<?php echo $admin["mail"] ?>"> <?php echo $admin["username"] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="mb-3 w-75">
                    <label for="asunto" class="form-label">Asunto</label>
                    <input required class="form-control" name="asunto" id="asunto" placeholder="Asunto del mensaje">
                </div>
                <div class="mb-3 w-75">
                    <label for="mensaje" class="form-label">Mensaje</label>
                    <br>
                    <textarea name="mensaje" id="mensaje" placeholder="Tu mensaje" class="w-100" rows="10"></textarea>
                </div>
                <div class="d-flex align-middle justify-content-evenly w-100 mt-5">
                    <a href="./dashboard.php" class="btn btn-primary w-25">Volver</a>
                    <button type="submit" class="btn btn-primary w-25">Enviar</button>
                </div>
            </fieldset>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>