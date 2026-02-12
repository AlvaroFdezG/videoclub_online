<?php
require("./../scripts/bbdd.php");
require("./../scripts/funciones.php");

session_start();

insertarPeli($_SESSION["peli-name"], $_SESSION["peli-genero"] , $_SESSION["peli-pais"], $_SESSION["peli-year"], $_SESSION["peli-img"],$_POST["actores"]);
