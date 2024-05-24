<?php
require_once "php/auth.php";
require_once "php/guardar_notas.php";
check_is_rol(["Empleado", "Administrador"]);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizarra de Notas</title>
    <link rel="stylesheet" href="styles/style.css">
    <link href="styles/sidebar.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/notas.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const sortable = new Sortable(document.getElementById('notasContainer'), {
                animation: 150,
                onEnd: function (evt) {
                    const order = sortable.toArray();
                    const xhr = new XMLHttpRequest();
                    xhr.open("POST", "", true);
                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState == 4 && xhr.status == 200) {
                            console.log(xhr.responseText);
                        }
                    };
                    xhr.send("update_order=1&order[]=" + order.join("&order[]="));
                },
            });
        });

        function validateForm(event) {
            const nota = document.querySelector('textarea[name="nota"]').value.trim();
            if (nota === "") {
                alert("Por favor, ingrese una nota.");
                event.preventDefault();
                return false;
            }
        }

        function confirmDelete(event) {
            const checkboxes = document.querySelectorAll('input[name="selected_notas[]"]:checked');
            if (checkboxes.length === 0) {
                alert("Por favor, seleccione al menos una nota para eliminar.");
                event.preventDefault();
                return false;
            }
            const confirmed = confirm("¿Está seguro de que desea eliminar las notas seleccionadas?");
            if (!confirmed) {
                event.preventDefault();
                return false;
            }
        }
    </script>
</head>
<body>
    <?php
    require_once "php/barraLateral.php";
    ?>
    <main class="pizarra_notas">
        <h1>Pizarra de Notas</h1>
        <form method="post" action="" onsubmit="validateForm(event)">
            <textarea name="nota" placeholder="Escribe tu nota aquí..."></textarea><br>
            <input type="color" name="color" value="#ffffff"><br>
            <button type="submit">Agregar Nota</button>
        </form>
        <form method="post" action="" onsubmit="confirmDelete(event)">
            <button type="submit" name="delete_selected" class="delete-btn">Eliminar Seleccionadas</button>
            <div id="notasContainer" class="notas">
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='nota' data-id='" . $row["id"] . "' style='background-color:" . $row["color"] . "' id='" . $row["id"] . "'>";
                        echo "<div class='header'><input type='checkbox' name='selected_notas[]' value='" . $row["id"] . "'>";
                        echo "<small>" . $row["fecha"] . "</small></div>";
                        echo "<div class='contenido'><p>" . $row["contenido"] . "</p></div>";
                        echo "</div>";
                    }
                } else {
                    echo "No hay notas";
                }
                $conexion->close();
                ?>
            </div>
        </form>
    </main>
</body>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</html>
