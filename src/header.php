<?php
session_start();

$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

if ($username == "admin" && $password == "123") {
    $_SESSION['logeo'] = 1;
} else {
    $_SESSION['logeo'] = 0;
}
?>
<!doctype html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Document</title>
</head>
<body>
<div class="w3-bar header w3-row">
    <div class="w3-col   w3-center logoConteiner conteiner"> <img class="logo" src="img/logo.png" alt="">  </div>
    <div class="w3-col   w3-center logoConteiner conteiner"> <img class="logo" src="../img/logo.png" alt="">  </div>
    <div class="w3-col   w3-center titleConteiner conteiner"> <h3>POKEDEX</h3> </div>
    <div class="w3-col   w3-center formConteiner conteiner">
        <?php if ($_SESSION['logeo'] != 1): ?>
        <form class="form" method="post" action="">
            <input type="text" name="username" class="username" placeholder="username">
            <input type="text" name="password" class="password" placeholder="password">
            <button class="w3-button w3-black  w3-round-large w3-round-large">Ingresar</button>
        </form>
        <?php else: ?>
        <p> HOLA <?php echo htmlspecialchars($username); ?></p>

        <?php endif; ?>
    </div>
</div>
</body>
</html>
