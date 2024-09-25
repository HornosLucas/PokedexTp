<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!doctype html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/PokedexTp/css/header.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Document</title>
</head>
<body>
<div class="w3-bar header w3-row">
    <div class="w3-col   w3-center logoConteiner conteiner"> <img class="logo" src="/PokedexTp/img/logo.png" alt="">  </div>
    <div class="w3-col   w3-center titleConteiner conteiner"> <h3>POKEDEX</h3> </div>
    <div class="w3-col   w3-center formConteiner conteiner">
        <?php

        if (!isset($_SESSION['logeo'])) {

            // Mostrar el formulario de login si no se ha iniciado sesión
            echo "<form class='form' method='post' action='src/validar.php'>";
            echo "<input type='text' name='username' class='username' placeholder='username'>";
            echo "<input type='password' name='password' class='password' placeholder='password'>";
            echo "<button class='w3-button w3-black  w3-round-large w3-round-large'>Ingresar</button>";
            echo "</form>";

        } else {

            // Verificar si el usuario tiene el valor de logeo igual a 1
            if ($_SESSION['logeo'] == 1) {
                echo " <p> Hola admin</p>";
                echo "<a href='http://localhost/PokedexTp/src/logout.php'>Cerrar sesion</a>";
            } else {
                echo " <p> Hola usuario</p>";
                echo "<a href='http://localhost/PokedexTp/src/logout.php'>Cerrar sesion</a>";
            }
        }
        ?>
    </div>
</div>
</body>
</html>
