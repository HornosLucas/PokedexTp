<?php

$config = parse_ini_file('bd.ini', true);

if (!$config) {
    die('Error al cargar el archivo de la base de datos.');
}

$servername = $config['servername'];
$username = $config['username'];
$password = "";
$dbname = $config['dbname'];
$port = 3307;


$conn = new mysqli($servername, $username, $password, $dbname, $port);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

