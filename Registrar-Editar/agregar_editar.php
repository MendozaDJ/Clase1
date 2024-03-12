<?php
session_start();
if (!isset($_SESSION["Usuario"])) {
    header('Location: index.php');
    exit; 
}

include 'cado/clase_usuario.php';

// Inicializa las variables
$nombres = $apellidos = $dni = $escuela = $codigo = $categoria = $pass = $user = "";
$tipo = "";

// Verifica si se ha enviado una solicitud POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Valida y recoge los datos del formulario
    $tipo = validar($_POST["txtTipoOperacion"]);
    $id_user = validar($_POST["txtID"]);
    $nombres = validar($_POST["txtNombre"]);
    $apellidos = validar($_POST["txtApellidos"]);
    $dni = validar($_POST["txtDNI"]);
    $escuela = validar($_POST["txtEscuela"]);
    $codigo = validar($_POST["txtCodigo"]);
    $categoria = validar($_POST["txtCategoria"]);
    $pass = validar($_POST["txtPass"]);
    $user = validar($_POST["txtUser"]);

    if (!empty($tipo) && !empty($nombres) && !empty($apellidos) && !empty($dni) && !empty($escuela) && !empty($codigo) && !empty($categoria) && !empty($pass) && !empty($user)) {
        $objUsuario = new Usuario();
        if ($tipo == "agregar") {
            $objUsuario->registrarUsuario($nombres, $apellidos, $dni, $escuela, $codigo, $categoria, $pass, $user);
            header('Location: usuario.php');
            exit; 
        } elseif ($tipo == "editar") {
            $objUsuario->editarUsuario($id_user, $nombres, $apellidos, $dni, $escuela, $codigo, $categoria, $pass, $user);
            header('Location: usuario.php');
            exit; 
        }
    } else {
        echo "Error: Todos los campos son requeridos.";
    }
}

// Función para validar y limpiar los datos
function validar($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
