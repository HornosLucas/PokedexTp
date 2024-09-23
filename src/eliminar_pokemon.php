<?php
session_start();
    include_once("db.php");
if (isset($_GET['id_pokemon'])) {
    $id_pokemon = $_GET['id_pokemon'];

    // 3. Crear la consulta de eliminación
    $sql = "DELETE FROM pokemon WHERE id_pokemon = ?";

    // 4. Preparar la consulta
    if ($stmt = $conn->prepare($sql)) {
        // Enlazar el parámetro id_pokemon
        $stmt->bind_param("i", $id_pokemon);

        // 5. Ejecutar la consulta
        $stmt->execute();

        // 6. Cerrar la declaración
        $stmt->close();
        header("Location: ../index.php");
        exit();
    } else {
        echo "Error en la preparación de la consulta: " . $conn->error;
    }
} else {
    echo "No se ha proporcionado un ID de Pokémon.";
}

// 7. Cerrar la conexión
$conn->close();




