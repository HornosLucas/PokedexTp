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
        <td>
            <button class="w3-button w3-black  w3-hover-red w3-round-large">eliminar</button>
            <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-black  w3-round-large">modificar</button>
        </td>
    </tr>

</table>

    <div id="id01" class="w3-modal">
        <div class="w3-modal-content w3-animate-top">

            <header class="w3-container w3-teal">
            <span onclick="document.getElementById('id01').style.display='none'"
            class="w3-button w3-display-topright">&times;</span>
                <h2>Modificar pokemon</h2>
            </header>

            <div class="">
                <form class="w3-container w3-card-4" action=""> <!--- MODIFICAR ACTION Y PONER PHP --->
                    <br>
                    <p>
                        <label class="w3-text-grey">Nombre</label>
                        <input class="w3-input w3-border" type="text" required="">
                    </p>
                    <p>
                        <label class="w3-text-grey">Numero</label>
                        <input class="w3-input w3-border" type="text" required="">
                    </p>
                    <p>
                        <label class="w3-text-grey">Descripcion</label>
                        <textarea class="w3-input w3-border" style="resize:none"></textarea>
                    </p>

                    <p><button type="button" class="w3-btn w3-padding w3-teal w3-right w3-margin-bottom" style="width:120px">Modificar</button></p>
                </form>

            </div>
        </div>
    </div>
</main>

<footer>
    <?php
    include_once ("./src/footer.php");
    ?>
</footer>
</body>
</html>

<?php
