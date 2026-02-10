<?php
require_once("./../classes/Actor.php");
require_once("./../classes/Peliculas.php");

function crearPelis($listaPelis)
{
    $listaPelisObj = [];

    foreach ($listaPelis as $peli) {
        $pelicula = new Pelicula($peli["id"], $peli["titulo"], $peli["genero"], $peli["pais"], $peli["anyo"], $peli["cartel"]);
        $listaPelisObj[] =  $pelicula;
    }

    return $listaPelisObj;
}
