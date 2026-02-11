<?php
require("./../scripts/bbdd.php");
require("./../scripts/funciones.php");

insertarPeli($_SESSION["peli-name"], $_SESSION["peli-genero"] , $_SESSION["peli-pais"], $_SESSION["peli-year"], $_SESSION["peli-img"],$_GET["actores"]);
