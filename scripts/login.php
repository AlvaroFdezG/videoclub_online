<?php
require("./bbdd.php");

$dataUser = login($_POST["userName"], $_POST["pass"]);

if ($dataUser == false) {
    header("Location: ./../index.php?error=true");
} else {
    session_start();

    $_SESSION["userName"] = $dataUser["username"];
    $_SESSION["rol"] = $dataUser["rol"];

    header("Location: ./../pages/dashboard.php");
}
