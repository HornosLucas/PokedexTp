<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_pokemon = $_POST['id_pokemon'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $tipo = $_POST['tipo'];
    $tipo_2 = $_POST['tipo_2'];
    $ruta_absouluta = "/PokedexTp/img/pokemon/";

    if (!empty($_FILES['imagenNueva']['name'])) {
        $path_img = "../img/pokemon/";
        $target_file = $path_img . basename($_FILES["imagenNueva"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["imagenNueva"]["tmp_name"]);
        if ($check !== false) {
            if (move_uploaded_file($_FILES["imagenNueva"]["tmp_name"], $target_file)) {
                $ruta_imagen = $ruta_absouluta . basename($_FILES["imagenNueva"]["name"]);

                $sql = "UPDATE pokemon 
                    SET nombre = ?, descripcion = ?, tipo = ?, tipo_2 = ?, imagen = ?
                    WHERE id_pokemon = ?";

                if ($stmt = $conn->prepare($sql)) {
                    $stmt->bind_param('sssssi', $nombre, $descripcion, $tipo, $tipo_2, $ruta_imagen, $id_pokemon);

                    if ($stmt->execute()) {
                        echo "Pokémon modificado exitosamente con nueva imagen.";
                        header('Location: ../index.php');
                        exit();
                    } else {
                        echo "Error al modificar el Pokémon.";
                    }

                    $stmt->close();
                } else {
                    echo "Error en la preparación de la consulta.";
                }
            } else {
                echo "Error al cargar la imagen.";
            }
        } else {
            echo "El archivo no es una imagen.";
        }
    } else {
        $sql = "UPDATE pokemon 
            SET nombre = ?, descripcion = ?, tipo = ?, tipo_2 = ?
            WHERE id_pokemon = ?";

        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param('ssssi', $nombre, $descripcion, $tipo, $tipo_2, $id_pokemon);

            if ($stmt->execute()) {
                echo "Pokémon modificado exitosamente.";
                header('Location: ../index.php');
                exit();
            } else {
                echo "Error al modificar el Pokémon.";
            }

            $stmt->close();
        } else {
            echo "Error en la preparación de la consulta.";
        }
    }
}



?>
