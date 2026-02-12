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
        fotografia VARCHAR(500) NOT NULL)";

        $peliculas = "CREATE TABLE IF NOT EXISTS peliculas(
        id INT AUTO_INCREMENT PRIMARY KEY,
        titulo VARCHAR(255) NOT NULL,
        genero VARCHAR(50) NOT NULL,
        pais VARCHAR(50) NOT NULL,
        anyo INT NOT NULL,
        cartel VARCHAR(500) NOT NULL)";

        $actuan = "CREATE TABLE IF NOT EXISTS actuan (
        id_pelicula INT NOT NULL,
        id_actor INT NOT NULL,
        PRIMARY KEY (id_pelicula, id_actor),
        FOREIGN KEY (id_pelicula) REFERENCES peliculas(id) ON DELETE CASCADE,
        FOREIGN KEY (id_actor) REFERENCES actores(id) ON DELETE CASCADE)";

        $usuarios = "CREATE TABLE IF NOT EXISTS usuarios (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(100) NOT NULL UNIQUE,
        password VARCHAR(100) NOT NULL,
        mail VARCHAR(100),
        rol VARCHAR(100) NOT NULL)";

        $bd->exec($peliculas);
        $bd->exec($actores);
        $bd->exec($actuan);
        $bd->exec($usuarios);

        $bd = null;
    } catch (PDOException $e) {
        echo 'Error en la base de datos: ' . $e->getMessage();
    }
}
function login($userName, $password)
{
    $conex = "mysql:host=127.0.0.1;dbname=videoclub";
    $user = "root";
    $pass = "";

    try {
        $bd = new PDO($conex, $user, $pass);
        $userLogin = $bd->prepare("SELECT * FROM usuarios WHERE username=:username AND password=:pass");
        $userLogin->execute([":username" => $userName, ":pass" => $password]);
        if ($userLogin->rowCount() == 1) {
            $userData =  $userLogin->fetch(PDO::FETCH_ASSOC);
            return $userData;
        } else {
            return false;
        }

        $bd = null;
    } catch (PDOException $e) {
        echo '<p class="error-message">Error en la base de datos: <strong>' . $e->getMessage() . '</strong></p>';
    }
}
function getPelis()
{
    $conex = "mysql:host=127.0.0.1;dbname=videoclub";
    $user = "root";
    $pass = "";

    try {
        $bd = new PDO($conex, $user, $pass);
        $sql = $bd->prepare("SELECT * FROM peliculas");
        $sql->execute();

        $pelisData =  $sql->fetchAll(PDO::FETCH_ASSOC);
        return $pelisData;
        $bd = null;
    } catch (PDOException $e) {
        echo '<p class="error-message">Error en la base de datos: <strong>' . $e->getMessage() . '</strong></p>';
    }
}
function getOnePeli($id_peli)
{
    $conex = "mysql:host=127.0.0.1;dbname=videoclub";
    $user = "root";
    $pass = "";

    try {
        $bd = new PDO($conex, $user, $pass);
        $sql = $bd->prepare("SELECT * FROM peliculas WHERE id=:id_peli");
        $sql->execute([":id_peli" => $id_peli]);

        $peliData =  $sql->fetch(PDO::FETCH_ASSOC);
        return $peliData;
        $bd = null;
    } catch (PDOException $e) {
        echo '<p class="error-message">Error en la base de datos: <strong>' . $e->getMessage() . '</strong></p>';
    }
}
function getActores($id_peli)
{
    $conex = "mysql:host=127.0.0.1;dbname=videoclub";
    $user = "root";
    $pass = "";

    try {
        $bd = new PDO($conex, $user, $pass);
        $sql = $bd->prepare("SELECT * FROM actores JOIN actuan ON id = id_actor WHERE id_pelicula like :id_peli");
        $sql->execute([":id_peli" => $id_peli]);

        $listaActores =  $sql->fetchAll(PDO::FETCH_ASSOC);
        return $listaActores;
        $bd = null;
    } catch (PDOException $e) {
        echo '<p class="error-message">Error en la base de datos: <strong>' . $e->getMessage() . '</strong></p>';
    }
}
function borrarPeli($id_peli)
{
    $conex = "mysql:host=127.0.0.1;dbname=videoclub";
    $user = "root";
    $pass = "";

    try {
        $bd = new PDO($conex, $user, $pass);
        $sql = $bd->prepare("DELETE FROM peliculas WHERE id like :id_peli");
        $sql->execute([":id_peli" => $id_peli]);

        $listaActores =  $sql->fetchAll(PDO::FETCH_ASSOC);
        return $listaActores;
        $bd = null;
    } catch (PDOException $e) {
        echo '<p class="error-message">Error en la base de datos: <strong>' . $e->getMessage() . '</strong></p>';
    }
}
function allActores()
{
    $conex = "mysql:host=127.0.0.1;dbname=videoclub";
    $user = "root";
    $pass = "";

    try {
        $bd = new PDO($conex, $user, $pass);
        $sql = $bd->prepare("SELECT * FROM actores");
        $sql->execute();

        $listaActores =  $sql->fetchAll(PDO::FETCH_ASSOC);
        return $listaActores;
        $bd = null;
    } catch (PDOException $e) {
        echo '<p class="error-message">Error en la base de datos: <strong>' . $e->getMessage() . '</strong></p>';
    }
}
function insertarPeli($titulo, $genero, $pais, $anyo, $cartel, $arrayActores)
{
    $conex = "mysql:host=127.0.0.1;dbname=videoclub";
    $user = "root";
    $pass = "";

    try {
        $bd = new PDO($conex, $user, $pass);
        $sql = $bd->prepare("INSERT INTO peliculas (titulo, genero, pais, anyo, cartel) VALUES
        (:titulo, :genero, :pais, :anyo, :cartel)");
        $sql->execute([":titulo" => $titulo, ":genero" => $genero, ":pais" => $pais, ":anyo" => $anyo, ":cartel" => $cartel]);

        // con esta función de PDO obtengo el id de la película que se acaba de insertar, ya que al ser auto incremental no se cuál es
        $id_peli = $bd->lastInsertId();

        // recorro los id de los actores que el usuario ha seleccionado en los checks de la página de peli-create-actores
        $sqlActuan = $bd->prepare("INSERT INTO actuan (id_pelicula, id_actor) VALUES
            (:id_pelicula , :id_actor)");
        foreach ($arrayActores as  $actor) {
            $sqlActuan->execute([":id_pelicula" => $id_peli, ":id_actor" => $actor]);
        }

        $bd = null;
    } catch (PDOException $e) {
        echo '<p class="error-message">Error en la base de datos: <strong>' . $e->getMessage() . '</strong></p>';
    }
}

function insertarPeliEdit($id_peli, $titulo, $genero, $pais, $anyo, $cartel, $arrayActores)
{
    $conex = "mysql:host=127.0.0.1;dbname=videoclub";
    $user = "root";
    $pass = "";

    try {
        $bd = new PDO($conex, $user, $pass);
        $sql = $bd->prepare("INSERT INTO peliculas (id, titulo, genero, pais, anyo, cartel) 
        VALUES (:id, :titulo, :genero, :pais, :anyo, :cartel)");
        $sql->execute([":id" => $id_peli, ":titulo" => $titulo, ":genero" => $genero, ":pais" => $pais, ":anyo" => $anyo, ":cartel" => $cartel]);

        $sqlActuan = $bd->prepare("INSERT INTO actuan (id_pelicula, id_actor) VALUES
            (:id_pelicula , :id_actor)");
        foreach ($arrayActores as  $actor) {
            $sqlActuan->execute([":id_pelicula" => $id_peli, ":id_actor" => $actor]);
        }

        $bd = null;
    } catch (PDOException $e) {
        echo '<p class="error-message">Error en la base de datos: <strong>' . $e->getMessage() . '</strong></p>';
    }
}
function getAdmins()
{
    $conex = "mysql:host=127.0.0.1;dbname=videoclub";
    $user = "root";
    $pass = "";

    try {
        $bd = new PDO($conex, $user, $pass);
        $sql = $bd->prepare("SELECT * FROM usuarios WHERE rol = 1");
        $sql->execute();

        $adminsData =  $sql->fetchAll(PDO::FETCH_ASSOC);
        return $adminsData;
        $bd = null;
    } catch (PDOException $e) {
        echo '<p class="error-message">Error en la base de datos: <strong>' . $e->getMessage() . '</strong></p>';
    }
}
