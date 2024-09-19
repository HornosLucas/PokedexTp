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
    include_once("../src/header.php");

    ?>
</header>

<main>
    <div class="w3-row">
        <div class="imagenPokemon w3-col s4  w3-center">

            <div class="w3-card-4">
                <img src="../img/pokemon/Squirtle.png" alt="Person">
            </div>
        </div>

        <div class="descripcionPokemon w3-col s8  w3-center">
              <img class="tipo" src="../img/tipos/agua.png" alt="Tipo">
            <div class="nombreTipo"><p>Yo Squirtle</p></div>

           <div class="descripcion">
               <p>Squirtle es una de las especies más difíciles de encontrar. Habita tanto aguas dulces como marinas, preferiblemente zonas bastante profundas. Son pequeñas tortugas color celeste con caparazones color café; o rojas en algunos casos, con una cola enrollada que los distingue. Poco después de nacer, sus caparazones se endurecen y se hacen más resistentes a los ataques; muchos objetos rebotarán en ella.</p>
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

<?php


