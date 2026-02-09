INSERT INTO actores (nombre, apellidos, fotografía) VALUES
('Leonardo', 'DiCaprio', 'dicaprio.jpg'),
('Scarlett', 'Johansson', 'johansson.jpg'),
('Brad', 'Pitt', 'pitt.jpg'),
('Natalie', 'Portman', 'portman.jpg'),
('Christian', 'Bale', 'bale.jpg'),
('Edward', 'Norton', 'norton.jpg'),
('Heath', 'Ledger', 'ledger.jpg'),
('Mila', 'Kunis', 'kunis.jpg');


INSERT INTO peliculas (titulo, genero, pais, anyo, cartel) VALUES
('Inception', 'Ciencia ficción', 'Estados Unidos', 2010, 'inception.jpg'),
('Lost in Translation', 'Drama', 'Estados Unidos', 2003, 'lost_translation.jpg'),
('Fight Club', 'Drama', 'Estados Unidos', 1999, 'fight_club.jpg'),
('Black Swan', 'Thriller', 'Estados Unidos', 2010, 'black_swan.jpg'),
('The Dark Knight', 'Acción', 'Estados Unidos', 2008, 'dark_knight.jpg');

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
('usuario3', 'pass', '0');
