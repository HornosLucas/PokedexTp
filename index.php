<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Pokedex</title>
</head>
<body>
<header>
    <?php
    include_once("./src/header.php");
    ?>
</header>

<li class="w3-bar">
  <span onclick="this.parentElement.style.display='none'"
        class="w3-bar-item w3-button w3-xlarge w3-right">&times;</span>
    <img src="img_avatar2.png" class="w3-bar-item w3-circle" style="width:85px">
    <div class="w3-bar-item">
        <span class="w3-large">Mike</span><br>
        <span>Web Designer</span>
    </div>
</li>

<footer>
    <?php
    include_once ("./src/footer.php");
    ?>
</footer>
</body>
</html>

<?php
