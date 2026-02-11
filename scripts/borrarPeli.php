<?php
require("./../scripts/bbdd.php");
require("./../scripts/funciones.php");

if (isset($_GET["id_peli"]) || !isset($_SESSION["rol"])) {
    borrarPeli($_GET["id_peli"]);
    header("Location: ./../pages/dashboard.php");
} else {
    header("Location: ./logout.php");
}