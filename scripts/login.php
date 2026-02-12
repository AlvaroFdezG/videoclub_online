<?php
require("./bbdd.php");
require("./funciones.php");

$dataUser = login($_POST["userName"], $_POST["pass"]);

if ($dataUser == false) {
    header("Location: ./../index.php?error=true");
    writeLog($_POST["userName"], "Error de login");
} else {
    session_start();

    $_SESSION["userName"] = $dataUser["username"];
    $_SESSION["rol"] = $dataUser["rol"];
    writeLog($_POST["userName"], "Login correcto");
    header("Location: ./../pages/dashboard.php");
}
