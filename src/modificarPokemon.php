<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_pokemon_actual = $_POST['id_pokemon_actual'];
    $id_pokemon_nuevo = $_POST['id_pokemon'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $tipo = $_POST['tipo'];
    $tipo_2 = $_POST['tipo_2'];
    $ruta_absouluta = "/PokedexTp/img/pokemon/";

    if (!validarTipos($tipo, $tipo_2)) {
        echo "Los tipos proporcionados no son válidos.";
        exit();
    }

    if (!empty($_FILES['imagenNueva']['name'])) {
        $path_img = "../img/pokemon/";
        $target_file = $path_img . basename($_FILES["imagenNueva"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["imagenNueva"]["tmp_name"]);
        if ($check !== false) {
            if (move_uploaded_file($_FILES["imagenNueva"]["tmp_name"], $target_file)) {
                $ruta_imagen = $ruta_absouluta . basename($_FILES["imagenNueva"]["name"]);

                $sql = "UPDATE pokemon 
                        SET id_pokemon = ?, nombre = ?, descripcion = ?, tipo = ?, tipo_2 = ?, imagen = ?
                        WHERE id_pokemon = ?";

                if ($stmt = $conn->prepare($sql)) {
                    $stmt->bind_param('isssssi', $id_pokemon_nuevo, $nombre, $descripcion, $tipo, $tipo_2, $ruta_imagen, $id_pokemon_actual);

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
                SET id_pokemon = ?, nombre = ?, descripcion = ?, tipo = ?, tipo_2 = ?
                WHERE id_pokemon = ?";

        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param('issssi', $id_pokemon_nuevo, $nombre, $descripcion, $tipo, $tipo_2, $id_pokemon_actual);

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

function normalizarTipo($tipo) {
    return preg_replace('/[^a-z]/', '', strtolower($tipo));
}

function validarTipos($tipo, $tipo_2) {
    $tipos_validos = [
        'normal', 'fuego', 'agua', 'electrico', 'planta', 'hielo', 'lucha', 'veneno',
        'tierra', 'volador', 'psiquico', 'bicho', 'roca', 'fantasma', 'dragon',
        'siniestro', 'acero', 'hada'
    ];

    $tipo_normalizado = normalizarTipo($tipo);
    $tipo_2_normalizado = normalizarTipo($tipo_2);

    if (!in_array($tipo_normalizado, $tipos_validos)) {
        return false;
    }

    if (!empty($tipo_2) && !in_array($tipo_2_normalizado, $tipos_validos)) {
        return false;
    }

    if (!empty($tipo_2) && $tipo_normalizado === $tipo_2_normalizado) {
        return false;
    }

    return true;
}