<script src="js/sweetalert.min.js"></script>
<?php
session_start();
if(!isset($_SESSION["Usuario"])) {
	header('Location: index.php');
}
if(!isset($_SESSION["txtUsuario"])) {
	header('Location: index.php');
}
include('cado/clase_usuario.php');//se llama al archivo de clase_usuario.php

$user=$clave="";
$user=validar($_POST["txtUsuario"]);

$clave=validar($_POST["txtClave"]);
echo $clave;
$objUsuario=new Usuario();//se llama a la clase usuario
$validar=$objUsuario->iniciarSesion($user,md5($clave));
$sesion=$validar->fetch();

$_SESSION["id"]=$sesion[0];
$_SESSION["Usuario"]=$sesion[1];
$_SESSION["Clave"]=$sesion[2];
$_SESSION["Grupo"]=$sesion[5];
$_SESSION["Estado"]=$sesion[7];

if(empty($user)){
	?>
	<script>	
		
	alert("Ingrese usuario");
	window.location.href="index.php";

	</script>
				
	<?php
	exit;
	}
elseif(empty($clave)){
	?>
	<script>	
		
	alert("Ingrese contraseña");
	window.location.href="index.php";

	</script>
				
	<?php
	exit;
	}
	
if(!empty($sesion)){
			
      if ($_SESSION["Estado"] == "0"){
		  header('Location: usuario.php');
	  }
	else{
		?>	
		<script>
		
		alert("El usuario está inactivo");
		window.location.href="index.php";
		
		</script>
		<?php
	}
	}
					else
					{	
						?>
						<script>	

						alert("Usuario o contraseña incorrectas");
						window.location.href="index.php";

						</script>

						<?php
					}
	

function validar($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>