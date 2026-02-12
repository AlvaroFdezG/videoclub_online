<?php
require("./../scripts/bbdd.php");
require("./../scripts/funciones.php");

session_start();
/* 
tengo que borrar la peli y luego volver a insertarla con el mismo id 
para que el reparto en la tabla actuan se borre por cascada
se que lo suyo es hacer un update pero entre los actores que se pueden borrar, añadir o cambiar 
entre películas se daban un montón de casos y se me hacía mas fácil esto 
*/

borrarPeli($_SESSION["id-edit-peli"]);
insertarPeliEdit($_SESSION["id-edit-peli"],$_POST["peli-name"], $_POST["peli-genero"], $_POST["peli-pais"], $_POST["peli-year"], $_POST["peli-img"], $_POST["actores"]);

header("Location: ./../pages/dashboard.php");
