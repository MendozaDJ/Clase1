 <?php
	session_start();
if(!isset($_SESSION["Usuario"])) {
	header('Location: index.php');
}
	include 'cado/clase_usuario.php';
	//echo $_SESSION["usuario"];
	
	$nombres=$user=$pass=$estado=$grupo=$activo=$tipo="";

if($_SERVER["REQUEST_METHOD"]=="POST"){


	$tipo=validar($_POST["txtTipoOperacion"]);

	$id=validar($_POST["txtID"]);
	
	$nombres=validar($_POST["txtNombre"]);
	
	$user=validar($_POST["txtUsuario"]);		
	
	$pass=validar($_POST["txtClave"]);
	
	$estado=validar($_POST['cboEstado']);
	
	$grupo=validar($_POST["cboGrupo"]);
		
	$activo=validar($_POST["cboActivo"]);


}
  function validar($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if($tipo=="agregar"){
	
	$objUsuario= new Usuario();
	$objUsuario->registrar($nombres,$user,$pass,$estado,$grupo,$activo);
	header('Location: usuario.php');
}
elseif ($tipo=="editar"){
		
	$objUsuario= new Usuario();
	$objUsuario->modificar($id,$nombres,$user,$pass,$estado,$grupo,$activo);
	header('Location: usuario.php');
}



?>