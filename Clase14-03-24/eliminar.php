<?php
	session_start();
if(!isset($_SESSION["Usuario"])) {
	header('Location: index.php');
}
	include 'cado/clase_usuario.php';
	//echo $_SESSION["usuario"];
	
	$nombres=$user=$pass=$estado=$grupo=$activo=$tipo="";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $id=validar($_POST["txtID2"]);

}
function validar($data){
    $data =trim($data);
    $data=stripslashes($data);
    $data= htmlspecialchars($data);
    return $data;
}
$objUsuario=new Usuario();
$objUsuario->eliminar($id);
header('Location: usuario.php');

?>