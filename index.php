<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <title>Pokedex</title>
</head>
<body>
<header>
    <header>
        <?php
        include_once("./src/header.php");
        include_once("src/db.php");

        $query_pokemon = "SELECT * FROM pokemon";
        $resultado = $conn->query($query_pokemon);
        $path_tipos = '/PokedexTp/img/tipos/';

        ?>
    </header>

    <main>
        <div>
            <form class="searchForm">
                <input type="text" class="" placeholder="Search..">
                <button class="w3-button w3-black w3-round-large">¿Quién es este pokemon?</button>
            </form>
        </div>

        <table class="w3-table-all w3-card-4 pokemonList">
            <tr>
                <th>Imagen</th>
                <th>Tipo</th>
                <th>Número</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>

            <?php
            if ($resultado->num_rows > 0) {
                while ($fila = $resultado->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td><img src='" . $fila['imagen'] . "'  alt='Imagen de Pokemon'></td>";
                    echo "<td><img src='" . $path_tipos . $fila['tipo'] . ".png" . "' class='w3-circle' alt='Tipo de Pokemon'>";
                    if (!empty($fila["tipo_2"])) {
                        echo "<img src='" . $path_tipos . $fila['tipo_2'] . ".png" . "' class='w3-circle' alt='Tipo Secundario de Pokemon'></td>";
                    } else {
                        echo "</td>";
                    }
                    echo "<td>" . $fila['id_pokemon'] . "</td>";
                    echo "<td>" . $fila['nombre'] . "</td>";

                    echo "<td>";

                    echo "<button type='button' class='w3-button w3-black w3-hover-red w3-round-large' onclick=\"confirmDelete('" . $fila['id_pokemon'] . "')\">Eliminar</button>";
                   
                 
                   echo "<button type='button' onclick=\"document.getElementById('id01').style.display='block'\" class='w3-button w3-black w3-hover-blue w3-round-large'>Modificar</button>";
                  
                    echo "</td>";
                    echo "</tr>";


                    echo "<div id='modal-" . $fila['id_pokemon'] . "' class='w3-modal'>
                    <div class='w3-modal-content w3-animate-top'>
                        <header class='w3-container w3-teal'>
                            <span onclick=\"document.getElementById('modal-" . $fila['id_pokemon'] . "').style.display='none'\"
                                   class='w3-button w3-hover-red w3-display-topright'>&times;</span>
                            <h2>Eliminar Pokémon</h2>
                        </header>
                        <div class='w3-container'>
                            <p>¿Estás seguro de que deseas eliminar a " . $fila['nombre'] . "?</p>
                        </div>
                        <footer class='w3-container w3-red'>
                            <button id='btnConfirmDelete-" . $fila['id_pokemon'] . "' class='w3-button w3-green w3-right'>Sí</button>
                            <button onclick=\"document.getElementById('modal-" . $fila['id_pokemon'] . "').style.display='none'\" class='w3-button w3-red w3-right'>No</button>
                        </footer>
                    </div>
                </div>";
                }
            } else {
                echo "<tr><td colspan='5'>No se encontraron Pokémon</td></tr>";
            }
            ?>

        </table>

        <div id="id01" class="w3-modal">
            <div class="w3-modal-content w3-animate-top">

                <header class="w3-container w3-teal">
            <span onclick="document.getElementById('id01').style.display='none'"
                  class="w3-button w3-hover-red w3-display-topright">&times;</span>
                    <h2>Modificar pokemon</h2>
                </header>

                <div class="">
                    <form class="w3-container w3-card-4" action=""> <!--- MODIFICAR ACTION Y PONER PHP --->
                        <br>
                        <p>
                            <label class="w3-text-grey">Nombre</label>
                            <input class="w3-input w3-border" type="text" required="">
                        </p>
                        <p>
                            <label class="w3-text-grey">Numero</label>
                            <input class="w3-input w3-border" type="text" required="">
                        </p>
                        <p>
                            <label class="w3-text-grey">Descripcion</label>
                            <textarea class="w3-input w3-border" style="resize:none"></textarea>
                        </p>

                        <p>
                            <button type="button"
                                    class="w3-button w3-black w3-hover-blue  w3-round-large w3-right w3-margin-bottom"
                                    style="width:120px">Modificar
                            </button>
                        </p>
                    </form>

                </div>
            </div>
        </div>

        <div class="newPokemon">
            <button onclick=document.getElementById('id03').style.display='block' class="w3-button w3-black w3-hover-blue  w3-round-large w3-right w3-margin-bottom"> Capturar Nuevo Pokemon</button>
        </div>

        <div id="id03" class="w3-modal">
            <div class="w3-modal-content w3-animate-top">

                <header class="w3-container w3-teal">
            <span onclick="document.getElementById('id03').style.display='none'"
                  class="w3-button w3-hover-red w3-display-topright">&times;</span>
                    <h2>Capturar pokemon</h2>
                </header>

                <div class="">
                    <form class="w3-container w3-card-4" enctype="multipart/form-data" action="src/crearPokemon.php" method="post"> <!--- MODIFICAR ACTION Y PONER PHP --->
                        <br>
                        <p>
                            <label class="w3-text-grey">Imagen</label>
                            <input class="w3-input w3-border" type="file" required="" name="imagen">
                        </p>
                        <p>
                            <label class="w3-text-grey">Nombre</label>
                            <input class="w3-input w3-border" type="text" required="" name="nombre">
                        </p>
                        <p>
                            <label class="w3-text-grey">Tipo</label>

                                <?php
                                $tipos = parse_ini_file("img/tipos/tipo.ini", true);

                                echo "<select name='tipo' class='w3-input w3-border'>";

                                foreach ($tipos['tipos'] as $tipo) {
                                    echo '<option value="' . $tipo . '">' . $tipo . '</option>';
                                }
                                echo '</select>';
                                ?>


                        </p>
                        <p>
                            <label class="w3-text-grey">Segundo Tipo</label>
                            <?php
                            $tipos = parse_ini_file("img/tipos/tipo.ini", true);

                            echo "<select name='segundoTipo' class='w3-input w3-border'>";
                            echo "<option value=''>Ninguno</option>";
                            foreach ($tipos['tipos'] as $tipo) {
                                echo '<option value="' . $tipo . '">' . $tipo . '</option>';
                            }
                            echo '</select>';
                            ?>
                        </p>
                        <p>
                            <label class="w3-text-grey">Numero</label>
                            <input class="w3-input w3-border" type="number" required="" name="numero">
                        </p>
                        <p>
                            <label class="w3-text-grey">Descripcion</label>
                            <textarea class="w3-input w3-border" style="resize:none" name="descripcion"></textarea>
                        </p>

                        <p>
                            <button type="submit"
                                    class="w3-button w3-black w3-hover-blue  w3-round-large w3-right w3-margin-bottom"
                                    style="width:120px">Capturar
                            </button>
                        </p>
                    </form>

                </div>
            </div>
        </div>

    </main>

    <footer>
        <?php
        include_once("./src/footer.php");
        ?>
    </footer>

    <script>
        function confirmDelete(id_pokemon) {

            document.getElementById('modal-' + id_pokemon).style.display = 'block';


            document.getElementById('btnConfirmDelete-' + id_pokemon).onclick = function() {
                window.location.href = 'src/eliminar_pokemon.php?id_pokemon=' + id_pokemon;
            };
        }
    </script>
</body>
</html>



