<?php

include_once('db.php');

$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
$numero = isset($_POST['numero']) ? $_POST['numero'] : '';
$tipo = isset($_POST['tipo']) ? $_POST['tipo'] : '';
$segundoTipo = isset($_POST['segundoTipo']) ? $_POST['segundoTipo'] : '';
$descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';

$carpeta_destino =  "../img/pokemon/";

if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {

    $imagen_urlTemp = $_FILES['imagen']['tmp_name'];
    $imagen_nombre = $_FILES['imagen']['name'];



    if (move_uploaded_file($imagen_urlTemp, $carpeta_destino . $imagen_nombre)) {

        $queryCrearPokemon = "INSERT INTO pokemon (id_pokemon, imagen, nombre, tipo, tipo_2, descripcion) VALUES ('$numero', 'img/pokemon/" . $imagen_nombre . "', '$nombre', '$tipo', '$segundoTipo', '$descripcion')";

        if ($conn->query($queryCrearPokemon) === TRUE) {
            header("Location: ../index.php");
            exit();
        } else {
            echo "Error en la consulta SQL: " . $conn->error;
        }
    } else {
        echo "Error al subir el archivo";
    }
} else {
    echo "No se seleccionó ningún archivo o hubo un error al subirlo.";
}
?>




