<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <title>Pokedex</title>
</head>
<body>
<header>
    <?php
    include_once("./src/header.php");
    ?>
</header>

<main>
<div>
    <form class="searchForm">
        <input type="text" class="" placeholder="Search..">
        <button class="w3-button w3-black   w3-round-large w3-round-large">¿Quien es este pokemon?</button>
    </form>
</div>


<table class="w3-table-all w3-card-4 pokemonList">

   <tr>
       <th>imagen</th>
       <th>tipo</th>
       <th>numero</th>
       <th>nombre</th>
       <th>Acciones</th>
   </tr>
    <tr>
        <td> <img src="./img/123.png" class="w3-circle" alt="Alps"> </td>
        <td>
            <img src="./img/Tipo_Bicho.webp" class="w3-circle" alt="Alps">
            <img src="./img/Tipo_Volador.webp" class="w3-circle" alt="Alps">
        </td>
        <td> <p class="info"> #123 </p> </td>
        <td> <p class="info"> Scyther </p> </td>
        <td> <button class="w3-button w3-black  w3-hover-red w3-round-large">eliminar</button> <button class="w3-button w3-black  w3-round-large">modificar</button></td>
    </tr>

</table>
</main>

<footer>
    <?php
    include_once ("./src/footer.php");
    ?>
</footer>
</body>
</html>

<?php
