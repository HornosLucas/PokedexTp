<?php

$idPokemonElegido = $_GET["id"];
include_once("db.php");
$query_pokemon = "SELECT * FROM pokemon WHERE id = $idPokemonElegido";
$resultado = $conn->query($query_pokemon);
$path_tipos = '/PokedexTp/img/tipos/';

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $pokemonNombre = $fila["nombre"];
        $pokemonDescripcion = $fila["descripcion"];
        $pokemonTipo = $fila["tipo"];
        $pokemonTipo2 = $fila["tipo_2"];
        $pokemonImagen = $fila["imagen"];
        $pokemonId= $fila["id_pokemon"];

    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/profile.css">

    <title>Document</title>
</head>
<body>
<header>
    <?php
    include_once("header.php");

    ?>
</header>

<main>
    <div class="w3-row">
        <div class="imagenPokemon w3-col s4  w3-center">

            <div class="w3-card-4">
                <img class="pokemonImagen" src=<?php echo $pokemonImagen ?> alt="Person">
            </div>
        </div>



        <div class="descripcionPokemon w3-col s8  w3-center">

            <?php
             echo "<img src='" . $path_tipos . $pokemonTipo. ".png" . "' class='w3-circle tipoImagen' alt='Tipo de Pokemon'>";

            if (!empty($pokemonTipo2)) {
                echo "<img  src='" . $path_tipos . $pokemonTipo2 . ".png" . "' class='w3-circle tipoImagen' alt='Tipo Secundario de Pokemon'></td>";


            }
            ?>


            <div class="nombreTipo"><p><?php echo $pokemonNombre ?></p></div>

           <div class="descripcion">
               <p> <?php echo $pokemonDescripcion?></p>
           </div>
        </div>
    </div>
</main>

<footer>
    <?php
    include_once ("../src/footer.php");
    ?>
</footer>
</body>
</html>

