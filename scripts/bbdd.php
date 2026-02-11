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
        rol VARCHAR(100) NOT NULL)";

        $inserts = "INSERT INTO actores (nombre, apellidos, fotografia) VALUES
        ('Leonardo', 'DiCaprio', 'dicaprio.jpg'),
        ('Scarlett', 'Johansson', 'johansson.jpg'),
        ('Brad', 'Pitt', 'pitt.jpg'),
        ('Natalie', 'Portman', 'portman.jpg'),
        ('Christian', 'Bale', 'bale.jpg'),
        ('Edward', 'Norton', 'norton.jpg'),
        ('Heath', 'Ledger', 'ledger.jpg'),
        ('Mila', 'Kunis', 'kunis.jpg');


        INSERT INTO peliculas (titulo, genero, pais, anyo, cartel) VALUES
        ('Inception', 'Ciencia ficción', 'Estados Unidos', 2010, 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fcdn.shopify.com%2Fs%2Ffiles%2F1%2F1416%2F8662%2Fproducts%2Finception_2010_imax_original_film_art_2000x.jpg%3Fv%3D1551890318&f=1&nofb=1&ipt=e7653ef55bd5ce1e6513e0f041a54e526946e3a4148933cd7becf945392e507b'),
        ('Lost in Translation', 'Drama', 'Estados Unidos', 2003, 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fc8.alamy.com%2Fcomp%2FR59HCA%2Flost-in-translation-original-movie-poster-R59HCA.jpg&f=1&nofb=1&ipt=bcdcb98541398e1151bb7b7e2d7d67fa7f3a73551590618b677e11834a11d3fc'),
        ('Fight Club', 'Drama', 'Estados Unidos', 1999, 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.cine.com%2Fpeliculas%2F1969%2Fcartel%2F1969_cartel_orig.jpg&f=1&nofb=1&ipt=a9c8e62d77053f1c03d5f700d436ea14e7deb8522d6ca9922b4bb38af5869c83'),
        ('Black Swan', 'Thriller', 'Estados Unidos', 2010, 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fpics.filmaffinity.com%2Fblack_swan-861293346-large.jpg&f=1&nofb=1&ipt=816f2429e42789f965e64f7491fe93057c25522723232ba2f20719b3af517441'),
        ('The Dark Knight', 'Acción', 'Estados Unidos', 2008, 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.themoviedb.org%2Ft%2Fp%2Foriginal%2FeP5NL7ZlGoW9tE9qnCdHpOLH1Ke.jpg&f=1&nofb=1&ipt=f0ab417e2eadcd144a1b5cd40e8af7c1b48b6f0e7c85d7b75196e0958a62f2d3');

        INSERT INTO actuan (id_pelicula, id_actor) VALUES
        (1, 1),
        (2, 2),
        (3, 3),
        (3, 6),
        (4, 4),
        (5, 5),
        (5, 7);

        INSERT INTO usuarios (username, password, rol) VALUES
        ('admin1', 'pass', '1'),
        ('admin2', 'pass', '1'),
        ('usuario1', 'pass', '0'),
        ('usuario2', 'pass', '0'),
        ('usuario3', 'pass', '0');";

        $bd->exec($peliculas);
        $bd->exec($actores);
        $bd->exec($actuan);
        $bd->exec($usuarios);
        // $bd->exec($inserts);

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
