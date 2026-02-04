<?php
function createDB()
{
    $conex = "mysql:host=127.0.0.1";
    $user = "root";
    $pass = "";

    try {
        $bd = new PDO($conex, $user, $pass);

        $sql = "CREATE DATABASE IF NOT EXISTS videoclub";

        $bd->exec($sql);
        $bd = null;
    } catch (PDOException $e) {
        echo 'Error en la base de datos: ' . $e->getMessage();
    }
}

function createTables()
{
    $conex = "mysql:host=127.0.0.1;dbname=videoclub";
    $user = "root";
    $pass = "";

    try {
        $bd = new PDO($conex, $user, $pass);

        $actores = "CREATE TABLE IF NOT EXISTS actores(
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(100) NOT NULL,
        apellidos VARCHAR(100) NOT NULL,
        fotografía VARCHAR(50) NOT NULL";

        $peliculas = "CREATE TABLE IF NOT EXISTS peliculas(
        id INT AUTO_INCREMENT PRIMARY KEY,
        titulo VARCHAR(255) NOT NULL,
        genero VARCHAR(50) NOT NULL,
        pais VARCHAR(50) NOT NULL,
        anyo INT NOT NULL,
        cartel VARCHAR(255) NOT NULL";

        $actuan = "CREATE TABLE IF NOT EXISTS actuan (
        id_pelicula INT NOT NULL,
        id_actor INT NOT NULL,
        PRIMARY KEY (id_pelicula, id_actor)";

        $usuarios = "CREATE TABLE IF NOT EXISTS usuarios (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(100) NOT NULL,
        password VARCHAR(100) NOT NULL,
        rol VARCHAR(100) DEFAULT ('Por revisar')";

        $bd->exec($peliculas);
        $bd->exec($actores);
        $bd->exec($actuan);
        $bd->exec($usuarios);

        $bd = null;
    } catch (PDOException $e) {
        echo 'Error en la base de datos: ' . $e->getMessage();
    }
}
