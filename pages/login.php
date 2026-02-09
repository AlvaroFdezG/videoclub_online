<?php
require("./../scripts/bbdd.php");

$dataUser = login($_POST["userName"], $_POST["pass"]);

if ($dataUser == false) {
    header("Location: ./../index.php?error=true");
} else {
    session_start();

    $_SESSION["userName"] = $dataUser["username"];
    $_SESSION["rol"] = $dataUser["rol"];

    if ($dataUser["rol"] == 0) {
        header("Location: ./dashboard-user.php");
    } elseif ($dataUser["rol"] == 1) {
        header("Location: ./dashboard-admin.php");
    }
}
