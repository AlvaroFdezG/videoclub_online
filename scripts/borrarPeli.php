<?php
require("./../scripts/bbdd.php");
require("./../scripts/funciones.php");

if (isset($_GET["id_peli"])) {
    borrarPeli($_GET["id_peli"]);
    header("Location: ./../pages/dashboard.php");
} else {
    header("Location: ./logout.php");
}