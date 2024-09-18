Query para la creacion de la pokedex:

CREATE DATABASE pokedex

Query para crear las tablas:

CREATE TABLE `pokemon` (
`id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
`id_pokemon` int(11) NOT NULL,
`imagen` varchar(255) NOT NULL,
`nombre` varchar(255) NOT NULL,
`tipo` varchar(255) NOT NULL,
`tipo_2` varchar(255) NOT NULL,
`descripcion` varchar(1500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

Query para llenar la base de datos:

INSERT INTO `pokemon` (`id`, `id_pokemon`, `imagen`, `nombre`, `tipo`, `tipo_2`, `descripcion`) VALUES
(1, 1, '/PokedexTp/img/pokemon/Bulbasaur.png', 'Bulbasaur', 'Planta', 'Veneno', 'Tras nacer, crece alimentándose durante un tiempo de los nutrientes que contiene el bulbo de su lomo.'),
(2, 2, '/PokedexTp/img/pokemon/Ivysaur.png', 'Ivysaur', 'Planta', 'Veneno', 'Cuando el bulbo florece, se dice que dará buena cosecha. Cuanto más sano esté el Pokémon, más hermoso será el aroma que desprenda el bulbo.'),
(3, 3, '/PokedexTp/img/pokemon/Venusaur.png', 'Venusaur', 'Planta', 'Veneno', 'Cuando está muy sano, el aroma de su flor hace que la gente se relaje. Dicen que si cortas la flor, no volverá a crecer.'),
(4, 4, '/PokedexTp/img//pokemon/Charmander.png', 'Charmander', 'Fuego', '', 'La llama en la punta de su cola arde según sus sentimientos. La llama es más fuerte si está feliz y se debilita si se siente triste.'),
(5, 5, '/PokedexTp/img/pokemon/Charmeleon.png', 'Charmeleon', 'Fuego', '', 'Es muy orgulloso de sus cuernos grandes. Los usa para amenazar a los enemigos. La temperatura corporal de este Pokémon puede subir hasta los 900 grados.'),
(6, 6, '/PokedexTp/img/pokemon/Charizard.png', 'Charizard', 'Fuego', 'Volador', 'Es capaz de volar a grandes alturas. Después de volar, su cuerpo se vuelve más cálido que de costumbre y el calor emana de la superficie de su cuerpo.'),
(7, 7, '/PokedexTp/img/pokemon/Squirtle.png', 'Squirtle', 'Agua', '', 'Cuando se siente en peligro, esconde su cuerpo en su caparazón y dispara agua por la boca con mucha fuerza.'),
(8, 8, '/PokedexTp/img/pokemon/Wartortle.png', 'Wartortle', 'Agua', '', 'Los indicios del caparazón de Squirtle empiezan a endurecerse y forman unas protuberancias en forma de espiral en la espalda.'),
(9, 9, '/PokedexTp/img/pokemon/Blastoise.png', 'Blastoise', 'Agua', '', 'Se dice que su cañón de agua tiene una precisión de alcance de hasta 50 metros. Cualquier cosa que golpee se desintegrará en pedazos.'),
(10, 10, '/PokedexTp/img/pokemon/Caterpie.png', 'Caterpie', 'Bicho', '', 'La antena de este Pokémon libera un olor peculiar y fuerte cuando se toca. Pero si la antena se corta, crece otra en su lugar.');
