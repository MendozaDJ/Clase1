<!doctype html>
<html>
<head>
<link rel="stylesheet" href="css/Estilo1.css" type="text/css">
<meta charset="utf-8">
<title>Registro de Usuarios</title>
</head>
<body>
<?php 
	$Apellido = $Nombre = $Email = "";
	$errorApellido = $errorNombre = $errorEmail = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		if (empty($_POST["apellido"])) {
        $errorApellido = "Por favor ingrese su Apellido";
    	} else {
    		$Apellido = validar($_POST["apellido"]);
			if (!preg_match("/^[a-zA-Z ]*$/", $Apellido)) {
      		$errorApellido = "Solo se permiten letras";
    		}
    	}
	
		if (empty($_POST["nombre"])) {
        $errorNombre = "Por favor ingrese su Nombre";
    	} else {
    		$Nombre = validar($_POST["nombre"]);
			if (!preg_match("/^[a-zA-Z ]*$/", $Nombre)) {
      		$errorNombre = "Solo se permiten letras";
    		}
    	}
	
		if (empty($_POST["email"])) {
        $errorEmail = "Por favor ingrese su Correo Electrónico";
    	} else {
    		$Email = validar($_POST["email"]);
			if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
      		$errorEmail = "Formato de correo electrónico inválido";
    		}	
    	}
	}
	
	function validar($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
?>
<style>
	.error{
		color: red;
	}
</style>
<form method="post" action="#">
<table width="200" border="1" align="center">
  <tbody>
    <tr>
      <td>REGISTRO DE USUARIOS</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Apellido</td>
      <td><input type="text" name="apellido"><span class="error">* <?php echo $errorApellido;?></span></td>
    </tr>
    <tr>
      <td>Nombre</td>
      <td><input type="text" name="nombre"><span class="error">* <?php echo $errorNombre;?></span></td>
    </tr>
    <tr>
      <td>Correo Electrónico</td>
      <td><input type="text" name="email"><span class="error">* <?php echo $errorEmail;?></span></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit"></td>
    </tr>
  </tbody>
</table>
	</form>
	
	
	<?php
	
	if (!preg_match("/^[a-zA-Z ]*$/",$Apellido)) {
      $Ap = "";
    } else {
		$Ap = $_POST['apellido'];
	}
	if (!preg_match("/^[a-zA-Z ]*$/",$Nombre)) {
      $Nom = "";
    } else {
		$Nom = $_POST['nombre'];
	}
	
	$Email = $_POST['email'];
?>
<table width="200" border="1" align="center">
  <tbody>
    <tr>
      <td colspan="2">USUARIO REGISTRADO</td>
      
    </tr>
    <tr>
      <td>Apellido:</td>
      <td><?=$Ap?></td>
    </tr>
    <tr>
      <td>Nombre:</td>
      <td><?=$Nom?></td>
    </tr>
    <tr>
      <td>Correo Electrónico:</td>
      <td><?=$Email?></td>
    </tr>
  </tbody>
</table>
</body>
</html>
