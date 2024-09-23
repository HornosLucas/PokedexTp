<?php
session_start();

$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

if($username == "admin" && $password == "123") {
    $_SESSION['logeo'] = 1;
    header('Location: ../index.php');
    exit();
} else {
    header('Location: ../index.php');
    exit();
}
