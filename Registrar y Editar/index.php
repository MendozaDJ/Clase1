<!DOCTYPE html>
<html lang="en">
<head>
  <title>Página Principal</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styless.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    /* Estilos para el modal */
    .modal-dialog {
      max-width: 400px;
    }
  </style>
  <script>
    function cargarDatosUsuario(id, nombre, email) {
      document.getElementById("editarId").value = id;
      document.getElementById("editarNombre").value = nombre;
      document.getElementById("editarEmail").value = email;
      $('#editarUsuarioModal').modal('show');
    }
  </script>
</head>
<body>

<div class="container">
  <h2>Bienvenido, <?php echo $nombre; ?></h2>

  <h3>Listado de Usuarios Registrados:</h3>

  <table class="table">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Email</th>
        <th>Acciones</th> <!-- Nueva columna para las acciones -->
      </tr>
    </thead>
    <tbody>
      <?php
      // Mostrar datos de la base de datos
      require_once 'ConexionBD.php';
      $sql = "SELECT * FROM usuarios";
      $result = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['nombre'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td><a href='#' onclick='cargarDatosUsuario(" . $row['id'] . ", \"" . $row['nombre'] . "\", \"" . $row['email'] . "\")'>Editar</a></td>"; // Enlace para editar usuario
        echo "</tr>";
      }
      ?>
    </tbody>
  </table>

  <!-- Botón para abrir el modal de registro -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#registroUsuarioModal">Registrar Nuevo Usuario</button>

  <br>
  <a href="Cerrar.php">Cerrar Sesión</a>
</div>

<!-- Modal para el formulario de registro de usuario -->
<div class="modal fade" id="registroUsuarioModal" tabindex="-1" role="dialog" aria-labelledby="registroUsuarioModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="registroUsuarioModalLabel">Registrar Nuevo Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="crear_editar_usuario.php" method="post"> <!-- Corregir la ruta del formulario -->
          <label for="nombreRegistro">Nombre:</label>
          <input type="text" id="nombreRegistro" name="nombre" required><br><br>
          <label for="emailRegistro">Email:</label>
          <input type="email" id="emailRegistro" name="email" required><br><br>
          <label for="passwordRegistro">Contraseña:</label>
          <input type="password" id="passwordRegistro" name="password" required><br><br>
          <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal para el formulario de edición de usuario -->
<div class="modal fade" id="editarUsuarioModal" tabindex="-1" role="dialog" aria-labelledby="editarUsuarioModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editarUsuarioModalLabel">Editar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="crear_editar_usuario.php" method="post"> <!-- Corregir la ruta del formulario -->
          <input type="hidden" id="editarId" name="id">
          <label for="editarNombre">Nombre:</label>
          <input type="text" id="editarNombre" name="nombre" required><br><br>
          <label for="editarEmail">Email:</label>
          <input type="email" id="editarEmail" name="email" required><br><br>
          <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
      </div>
    </div>
  </div>
</div>

</body>
</html>
