<?php
require_once("./../classes/Actor.php");
require_once("./../classes/Peliculas.php");

function crearPelis($listaPelis)
{
    $listaPelisObj = [];

    foreach ($listaPelis as $peli) {
        $pelicula = new Pelicula($peli["id"], $peli["titulo"], $peli["genero"], $peli["pais"], $peli["anyo"], $peli["cartel"]);

        // ejecuto función para obtener los actores y los añado a la película
        $listaActores = getActores($peli["id"]);
        // paso la función para crear el array de los objetos de los actores
        $listaActoresObj = crearActores($listaActores);

        $pelicula->setReparto($listaActoresObj);
        $listaPelisObj[] =  $pelicula;
    }

    return $listaPelisObj;
}

function crearActores($listaActores)
{
    $listaActoresObj = [];

    foreach ($listaActores as $actor) {
        $actor = new Actor($actor["id"], $actor["nombre"], $actor["apellidos"], $actor["fotografia"]);
        $listaActoresObj[] =  $actor;
    }

    return $listaActoresObj;
}

function writeLog($user, $info)
{
    $archivo = "./../logs/accesos.log";
    $fecha = date("d-m-Y H:i:s");

    $linea = "$user | $fecha | $info" . PHP_EOL;

    file_put_contents($archivo, $linea, FILE_APPEND);
}
