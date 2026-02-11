INSERT INTO actores (nombre, apellidos, fotografia) VALUES
('Cillian', 'Murphy', 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fcdn.britannica.com%2F10%2F215010-050-A44F9280%2FIrish-actor-Cillian-Murphy-2017.jpg&f=1&nofb=1&ipt=c66bdb8164d5c52650ac66c63df8e116354595474bad7373be35ec6b6a8a48d2'),
('Song', 'Kang-ho', 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fbr.web.img3.acsta.net%2Fpictures%2F19%2F10%2F21%2F17%2F26%2F5135826.jpg&f=1&nofb=1&ipt=c348fce894c101fef3ae32b3c4a1ed730837fe5de6d5442639713c8b0879aed6'),
('Brad', 'Pitt', 'https://external-content.duckduckgo.com/iu/?u=http%3A%2F%2Fwww.canyon-news.com%2Fwp-content%2Fuploads%2F2016%2F11%2Fbrad-pitt.jpg&f=1&nofb=1&ipt=38ae49743ed23fb348f152dbdf6d6ca86d61c42b8041385e7fcf781fe382c6f1'),
('Natalie', 'Portman', 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse3.mm.bing.net%2Fth%2Fid%2FOIP.ZTsjuGIoVev4CnQDAw9DPQHaJ3%3Fpid%3DApi&f=1&ipt=afba98d9eee27342416583a239157ce3e6b51e5fdf81a8d18d340f4524f32d43'),
('Hugh', 'Jackman', 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fm.media-amazon.com%2Fimages%2FM%2FMV5BNDExMzIzNjk3Nl5BMl5BanBnXkFtZTcwOTE4NDU5OA%40%40._V1_.jpg&f=1&nofb=1&ipt=50ad7b1ca6d9b5a6bb832c54ba244a7847215a91445f7f003a8760904a053ef0'),
('Edward', 'Norton', 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fstatic.cinemagia.ro%2Fimg%2Fdb%2Factor%2F00%2F12%2F22%2Fedward-norton-632439l.jpg&f=1&nofb=1&ipt=0d8f02396f7f6024a41443327cc4f7db5b3570f6205acc3307204687e2e19f20'),
('Dafne', 'Keen', 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fcelebmafia.com%2Fwp-content%2Fuploads%2F2019%2F10%2Fdafne-keen-his-dark-materials-tv-show-premiere-in-london-7.jpg&f=1&nofb=1&ipt=092fc17b7229032de1a6106aa0e7afecf834d64efcf85c370d969d99fb5eb9bb'),
('Mila', 'Kunis', 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fcelebmafia.com%2Fwp-content%2Fuploads%2F2017%2F10%2Fmila-kunis-a-bad-moms-christmas-premiere-in-westwood-10-30-2017-18.jpg&f=1&nofb=1&ipt=653fcd019aa6263ce8680149ea7bc8761a576a4f060cc0a6825e1adba701286d');


INSERT INTO peliculas (titulo, genero, pais, anyo, cartel) VALUES
('Interestelar', 'Ciencia ficción', 'Estados Unidos', 2010, 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fes.web.img3.acsta.net%2Fpictures%2F14%2F10%2F02%2F11%2F07%2F341344.jpg&f=1&nofb=1&ipt=45bb4af6aacad1666f82cddb30a6c2a310a7547bdb20ce8f2be8146b245e2de8'),
('Parásitos', 'Drama', 'Corea del Sur', 2003, 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fm.media-amazon.com%2Fimages%2FS%2Fpv-target-images%2F2fee9e617ca8af2eed8123c2686040bc355cad4c5ef7d5f4644e9e2bb39d2192.jpg&f=1&nofb=1&ipt=a76b0f5a8ecbe669f823ff2df706c603c8d351981cfc0c358708577c73fc629e'),
('Pacific Rim', 'Ciencia ficción', 'Estados Unidos', 1999, 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.cine.com%2Fpeliculas%2F1969%2Fcartel%2F1969_cartel_orig.jpg&f=1&nofb=1&ipt=a9c8e62d77053f1c03d5f700d436ea14e7deb8522d6ca9922b4bb38af5869c83'),
('Cisne Negro', 'Thriller', 'Estados Unidos', 2010, 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fpics.filmaffinity.com%2Fblack_swan-861293346-large.jpg&f=1&nofb=1&ipt=816f2429e42789f965e64f7491fe93057c25522723232ba2f20719b3af517441'),
('Logan', 'Acción', 'Estados Unidos', 2008, 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.themoviedb.org%2Ft%2Fp%2Foriginal%2FeP5NL7ZlGoW9tE9qnCdHpOLH1Ke.jpg&f=1&nofb=1&ipt=f0ab417e2eadcd144a1b5cd40e8af7c1b48b6f0e7c85d7b75196e0958a62f2d3');

INSERT INTO actuan (id_pelicula, id_actor) VALUES
(1, 1),
(2, 2),
(3, 3),
(3, 6),
(4, 4),
(4, 8),
(5, 5),
(5, 7);

INSERT INTO usuarios (username, password, rol) VALUES
('admin1', 'pass', '1'),
('admin2', 'pass', '1'),
('usuario1', 'pass', '0'),
('usuario2', 'pass', '0'),
('usuario3', 'pass', '0');
