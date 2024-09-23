<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$config = parse_ini_file('bd.ini', true);

if (!$config) {
    die('Error al cargar el archivo de la base de datos.');
}

$servername = $config['servername'];
$username = $config['username'];
$password = "";
$dbname = $config['dbname'];

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

