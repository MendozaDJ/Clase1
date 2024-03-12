<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear/Editar Usuario</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <h2>Crear/Editar Usuario</h2>
    <div id="mensaje"></div>
    <?php
    require_once 'ConexionBD.php';

    // Variables para almacenar los valores del formulario
    $id = '';
    $nombre = '';
    $email = '';

    // Si se proporciona un ID de usuario, obtén los datos del usuario
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM usuarios WHERE id=?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        $nombre = $row['nombre'];
        $email = $row['email'];
    }

    // Procesar el formulario cuando se envíe
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Si hay un ID, actualiza el registro, de lo contrario, inserta un nuevo registro
        if (!empty($_POST['id'])) {
            $id = $_POST['id'];
            $sql = "UPDATE usuarios SET nombre=?, email=?, password=? WHERE id=?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "sssi", $nombre, $email, $password, $id);
        } else {
            $sql = "INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "sss", $nombre, $email, $password);
        }

        if (mysqli_stmt_execute($stmt)) {
            // Mostrar mensaje de éxito con JavaScript sin redireccionar
            echo "<script>$('#mensaje').html('Usuario guardado correctamente.');</script>";
        } else {
            echo "<script>$('#mensaje').html('Error al guardar el usuario: " . mysqli_error($conn) . "');</script>";
        }
    }
    ?>

    <form id="usuarioForm">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>" required><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>" required><br><br>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br><br>
        <button type="submit">Guardar</button>
    </form>

    <script>
        $(document).ready(function() {
            // Manejar el envío del formulario con AJAX
            $('#usuarioForm').submit(function(e) {
                e.preventDefault(); // Evitar que el formulario se envíe normalmente
                $.ajax({
                    type: 'POST',
                    url: 'crear_editar_usuario.php', // Ruta del archivo PHP que procesará el formulario
                    data: $(this).serialize(), // Serializar los datos del formulario
                    success: function(response) {
                        $('#mensaje').html(response); // Mostrar el mensaje de éxito o error
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText); // Mostrar el error en la consola del navegador
                    }
                });
            });
        });
    </script>
</body>
</html>
